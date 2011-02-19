<?php

namespace Entities;
use Doctrine\Common\Collections\ArrayCollection;

/** 
 * @Entity @Table(name="games") 
 * @HasLifecycleCallbacks
 */
class Game
{
    /**
     * @Id @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /** @Column(type="string", length=255) */
    private $name;

    /** @Column(type="string", length=255) */
    private $publisher;

    /** @Column(type="decimal",scale=2, precision=5) */
    private $price;

    /** 
     * @ManyToMany(targetEntity="Account", mappedBy="games")
     */  
    private $accounts;

    public function __construct()
    {

      $this->created = $this->updated = date('Y-m-d H:i:s');
      $this->accounts =  new ArrayCollection();

    }

    public function addAccount(Account $account)
    {
        $this->accounts[] = $account;
    }
    
    public function getAccounts()
    {
      return $this->accounts;
    }
        
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getPublisher()
    {
        return $this->publisher;
    }

    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;
    }


    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

}
