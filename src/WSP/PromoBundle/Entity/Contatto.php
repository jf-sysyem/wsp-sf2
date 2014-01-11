<?php

namespace WSP\PromoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Contatto
 *
 * @ORM\Table(name="promo_contatti")
 * @ORM\Entity(repositoryClass="WSP\PromoBundle\Entity\ContattoRepository")
 */
class Contatto {

    use TimestampableEntity;

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
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="solleciti", type="array", nullable=true)
     */
    private $solleciti;

    /**
     * @var string
     *
     * @ORM\Column(name="risposta", type="text", nullable=true)
     */
    private $risposta;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="text", nullable=true)
     */
    private $note;

    /**
     * @ORM\ManyToMany(targetEntity="Messaggio", mappedBy="destinatari")
     */
    private $messaggi;

    public function __construct() {
        $this->messaggi = new \Doctrine\Common\Collections\ArrayCollection();
        $this->solleciti = array();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Contatti
     */
    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set contattato
     *
     * @param \DateTime $sollecito
     * @return Contatti
     */
    public function addSollecito($sollecito) {
        $this->solleciti[] = $sollecito;

        return $this;
    }

    /**
     * Set contattato
     *
     * @param array $solleciti
     * @return Contatti
     */
    public function setSolleciti($solleciti) {
        $this->solleciti = $solleciti;

        return $this;
    }

    /**
     * Get contattato
     *
     * @return array 
     */
    public function getSolleciti() {
        return $this->solleciti;
    }

    /**
     * Set note
     *
     * @param string $note
     * @return Contatti
     */
    public function setNote($note) {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string 
     */
    public function getNote() {
        return $this->note;
    }

    /**
     * Set risposta
     *
     * @param string $risposta
     * @return Contatti
     */
    public function setRisposta($risposta) {
        $this->risposta = $risposta;

        return $this;
    }

    /**
     * Get risposta
     *
     * @return string 
     */
    public function getRisposta() {
        return $this->risposta;
    }
    
    /**
     * Add messaggi
     *
     * @param \WSP\PromoBundle\Entity\Messaggio $messaggi
     * @return Messaggio
     */
    public function addMessaggi(\WSP\PromoBundle\Entity\Messaggio $messaggi)
    {
        $this->messaggi[] = $messaggi;
    
        return $this;
    }

    /**
     * Remove messaggi
     *
     * @param \WSP\PromoBundle\Entity\Messaggio $messaggi
     */
    public function removeMessaggi(\WSP\PromoBundle\Entity\Messaggio $messaggi)
    {
        $this->messaggi->removeElement($messaggi);
    }

    /**
     * Get messaggi
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMessaggi()
    {
        return $this->messaggi;
    }
}
