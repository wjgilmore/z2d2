<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

  /**
   *
   *
   *
   *
   */
  protected function _initConfig()
  {

    $config = new Zend_Config($this->getOptions());
    Zend_Registry::set('config', $config);

  }

  /**
   *
   *
   *
   *
   */
  protected function _initDoctrine() {

    require_once('Doctrine/Common/ClassLoader.php');

    $autoloader = Zend_Loader_Autoloader::getInstance();
    $classLoader = new \Doctrine\Common\ClassLoader('Entities',
      realpath(Zend_Registry::get('config')->resources->entityManager->connection->entities), 'loadClass');

    $autoloader->pushAutoloader(array($classLoader, 'loadClass'), 'Entities');
    
    $classLoader = new \Doctrine\Common\ClassLoader('Repositories',
      realpath(Zend_Registry::get('config')->resources->entityManager->connection->entities), 'loadClass');

    $autoloader->pushAutoloader(array($classLoader, 'loadClass'), 'Repositories');    
    
  }

}

