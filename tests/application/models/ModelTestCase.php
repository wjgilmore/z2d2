<?php

class ModelTestCase extends PHPUnit_Framework_TestCase
{
  
  protected $em;
  
  public function setUp()
  {
    
    $application = new Zend_Application(
      'testing', 
      APPLICATION_PATH . '/configs/application.ini'
    );

    $bootstrap = $application->bootstrap()->getBootstrap();

    $this->em = $bootstrap->getResource('entityManager'); 
    
    parent::setUp();
    
  }
  
  public function tearDown()
  {
    parent::tearDown();
  }
  
}
