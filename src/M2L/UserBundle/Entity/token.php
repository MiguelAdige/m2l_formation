<?php

namespace M2L\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * token
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class token
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
     * @ORM\Column(name="code", type="string", length=255)
     */
    private $code;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="validite", type="date")
     */
    private $validite;


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
     * Set code
     *
     * @param string $code
     * @return token
     */
    public function setCode($code)
    {
        $this->code = $code;
    
        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set validite
     *
     * @param \DateTime $validite
     * @return token
     */
    public function setValidite($validite)
    {
        $this->validite = $validite;
    
        return $this;
    }

    /**
     * Get validite
     *
     * @return \DateTime 
     */
    public function getValidite()
    {
        return $this->validite;
    }
}
