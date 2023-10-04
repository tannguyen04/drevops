<?php

namespace DrevOps\Installer\Utils;

use RuntimeException;

class Files {

  public static function copyRecursive($source, $dest, $permissions = 0755, $copy_empty_dirs = FALSE) {
    $parent = dirname($dest);

    if (!is_dir($parent)) {
      mkdir($parent, $permissions, TRUE);
    }

    // Note that symlink target must exist.
    if (is_link($source)) {
      // Changing dir symlink will be relevant to the current destination's file
      // directory.
      $cur_dir = getcwd();
      chdir($parent);
      $ret = TRUE;
      if (!is_readable(basename($dest))) {
        $ret = symlink(readlink($source), basename($dest));
      }
      chdir($cur_dir);

      return $ret;
    }

    if (is_file($source)) {
      $ret = copy($source, $dest);
      if ($ret) {
        chmod($dest, fileperms($source));
      }

      return $ret;
    }

    if (!is_dir($dest) && $copy_empty_dirs) {
      mkdir($dest, $permissions, TRUE);
    }

    $dir = dir($source);
    while ($dir && FALSE !== $entry = $dir->read()) {
      if ($entry == '.' || $entry == '..') {
        continue;
      }
      self::copyRecursive("$source/$entry", "$dest/$entry", $permissions, FALSE);
    }

    $dir && $dir->close();

    return TRUE;
  }

  public static function rmdirRecursiveEmpty($directory, $options = []) {
    if (self::dirIsEmpty($directory)) {
      self::rmdirRecursive($directory, $options);
      self::rmdirRecursiveEmpty(dirname($directory), $options);
    }
  }

  public static function tempdir($dir = NULL, $prefix = 'tmp_', $mode = 0700, $max_attempts = 1000) {
    if (is_null($dir)) {
      $dir = sys_get_temp_dir();
    }

    $dir = rtrim($dir, DIRECTORY_SEPARATOR);

    if (!is_dir($dir) || !is_writable($dir)) {
      return FALSE;
    }

    if (strpbrk($prefix, '\\/:*?"<>|') !== FALSE) {
      return FALSE;
    }
    $attempts = 0;

    do {
      $path = sprintf('%s%s%s%s', $dir, DIRECTORY_SEPARATOR, $prefix, mt_rand(100000, mt_getrandmax()));
    } while (!mkdir($path, $mode) && $attempts++ < $max_attempts);

    if (!is_dir($path) || !is_writable($path)) {
      throw new RuntimeException(sprintf('Unable to create temporary directory "%s".', $path));
    }

    return $path;
  }

  public static function replaceStringFilename($search, $replace, $dir) {
    $files = self::scandirRecursive($dir, self::ignorePaths());
    foreach ($files as $filename) {
      $new_filename = str_replace($search, $replace, $filename);
      if ($filename != $new_filename) {
        $new_dir = dirname($new_filename);
        if (!is_dir($new_dir)) {
          mkdir($new_dir, 0777, TRUE);
        }
        rename($filename, $new_filename);
      }
    }
  }

  public static function dirIsEmpty($directory) {
    return is_dir($directory) && count(scandir($directory)) === 2;
  }

  public static function scandirRecursive($dir, $ignore_paths = [], $include_dirs = FALSE) {
    $discovered = [];

    if (is_dir($dir)) {
      $paths = array_diff(scandir($dir), ['.', '..']);
      foreach ($paths as $path) {
        $path = $dir . '/' . $path;
        foreach ($ignore_paths as $ignore_path) {
          // Exlude based on sub-path match.
          if (strpos($path, $ignore_path) !== FALSE) {
            continue(2);
          }
        }
        if (is_dir($path)) {
          if ($include_dirs) {
            $discovered[] = $path;
          }
          $discovered = array_merge($discovered, self::scandirRecursive($path, $ignore_paths, $include_dirs));
        }
        else {
          $discovered[] = $path;
        }
      }
    }

    return $discovered;
  }

  public static function fileContains($needle, $file) {
    if (!is_readable($file)) {
      return FALSE;
    }

    $content = file_get_contents($file);

    if (Strings::isRegex($needle)) {
      return preg_match($needle, $content);
    }

    return str_contains($content, $needle);
  }

  public static function dirReplaceContent($needle, $replacement, $dir) {
    $files = self::scandirRecursive($dir, self::ignorePaths());
    foreach ($files as $filename) {
      self::fileReplaceContent($needle, $replacement, $filename);
    }
  }

  public static function fileReplaceContent($needle, $replacement, $filename) {
    if (!is_readable($filename) || self::fileIsExcludedFromProcessing($filename)) {
      return FALSE;
    }

    $content = file_get_contents($filename);

    if (Strings::isRegex($needle)) {
      $replaced = preg_replace($needle, $replacement, $content);
    }
    else {
      $replaced = str_replace($needle, $replacement, $content);
    }
    if ($replaced != $content) {
      file_put_contents($filename, $replaced);
    }
  }

  public static function rmdirRecursive($directory, $options = []) {
    if (!isset($options['traverseSymlinks'])) {
      $options['traverseSymlinks'] = FALSE;
    }
    $items = glob($directory . DIRECTORY_SEPARATOR . '{,.}*', GLOB_MARK | GLOB_BRACE);
    foreach ($items as $item) {
      if (basename($item) == '.' || basename($item) == '..') {
        continue;
      }
      if (substr($item, -1) == DIRECTORY_SEPARATOR) {
        if (!$options['traverseSymlinks'] && is_link(rtrim($item, DIRECTORY_SEPARATOR))) {
          unlink(rtrim($item, DIRECTORY_SEPARATOR));
        }
        else {
          self::rmdirRecursive($item, $options);
        }
      }
      else {
        unlink($item);
      }
    }
    if (is_dir($directory = rtrim($directory, '\\/'))) {
      if (is_link($directory)) {
        unlink($directory);
      }
      else {
        rmdir($directory);
      }
    }
  }

  public static function dirContains($needle, $dir) {
    $files = self::scandirRecursive($dir, self::ignorePaths());
    foreach ($files as $filename) {
      if (self::fileContains($needle, $filename)) {
        return TRUE;
      }
    }

    return FALSE;
  }

  public static function getComposerJsonValue($name, $dir) {
    $composer_json = $dir . DIRECTORY_SEPARATOR . 'composer.json';
    if (is_readable($composer_json)) {
      $json = json_decode(file_get_contents($composer_json), TRUE);
      if (isset($json[$name])) {
        return $json[$name];
      }
    }

    return NULL;
  }

  public static function findMatchingPath($paths, $text = NULL) {
    $paths = is_array($paths) ? $paths : [$paths];

    foreach ($paths as $path) {
      $files = glob($path);
      if (empty($files)) {
        continue;
      }

      if (count($files)) {
        if (!empty($text)) {
          foreach ($files as $file) {
            if (self::fileContains($text, $file)) {
              return $file;
            }
          }
        }
        else {
          return reset($files);
        }
      }
    }

    return NULL;
  }

  public static function ignorePaths() {
    return array_merge([
      '/.git/',
      '/.idea/',
      '/vendor/',
      '/node_modules/',
      '/.data/',
    ], self::internalPaths());
  }

  public static function internalPaths() {
    return [
      '/scripts/drevops/installer/install',
      '/LICENSE',
      '/scripts/drevops/docs',
      '/scripts/drevops/tests',
      '/scripts/drevops/utils',
    ];
  }

  public static function isInternalPath($relative_path) {
    $relative_path = '/' . ltrim($relative_path, './');

    return in_array($relative_path, Files::internalPaths());
  }

  public static function fileIsExcludedFromProcessing($filename) {
    $excluded_patterns = [
      '.+\.png',
      '.+\.jpg',
      '.+\.jpeg',
      '.+\.bpm',
      '.+\.tiff',
    ];

    return preg_match('/^(' . implode('|', $excluded_patterns) . ')$/', $filename);
  }

  public static function globRecursive($pattern, $flags = 0) {
    $files = glob($pattern, $flags | GLOB_BRACE);
    foreach (glob(dirname($pattern) . '/{,.}*[!.]', GLOB_BRACE | GLOB_ONLYDIR | GLOB_NOSORT) as $dir) {
      $files = array_merge($files, Files::globRecursive($dir . '/' . basename($pattern), $flags));
    }

    return $files;
  }

  public static function remove($file) {
    @unlink($file);
  }

}
