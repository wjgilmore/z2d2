<?php

class Application_Model_FormContact extends Zend_Form
{

  public function init($options = null)
  {

    $this->setName('contact');
    $this->setMethod('post');
    $this->setAction('/about/contact');

    $name = new Zend_Form_Element_Text('name');
    $name->setAttrib('size', 35);
    $name->setLabel('Your Name:');
    $name->setRequired(true);
    $name->addErrorMessage('Please provide your name');

    $email = new Zend_Form_Element_Text('email');
    $email->setAttrib('size', 35);
    $email->setLabel('Your E-mail Address:');
    $email->setRequired(true);
    $email->addErrorMessage('Please provide a valid e-mail address');
    $email->addValidator('EmailAddress');

    $message = new Zend_Form_Element_Textarea('message');
    $message->setLabel('Your Message:');
    $message->setRequired(true);
    $message->setAttrib('rows', '10');
    $message->setAttrib('cols', '55');
    $message->addErrorMessage('Please specify a message');

    $submit = new Zend_Form_Element_Submit('submit');
    $submit->setLabel('Send Your Message!');

    $this->addElements(array($name, $email, $message, $submit));

  }



}

