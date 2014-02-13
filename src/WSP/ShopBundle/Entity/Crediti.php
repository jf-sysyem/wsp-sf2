<?php

namespace WSP\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Crediti
 *
 * @ORM\Table(name="shop_crediti")
 * @ORM\Entity(repositoryClass="WSP\ShopBundle\Entity\CreditiRepository")
 */
class Crediti
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
     * @ORM\Column(name="nome", type="string", length=255)
     */
    private $nome;

    /**
     * @var integer
     *
     * @ORM\Column(name="crediti", type="integer")
     */
    private $crediti;

    /**
     * @var float
     *
     * @ORM\Column(name="prezzo", type="decimal", precision=15, scale=2)
     */
    private $prezzo;

    /**
     * @var float
     *
     * @ORM\Column(name="sconto", type="decimal", precision=15, scale=2, nullable=true)
     */
    private $sconto;

    /**
     * @var string
     *
     * @ORM\Column(name="descrizione", type="text", nullable=true)
     */
    private $descrizione;

    /**
     * @var boolean
     *
     * @ORM\Column(name="visibile", type="boolean", nullable=true)
     */
    private $visibile;


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
     * Set nome
     *
     * @param string $nome
     * @return Crediti
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    
        return $this;
    }

    /**
     * Get nome
     *
     * @return string 
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set crediti
     *
     * @param integer $crediti
     * @return Crediti
     */
    public function setCrediti($crediti)
    {
        $this->crediti = $crediti;
    
        return $this;
    }

    /**
     * Get crediti
     *
     * @return integer 
     */
    public function getCrediti()
    {
        return $this->crediti;
    }

    /**
     * Set prezzo
     *
     * @param float $prezzo
     * @return Crediti
     */
    public function setPrezzo($prezzo)
    {
        $this->prezzo = $prezzo;
    
        return $this;
    }

    /**
     * Get prezzo
     *
     * @return float 
     */
    public function getPrezzo()
    {
        return $this->prezzo;
    }

    /**
     * Set sconto
     *
     * @param float $sconto
     * @return Crediti
     */
    public function setSconto($sconto)
    {
        $this->sconto = $sconto;
    
        return $this;
    }

    /**
     * Get sconto
     *
     * @return float 
     */
    public function getSconto()
    {
        return $this->sconto;
    }

    /**
     * Set descrizione
     *
     * @param string $descrizione
     * @return Crediti
     */
    public function setDescrizione($descrizione)
    {
        $this->descrizione = $descrizione;
    
        return $this;
    }

    /**
     * Get descrizione
     *
     * @return string 
     */
    public function getDescrizione()
    {
        return $this->descrizione;
    }

    /**
     * Set visibile
     *
     * @param boolean $visibile
     * @return Crediti
     */
    public function setVisibile($visibile)
    {
        $this->visibile = $visibile;
    
        return $this;
    }

    /**
     * Get visibile
     *
     * @return boolean 
     */
    public function getVisibile()
    {
        return $this->visibile;
    }
    
    function __toString() {
        return $this->getNome();
    }
}
