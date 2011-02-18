<?php

  /**
   * This file is responsible for making both the application Entity Manager 
   * (/library/WJG/Resource/Entitymanager.php) and the application configuration
   * file (/application/configs/application.ini) available to the Doctrine
   * CLI. It also adds several useful Doctrine CL commands to the menu. I've opted to
   * omit several of them. See the Doctrine documentation for a complete list.
   * 
   * This page really helps to understand what's going on in this script:
   * http://www.doctrine-project.org/docs/orm/2.0/en/reference/tools.html
   */
  
  define('APPLICATION_PATH', __DIR__ . '/..');
  
  set_include_path(
    implode(PATH_SEPARATOR,
    array(
      realpath(APPLICATION_PATH . '/../library'),
      get_include_path())
    )
  );
  
  require 'Zend/Application.php';
  
  // Run the application in development mode
  $application = new Zend_Application('development', APPLICATION_PATH . '/configs/application.ini');
  
  // Get your hands on the Entity Manager
  // See /library/WJG/Resource/Entitymanager.php
  $bootstrap = $application->getBootstrap()->bootstrap('entityManager');
  $em = $bootstrap->getResource('entityManager');

  // Start setting up the CL tool
  $helperSet = new \Symfony\Component\Console\Helper\HelperSet(
    array(
    	'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($em->getConnection()),
    	'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em)
    )
  );

  $cli = new \Symfony\Component\Console\Application('Doctrine Command Line Interface',
    Doctrine\Common\Version::VERSION);

  // Display exceptions
  $cli->setCatchExceptions(true);
  $cli->setHelperSet($helperSet);
  
  // Add all of the desired CL commands
  $cli->addCommands(
    array(
      new \Doctrine\ORM\Tools\Console\Command\ClearCache\MetadataCommand(),
      new \Doctrine\ORM\Tools\Console\Command\ClearCache\ResultCommand(),
      new \Doctrine\ORM\Tools\Console\Command\ClearCache\QueryCommand(),
      new \Doctrine\ORM\Tools\Console\Command\ConvertMappingCommand(),
      new \Doctrine\ORM\Tools\Console\Command\EnsureProductionSettingsCommand(),
      new \Doctrine\ORM\Tools\Console\Command\GenerateRepositoriesCommand(),
      new \Doctrine\ORM\Tools\Console\Command\GenerateEntitiesCommand(),
      new \Doctrine\ORM\Tools\Console\Command\GenerateProxiesCommand(),
      new \Doctrine\ORM\Tools\Console\Command\SchemaTool\CreateCommand(),
      new \Doctrine\ORM\Tools\Console\Command\SchemaTool\UpdateCommand(),
      new \Doctrine\ORM\Tools\Console\Command\SchemaTool\DropCommand(),
      new \Doctrine\ORM\Tools\Console\Command\ValidateSchemaCommand()
    )
);

// Run the CLI
$cli->run();
