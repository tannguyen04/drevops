<?php

namespace DrevOps\Installer;


use DrevOps\Installer\Command\InstallCommand;
use Symfony\Component\Console\Application;

class InstallerApp extends Application {

  public function __construct(string $name = 'UNKNOWN', string $version = 'UNKNOWN') {
    parent::__construct($name, $version);

    $this->setName('DrevOps CLI Installer');
    $this->setVersion('@git-version@');
    $command = new InstallCommand();
    $this->add($command);
    $this->setDefaultCommand($command->getName(), TRUE);
  }

}

