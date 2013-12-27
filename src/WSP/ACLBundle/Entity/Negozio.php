<?php

namespace WSP\ACLBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Negozio
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="WSP\ACLBundle\Entity\NegozioRepository")
 */
class Negozio
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
     * @var string
     *
     * @ORM\Column(name="indirizzo", type="string", length=255)
     */
    private $indirizzo;

    /**
     * @var string
     *
     * @ORM\Column(name="comune", type="string", length=255)
     */
    private $comune;

    /**
     * @var string
     *
     * @ORM\Column(name="cap", type="string", length=5)
     */
    private $cap;

    /**
     * @var string
     *
     * @ORM\Column(name="partita_iva", type="string", length=16)
     */
    private $partitaIva;

    /**
     * @var integer
     *
     * @ORM\Column(name="categoria", type="integer")
     */
    private $categoria;

    /**
     * @var string
     *
     * @ORM\Column(name="email_negozio", type="string", length=255)
     */
    private $emailNegozio;

    /**
     * @var string
     *
     * @ORM\Column(name="logo", type="string", length=255)
     */
    private $logo;

    /**
     * @var string
     *
     * @ORM\Column(name="descrizione", type="text")
     */
    private $descrizione;

    /**
     * @var string
     *
     * @ORM\Column(name="capo_negozio", type="string", length=255)
     */
    private $capoNegozio;

    /**
     * @var string
     *
     * @ORM\Column(name="email_capo_negozio", type="string", length=255)
     */
    private $emailCapoNegozio;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=20)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="cellulare", type="string", length=20)
     */
    private $cellulare;

    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=20)
     */
    private $fax;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono_capo_negozio", type="string", length=20)
     */
    private $telefonoCapoNegozio;

    /**
     * @var string
     *
     * @ORM\Column(name="sito", type="string", length=255)
     */
    private $sito;

    /**
     * @var array
     *
     * @ORM\Column(name="orari", type="array")
     */
    private $orari;

    /**
     * @var string
     *
     * @ORM\Column(name="aperture_speciali", type="text")
     */
    private $apertureSpeciali;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ambulante", type="boolean")
     */
    private $ambulante;


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
     * @return Negozio
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
     * Set indirizzo
     *
     * @param string $indirizzo
     * @return Negozio
     */
    public function setIndirizzo($indirizzo)
    {
        $this->indirizzo = $indirizzo;
    
        return $this;
    }

    /**
     * Get indirizzo
     *
     * @return string 
     */
    public function getIndirizzo()
    {
        return $this->indirizzo;
    }

    /**
     * Set comune
     *
     * @param string $comune
     * @return Negozio
     */
    public function setComune($comune)
    {
        $this->comune = $comune;
    
        return $this;
    }

    /**
     * Get comune
     *
     * @return string 
     */
    public function getComune()
    {
        return $this->comune;
    }

    /**
     * Set cap
     *
     * @param string $cap
     * @return Negozio
     */
    public function setCap($cap)
    {
        $this->cap = $cap;
    
        return $this;
    }

    /**
     * Get cap
     *
     * @return string 
     */
    public function getCap()
    {
        return $this->cap;
    }

    /**
     * Set partitaIva
     *
     * @param string $partitaIva
     * @return Negozio
     */
    public function setPartitaIva($partitaIva)
    {
        $this->partitaIva = $partitaIva;
    
        return $this;
    }

    /**
     * Get partitaIva
     *
     * @return string 
     */
    public function getPartitaIva()
    {
        return $this->partitaIva;
    }

    /**
     * Set categoria
     *
     * @param integer $categoria
     * @return Negozio
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    
        return $this;
    }

    /**
     * Get categoria
     *
     * @return integer 
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set emailNegozio
     *
     * @param string $emailNegozio
     * @return Negozio
     */
    public function setEmailNegozio($emailNegozio)
    {
        $this->emailNegozio = $emailNegozio;
    
        return $this;
    }

    /**
     * Get emailNegozio
     *
     * @return string 
     */
    public function getEmailNegozio()
    {
        return $this->emailNegozio;
    }

    /**
     * Set logo
     *
     * @param string $logo
     * @return Negozio
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    
        return $this;
    }

    /**
     * Get logo
     *
     * @return string 
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set descrizione
     *
     * @param string $descrizione
     * @return Negozio
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
     * Set capoNegozio
     *
     * @param string $capoNegozio
     * @return Negozio
     */
    public function setCapoNegozio($capoNegozio)
    {
        $this->capoNegozio = $capoNegozio;
    
        return $this;
    }

    /**
     * Get capoNegozio
     *
     * @return string 
     */
    public function getCapoNegozio()
    {
        return $this->capoNegozio;
    }

    /**
     * Set emailCapoNegozio
     *
     * @param string $emailCapoNegozio
     * @return Negozio
     */
    public function setEmailCapoNegozio($emailCapoNegozio)
    {
        $this->emailCapoNegozio = $emailCapoNegozio;
    
        return $this;
    }

    /**
     * Get emailCapoNegozio
     *
     * @return string 
     */
    public function getEmailCapoNegozio()
    {
        return $this->emailCapoNegozio;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Negozio
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    
        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set cellulare
     *
     * @param string $cellulare
     * @return Negozio
     */
    public function setCellulare($cellulare)
    {
        $this->cellulare = $cellulare;
    
        return $this;
    }

    /**
     * Get cellulare
     *
     * @return string 
     */
    public function getCellulare()
    {
        return $this->cellulare;
    }

    /**
     * Set fax
     *
     * @param string $fax
     * @return Negozio
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
    
        return $this;
    }

    /**
     * Get fax
     *
     * @return string 
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set telefonoCapoNegozio
     *
     * @param string $telefonoCapoNegozio
     * @return Negozio
     */
    public function setTelefonoCapoNegozio($telefonoCapoNegozio)
    {
        $this->telefonoCapoNegozio = $telefonoCapoNegozio;
    
        return $this;
    }

    /**
     * Get telefonoCapoNegozio
     *
     * @return string 
     */
    public function getTelefonoCapoNegozio()
    {
        return $this->telefonoCapoNegozio;
    }

    /**
     * Set sito
     *
     * @param string $sito
     * @return Negozio
     */
    public function setSito($sito)
    {
        $this->sito = $sito;
    
        return $this;
    }

    /**
     * Get sito
     *
     * @return string 
     */
    public function getSito()
    {
        return $this->sito;
    }

    /**
     * Set orari
     *
     * @param array $orari
     * @return Negozio
     */
    public function setOrari($orari)
    {
        $this->orari = $orari;
    
        return $this;
    }

    /**
     * Get orari
     *
     * @return array 
     */
    public function getOrari()
    {
        return $this->orari;
    }

    /**
     * Set apertureSpeciali
     *
     * @param string $apertureSpeciali
     * @return Negozio
     */
    public function setApertureSpeciali($apertureSpeciali)
    {
        $this->apertureSpeciali = $apertureSpeciali;
    
        return $this;
    }

    /**
     * Get apertureSpeciali
     *
     * @return string 
     */
    public function getApertureSpeciali()
    {
        return $this->apertureSpeciali;
    }

    /**
     * Set ambulante
     *
     * @param boolean $ambulante
     * @return Negozio
     */
    public function setAmbulante($ambulante)
    {
        $this->ambulante = $ambulante;
    
        return $this;
    }

    /**
     * Get ambulante
     *
     * @return boolean 
     */
    public function getAmbulante()
    {
        return $this->ambulante;
    }
}
