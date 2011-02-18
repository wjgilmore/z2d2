<?php

class ModelTestCase extends PHPUnit_Framework_TestCase
{
  
  protected $em;
  protected $application;
  protected $bootstrap;
  
  public function setUp()
  {
    
    $this->appBootstrap();
     
    //$this->doctrineContainer->getEntityManager()->getMetadataFactory()->getAllMetadata()
    
  
    //$tool = new \Doctrine\ORM\Tools\SchemaTool($this->em);
    //$tool->createSchema('/var/www/z2d2/application/models/Entities');

    parent::setUp();
    
  }
  
  public function tearDown()
  {
    parent::tearDown();
  }

  public function appBootstrap()
  {

      $this->application = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');

      $this->application->bootstrap();

      $bootstrap = $this->application->getBootstrap();

      $this->em = $bootstrap->getResource('entityManager'); 
      
      $front = $bootstrap->getResource('FrontController');

      $front->setParam('bootstrap', $bootstrap);

 }  
  
}
