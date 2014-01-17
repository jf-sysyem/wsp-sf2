<?php

namespace WSP\PromoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Messaggio
 *
 * @ORM\Table(name="promo_messaggi")
 * @ORM\Entity(repositoryClass="WSP\PromoBundle\Entity\MessaggioRepository")
 */
class Messaggio {

    use \Gedmo\Timestampable\Traits\TimestampableEntity;

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
     * @ORM\Column(name="subject", type="string", length=255)
     */
    private $subject;

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text")
     */
    private $body;

    /**
     * @ORM\ManyToMany(targetEntity="Contatto")
     * @ORM\JoinTable(name="promo_destinatari",
     *      joinColumns={@ORM\JoinColumn(name="messaggio_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="contatto_id", referencedColumnName="id")}
     *      )
     */
    private $destinatari;

    /**
     * @var \JF\DragDropBundle\Entity\File
     * 
     * @ORM\OneToOne(targetEntity="JF\DragDropBundle\Entity\File")
     * @ORM\JoinColumn(name="foto_id", referencedColumnName="id", nullable=true)
     */
    private $foto;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->destinatari = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set subject
     *
     * @param string $subject
     * @return Messaggio
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    
        return $this;
    }

    /**
     * Get subject
     *
     * @return string 
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set body
     *
     * @param string $body
     * @return Messaggio
     */
    public function setBody($body)
    {
        $this->body = $body;
    
        return $this;
    }

    /**
     * Get body
     *
     * @return string 
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Add destinatari
     *
     * @param \WSP\PromoBundle\Entity\Contatto $destinatari
     * @return Messaggio
     */
    public function addDestinatari(\WSP\PromoBundle\Entity\Contatto $destinatari)
    {
        $this->destinatari[] = $destinatari;
    
        return $this;
    }

    /**
     * Remove destinatari
     *
     * @param \WSP\PromoBundle\Entity\Contatto $destinatari
     */
    public function removeDestinatari(\WSP\PromoBundle\Entity\Contatto $destinatari)
    {
        $this->destinatari->removeElement($destinatari);
    }

    /**
     * Get destinatari
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDestinatari()
    {
        return $this->destinatari;
    }
    
    /**
     * Set foto
     *
     * @param \JF\DragDropBundle\Entity\File $foto
     * @return Messaggio
     */
    public function setFoto($foto = null)
    {
        $this->foto = $foto;
    
        return $this;
    }

    /**
     * Get foto
     *
     * @return \JF\DragDropBundle\Entity\File 
     */
    public function getFoto()
    {
        return $this->foto;
    }
}