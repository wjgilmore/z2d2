<?php
require_once 'Zend/Application.php';
require_once 'Zend/Test/PHPUnit/ControllerTestCase.php';
 
abstract class ControllerTestCase extends Zend_Test_PHPUnit_ControllerTestCase
{

    public function setUp()
    {

      $this->bootstrap = new Zend_Application(
        'testing',
        APPLICATION_PATH . '/configs/application.ini'
      );

        parent::setUp();
    }

    public function tearDown()
    {
      parent::tearDown();
    }

}

