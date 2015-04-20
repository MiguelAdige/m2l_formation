<?php

namespace M2L\FormationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use M2L\UserBundle\Entity\User;

/**
 * Formation
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Formation
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
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_post", type="date")
     */
    private $datePost;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut", type="date")
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="date")
     */
    private $dateFin;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_inscrit", type="integer", nullable=true)
     */
    private $nbrInscrit;

    /**
     * @ORM\ManyToMany(targetEntity="M2L\UserBundle\Entity\User", mappedBy="formation")
     **/
    private $user;

    public function __construct()
    {
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
        $this->datePost = new \Datetime();
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
     * Set titre
     *
     * @param string $titre
     * @return Formation
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
     * Set description
     *
     * @param string $description
     * @return Formation
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set datePost
     *
     * @param \DateTime $datePost
     * @return Formation
     */
    public function setDatePost($datePost)
    {
        $this->datePost = $datePost;

        return $this;
    }

    /**
     * Get datePost
     *
     * @return \DateTime 
     */
    public function getDatePost()
    {
        return $this->datePost;
    }

    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     * @return Formation
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime 
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     * @return Formation
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime 
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set nbrInscrit
     *
     * @param integer $nbrInscrit
     * @return Formation
     */
    public function setNbrInscrit($nbrInscrit)
    {
        $this->nbrInscrit = $nbrInscrit;

        return $this;
    }

    /**
     * Get nbrInscrit
     *
     * @return integer 
     */
    public function getNbrInscrit()
    {
        return $this->nbrInscrit;
    }

    /**
     * Add user
     *
     * @param \M2L\UserBundle\Entity\User $user
     * @return Formation
     */
    public function addUser(\M2L\UserBundle\Entity\User $user)
    {
        $this->user[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \M2L\UserBundle\Entity\User $user
     */
    public function removeUser(\M2L\UserBundle\Entity\User $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUser()
    {
        return $this->user;
    }
}
