<?php

/**
 * This custom action helper just cuts down on the lengthy bit of typing we'd otherwise have
 * to do in order to retrieve the custom Entity Manager resource located in:
 * /library/WJG/Resource/Entitymanager.php 
 * 
 */
class WJG_Controller_Action_Helper_EntityManager extends Zend_Controller_Action_Helper_Abstract
{
  public function direct()
  {
    return $this->getActionController()->getInvokeArg('bootstrap')->getResource('entityManager');
  }
}

?>


