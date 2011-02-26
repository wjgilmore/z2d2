<?php

class ModelTestCase extends PHPUnit_Framework_TestCase
{
  
  protected $em;
  protected $application;
  protected $bootstrap;
  
  public function setUp()
  {
    
    $this->application = new Zend_Application('testing', APPLICATION_PATH . '/configs/application.ini');

    $this->application->bootstrap();

    $bootstrap = $this->application->getBootstrap();

    $this->em = $bootstrap->getResource('entityManager'); 
    
    $front = $bootstrap->getResource('FrontController');

    $front->setParam('bootstrap', $bootstrap);
     
    parent::setUp();
    
  }
  
  public function tearDown()
  {
    parent::tearDown();
  }
  
}
