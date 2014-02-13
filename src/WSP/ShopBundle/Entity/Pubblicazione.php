<?php

namespace WSP\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pubblicazione
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="WSP\ShopBundle\Entity\PubblicazioneRepository")
 */
class Pubblicazione
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
     * @ORM\Column(name="giorni", type="integer")
     */
    private $giorni;

    /**
     * @var integer
     *
     * @ORM\Column(name="prezzo", type="integer")
     */
    private $prezzo;

    /**
     * @var string
     *
     * @ORM\Column(name="sconto", type="integer", nullable=true)
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
     * @return Pubblicazione
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
     * Set giorni
     *
     * @param integer $giorni
     * @return Pubblicazione
     */
    public function setGiorni($giorni)
    {
        $this->giorni = $giorni;
    
        return $this;
    }

    /**
     * Get giorni
     *
     * @return integer 
     */
    public function getGiorni()
    {
        return $this->giorni;
    }

    /**
     * Set prezzo
     *
     * @param integer $prezzo
     * @return Pubblicazione
     */
    public function setPrezzo($prezzo)
    {
        $this->prezzo = $prezzo;
    
        return $this;
    }

    /**
     * Get prezzo
     *
     * @return integer 
     */
    public function getPrezzo()
    {
        return $this->prezzo;
    }

    /**
     * Set sconto
     *
     * @param string $sconto
     * @return Pubblicazione
     */
    public function setSconto($sconto)
    {
        $this->sconto = $sconto;
    
        return $this;
    }

    /**
     * Get sconto
     *
     * @return string 
     */
    public function getSconto()
    {
        return $this->sconto;
    }

    /**
     * Set descrizione
     *
     * @param string $descrizione
     * @return Pubblicazione
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
     * @return Pubblicazione
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
    
    public function __toString() {
        return $this->nome;
    }
}
