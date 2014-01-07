<?php

namespace WSP\ACLBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Negozio
 *
 * @ORM\Table(name="acl_negozio")
 * @ORM\Entity(repositoryClass="WSP\ACLBundle\Entity\NegozioRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Negozio
{
    
    use \Ephp\GeoBundle\Model\Traits\BaseGeo;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \JF\ACLBundle\Entity\Cliente
     * 
     * @ORM\ManyToOne(targetEntity="JF\ACLBundle\Entity\Cliente")
     * @ORM\JoinColumn(name="cliente_id", referencedColumnName="id", nullable=true)
     */
    private $cliente;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255)
     */
    private $nome;

    /**
     * @var Categoria
     * 
     * @ORM\ManyToOne(targetEntity="Categoria")
     * @ORM\JoinColumn(name="categoria_id", referencedColumnName="id", nullable=true)
     */
    private $categoria;

    /**
     * @var Categoria
     * 
     * @ORM\ManyToMany(targetEntity="Categoria")
     * @ORM\JoinTable(name="acl_categorie_negozi",
     *      joinColumns={@ORM\JoinColumn(name="negozio_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="categoria_id", referencedColumnName="id")}
     *      )
     */
    private $categorie;

    /**
     * @var string
     *
     * @ORM\Column(name="email_negozio", type="string", length=255, nullable=true)
     */
    private $emailNegozio;

    /**
     * @var string
     *
     * @ORM\Column(name="logo", type="string", length=255, nullable=true)
     */
    private $logo;

    /**
     * @var string
     *
     * @ORM\Column(name="descrizione", type="text", nullable=true)
     */
    private $descrizione;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=20, nullable=true)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="cellulare", type="string", length=20, nullable=true)
     */
    private $cellulare;

    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=20, nullable=true)
     */
    private $fax;

    /**
     * @var string
     *
     * @ORM\Column(name="sito", type="string", length=255, nullable=true)
     */
    private $sito;

    /**
     * @var array
     *
     * @ORM\Column(name="orari", type="array", nullable=true)
     */
    private $orari;

    /**
     * @var string
     *
     * @ORM\Column(name="aperture_speciali", type="text", nullable=true)
     */
    private $apertureSpeciali;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ambulante", type="boolean", nullable=true)
     */
    private $ambulante;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categorie = new \Doctrine\Common\Collections\ArrayCollection();
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

    /**
     * Set cliente
     *
     * @param \JF\ACLBundle\Entity\Cliente $cliente
     * @return Negozio
     */
    public function setCliente(\JF\ACLBundle\Entity\Cliente $cliente = null)
    {
        $this->cliente = $cliente;
    
        return $this;
    }

    /**
     * Get cliente
     *
     * @return \JF\ACLBundle\Entity\Cliente 
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Set categoria
     *
     * @param \WSP\ACLBundle\Entity\Categoria $categoria
     * @return Negozio
     */
    public function setCategoria(\WSP\ACLBundle\Entity\Categoria $categoria = null)
    {
        $this->categoria = $categoria;
    
        return $this;
    }

    /**
     * Get categoria
     *
     * @return \WSP\ACLBundle\Entity\Categoria 
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Add categorie
     *
     * @param \WSP\ACLBundle\Entity\Categoria $categorie
     * @return Negozio
     */
    public function addCategorie(\WSP\ACLBundle\Entity\Categoria $categorie)
    {
        $this->categorie[] = $categorie;
    
        return $this;
    }

    /**
     * Remove categorie
     *
     * @param \WSP\ACLBundle\Entity\Categoria $categorie
     */
    public function removeCategorie(\WSP\ACLBundle\Entity\Categoria $categorie)
    {
        $this->categorie->removeElement($categorie);
    }

    /**
     * Get categorie
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategorie()
    {
        return $this->categorie;
    }
    
    /**
     * @ORM\PrePersist
     */
    public function prePersist() {
        $this->latitudinerad = deg2rad($this->latitudine);
        $this->longitudinerad = deg2rad($this->longitudine);
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate() {
        $this->latitudinerad = deg2rad($this->latitudine);
        $this->longitudinerad = deg2rad($this->longitudine);
    }
}