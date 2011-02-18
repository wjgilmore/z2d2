<?php

class IndexControllerTest extends ControllerTestCase
{
	
    public function testDoesHomePageExist() 
    {
        $this->dispatch('/');
        $this->assertController('index');
        $this->assertAction('index');

    }	

}

