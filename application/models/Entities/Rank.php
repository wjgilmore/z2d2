<?php

namespace Entities;
use Doctrine\Common\Collections\ArrayCollection;

/** 
 * @Entity (repositoryClass="Repositories\Account") 
 * @Table(name="accounts") 
 * @HasLifecycleCallbacks
 */
class Account
{
    /**
     * @Id @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /** @Column(type="string", length=255) */
    private $username;
    
    /** @Column(type="string", length=255) */
    private $email;

    /** @Column(type="string", length=32) */
    private $password;

    /** @Column(type="string", length=10) */
    private $zip;

    /** @Column(type="datetime") */
    private $created;

    /** @Column(type="datetime") */
    private $updated;

    /**
     * @ManyToMany(targetEntity="Game", inversedBy="accounts")
     * @JoinTable(name="accounts_games",
     *      joinColumns={@JoinColumn(name="account_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="game_id", referencedColumnName="id")}
     *      )
     */
    
    private $games;

    public function __construct()
    {

      $this->games = new ArrayCollection();

      $this->created = $this->updated = new \DateTime("now");
    }
   
    /**
     * Add game to account.
     * @param Game $game
     */
    public function addGame(Game $game)
    {
        $game->addAccount($this);
        $this->games[] = $game;
    }
    
    /**
     * Retrieve account's associated games.
     */
    public function getGames()
    {
      return $this->games;
    }

    /**
     * @PreUpdate
     */
    public function updated()
    {
        $this->updated = new \DateTime("now");
    }

    /**
     * Retrieve account id
     */
    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = md5($password);
    }

    public function getZip()
    {
        return $this->zip;
    }

    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setCreated($created)
    {
        $this->created = $created;
    }

    public function getUpdated()
    {
        return $this->updated;
    }

}
