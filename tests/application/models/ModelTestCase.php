<?php

class ModelTestCase extends PHPUnit_Framework_TestCase
{
  
  protected $em;
  protected $application;
  protected $bootstrap;
  
  public function setUp()
  {
    
    $this->application = new Zend_Application(
      'testing', 
      APPLICATION_PATH . '/configs/application.ini'
    );

    $this->bootstrap = $this->application->bootstrap()->getBootstrap();

    $this->em = $this->bootstrap->getResource('entityManager'); 
    
    parent::setUp();
    
  }
  
  public function tearDown()
  {
    parent::tearDown();
  }
  
}
