<?php
require_once 'Zend/Application.php';
require_once 'Zend/Test/PHPUnit/ControllerTestCase.php';
 
abstract class ControllerTestCase extends Zend_Test_PHPUnit_ControllerTestCase
{
    protected $application;

    public function setUp()
    {
        $this->bootstrap = array($this, 'appBootstrap');

        return parent::setUp();
    }

    public function appBootstrap()
    {

        $this->application = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');

        $this->application->bootstrap();

        $bootstrap = $this->application->getBootstrap();

        $front = $bootstrap->getResource('FrontController');

        $front->setParam('bootstrap', $bootstrap);

   }
}

