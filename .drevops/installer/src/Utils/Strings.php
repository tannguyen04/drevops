<?php

namespace DrevOps\Installer\Utils;

class Strings {

  public static function toMachineName($value, $preserve_chars = []) {
    if(empty($value)) {
      return $value;
    }

    // If the value doesn't start with an uppercase or lowercase letter, return as-is.
    if (!preg_match('/^[a-zA-Z]/', trim($value))) {
      return $value;
    }

    $value = trim($value);

    $preserve = '';
    foreach ($preserve_chars as $char) {
      $preserve .= preg_quote($char, '/');
    }
    $pattern = '/[^a-zA-Z0-9' . $preserve . ']/';

    $value = preg_replace($pattern, '_', $value);
    $value = strtolower($value);

    return $value;
  }

  public static function toHumanName($value) {
    $value = preg_replace('/[^a-zA-Z0-9]/', ' ', $value);
    $value = trim($value);
    $value = preg_replace('/\s{2,}/', ' ', $value);

    return $value;
  }

  public static function toAbbreviation($value, $maxlength = 2, $word_delim = '_') {
    $value = trim($value);
    $value = str_replace(' ', '_', $value);
    $parts = explode($word_delim, $value);
    if (count($parts) == 1) {
      return strlen($parts[0]) > $maxlength ? substr($parts[0], 0, $maxlength) : $value;
    }

    $value = implode('', array_map(function ($word) {
      return substr($word, 0, 1);
    }, $parts));

    return substr($value, 0, $maxlength);
  }

  public static function toUrl(string $string): string {
    // @todo: Add more replacements.
    return str_replace([' ', '_'], '-', $string);
  }

  public static function listToString(mixed $value, $is_multiline = FALSE): mixed {
    if (is_array($value)) {
      $value = implode($is_multiline ? PHP_EOL : ', ', $value);
    }

    return $value;
  }

  public static function isRegex($str) {
    // First character is always the start.
    $start = $str[0];

    // Exclude any of the invalid starting characters.
    if (preg_match('/[*?[:alnum:] \\\\]/', $start)) {
      return FALSE;
    }

    // Find the corresponding ending delimiter.
    $end = $start;
    $pairs = ['{' => '}', '(' => ')', '[' => ']', '<' => '>'];
    if (isset($pairs[$start])) {
      $end = $pairs[$start];
    }

    // The regex should look something like this: /pattern/modifiers
    // Extract the pattern and the modifiers.
    if (!preg_match('#^' . preg_quote($start) . '(.*?)' . preg_quote($end) . '([imsxuADU]*)$#', $str, $matches)) {
      return FALSE;
    }

    $pattern = $matches[1];

    if ($start === $end) {
      $parts = explode($start, $pattern);
      for ($i = 0; $i < count($parts) - 1; $i++) {
        // If the part does not end with a backslash and there's another part
        // left, we found an extra delimiter.
        if (substr($parts[$i], -1) !== '\\' && isset($parts[$i + 1])) {
          return FALSE;
        }
      }
    }

    return TRUE;
  }

}
