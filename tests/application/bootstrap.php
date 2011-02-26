<?php

define('BASE_PATH', realpath(dirname(__FILE__) . '/../../'));

define('APPLICATION_PATH', BASE_PATH . '/application');

set_include_path(    
  '.'    
   . PATH_SEPARATOR . BASE_PATH . '/library'    
   . PATH_SEPARATOR . get_include_path()
);

set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../application/views/scripts'),
    realpath(APPLICATION_PATH . '/../application/models'),
    get_include_path(),
)));

require_once 'controllers/ControllerTestCase.php';
require_once 'models/ModelTestCase.php';

