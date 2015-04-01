<?php

namespace M2L\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use M2L\UserBundle\Entity\user;

/**
 * messagerie
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class messagerie
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="expediteur", type="integer")
     */
    private $expediteur;

    /**
     * @var integer
     *
     * @ORM\Column(name="destinataire", type="integer")
     */
    private $destinataire;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="msg", type="text")
     */
    private $msg;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var boolean
     *
     * @ORM\Column(name="lu", type="boolean")
     */
    private $lu;


    public function __construct()
    {
        $this->date = new \DateTime();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set expediteur
     *
     * @param integer $expediteur
     * @return messagerie
     */
    public function setExpediteur($expediteur)
    {
        $this->expediteur = $expediteur;
    
        return $this;
    }

    /**
     * Get expediteur
     *
     * @return integer 
     */
    public function getExpediteur()
    {
        return $this->expediteur;
    }

    /**
     * Set destinataire
     *
     * @param integer $destinataire
     * @return messagerie
     */
    public function setDestinataire($destinataire)
    {
        $this->destinataire = $destinataire;
    
        return $this;
    }

    /**
     * Get destinataire
     *
     * @return integer 
     */
    public function getDestinataire()
    {
        return $this->destinataire;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return messagerie
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    
        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set msg
     *
     * @param string $msg
     * @return messagerie
     */
    public function setMsqg($msg)
    {
        $this->msg = $msg;
    
        return $this;
    }

    /**
     * Get msg
     *
     * @return string 
     */
    public function getMsqg()
    {
        return $this->msg;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return messagerie
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set lu
     *
     * @param boolean $lu
     * @return messagerie
     */
    public function setLu($lu)
    {
        $this->lu = $lu;
    
        return $this;
    }

    /**
     * Get lu
     *
     * @return boolean 
     */
    public function getLu()
    {
        return $this->lu;
    }

    /**
     * Add messagerie
     *
     * @param \M2L\UserBundle\Entity\messagerie $messagerie
     * @return User
     */
    public function addMessagerie(\M2L\UserBundle\Entity\messagerie $messagerie)
    {
        $this->messagerie[] = $messagerie;
    
        return $this;
    }

    /**
     * Remove messagerie
     *
     * @param \M2L\UserBundle\Entity\messagerie $messagerie
     */
    public function removeMessagerie(\M2L\UserBundle\Entity\messagerie $messagerie)
    {
        $this->messagerie->removeElement($messagerie);
    }


    /**
     * Set msg
     *
     * @param string $msg
     * @return messagerie
     */
    public function setMsg($msg)
    {
        $this->msg = $msg;
    
        return $this;
    }

    /**
     * Get msg
     *
     * @return string 
     */
    public function getMsg()
    {
        return $this->msg;
    }
}
