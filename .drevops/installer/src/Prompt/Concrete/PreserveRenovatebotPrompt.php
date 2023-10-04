<?php

namespace DrevOps\Installer\Prompt\Concrete;

use DrevOps\Installer\Bag\Answers;
use DrevOps\Installer\Bag\Config;
use DrevOps\Installer\InstallManager;
use DrevOps\Installer\Prompt\AbstractConfirmationPrompt;
use DrevOps\Installer\Utils\Formatter;

class PreserveRenovatebotPrompt extends AbstractConfirmationPrompt {

  const ID = 'preserve_renovatebot';

  /**
   * {@inheritdoc}
   */
  public static function title() {
    return 'Renovatebot integration';
  }

  /**
   * {@inheritdoc}
   */
  public static function question() {
    return 'Do you want to keep RenovateBot integration?';
  }

  /**
   * {@inheritdoc}
   */
  protected function defaultValue(Config $config, Answers $answers): mixed {
    return TRUE;
  }

  /**
   * {@inheritdoc}
   */
  protected function discoveredValue(Config $config, Answers $answers): mixed {
    if (!InstallManager::isInstalled($config->getDstDir())) {
      return NULL;
    }

    return is_readable($config->getDstDir() . '/renovate.json');
  }

  /**
   * {@inheritdoc}
   */
  public static function getFormattedValue(mixed $value): string {
    return Formatter::formatEnabled($value);
  }

}
