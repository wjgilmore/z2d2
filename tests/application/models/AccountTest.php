<?php

class AccountModelTest extends ModelTestCase
{
  
  public function testCanInstantiateAccount()
  {
    $this->assertInstanceOf('\Entities\Account', new \Entities\Account);
  }

  public function testCanSaveAndRetrieveUser()
  {
    
    $account = new \Entities\Account;
    $account->setUsername('wjgilmore-test');
    $account->setEmail('example@wjgilmore.com');
    $account->setPassword('jason');
    $account->setZip('43201');
    $this->em->persist($account);
    $this->em->flush();
    
    $account = $this->em->getRepository('Entities\Account')->findOneByUsername('wjgilmore-test');
    
    $this->assertEquals('wjgilmore-test', $account->getUsername());
    
    
  }
  
}
