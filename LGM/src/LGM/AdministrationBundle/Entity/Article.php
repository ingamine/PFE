<?php

namespace LGM\AdministrationBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo; // gedmo annotations
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;


/**
 * Article
 *
 * @ORM\Table(name="article")
 * @ORM\Entity(repositoryClass="LGM\AdministrationBundle\Repository\ArticleRepository")
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false)
 * @ORM\HasLifecycleCallbacks
 */


/**
 * @ORM\Entity
 * 
 */

class Article
{
    
    
    /**
     * @var int
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
     * @var \DateTime
     *
     * @ORM\Column(name="anneePublication", type="date")
     */
    private $anneePublication;

    /**
     * @var int
     *
     * @ORM\Column(name="nbAuteur", type="integer")
     */
    private $nbAuteur;

    /**
     * @var string
     *
     * @ORM\Column(name="valeur", type="string", length=255)
     */
    private $valeur;

    /**
     * @var string
     *
     * @ORM\Column(name="nomJournal", type="string", length=255)
     */
    private $nomJournal;

     /**
     * @var string
     *
     * @ORM\Column(name="indx", type="string", length=255)
     */
    private $indx;

    /**
     * @var string
     *
     * @ORM\Column(name="vol", type="string", length=255)
     */
    private $vol;

    /**
     * @var string
     *
     * @ORM\Column(name="num", type="string", length=255)
     */
    private $num;

    /**
     * @var string
     *
     * @ORM\Column(name="pp", type="string", length=255)
     */
    private $pp;
    
    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $created;

     /**
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="update")
     */
    private $updated;

     /**
     * @ORM\Column(name="deletedAt", type="datetime", nullable=true)
     */
    private $deletedAt;
    
    
        
    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=255, nullable=false, unique=true)
     */
           
            
    private $token;
   
    /**
     * @ORM\OneToOne(targetEntity="LGM\AdministrationBundle\Entity\Media", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    
    private $brochure;
    
    
    
    /**
     *@ORM\ManyToOne(targetEntity="LGM\UserBundle\Entity\User", inversedBy="articles", cascade={"persist", "remove"})
     */
    
    private $user;
  
    
    public function __construct() {
        $this->token = base_convert(sha1(uniqid(mt_rand(1, 999), true)),16, 36);
         $this->setCreated(new \DateTime());
         
        $this->nbAuteur = 0;
               
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
     * @return Article
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
     * Set anneePublication
     *
     * @param \DateTime $anneePublication
     * @return Article
     */
    public function setAnneePublication($anneePublication)
    {
        $this->anneePublication = $anneePublication;

        return $this;
    }

    /**
     * Get anneePublication
     *
     * @return \DateTime 
     */
    public function getAnneePublication()
    {
        return $this->anneePublication;
    }

    /**
     * Set nbAuteur
     *
     * @param integer $nbAuteur
     * @return Article
     */
    public function setNbAuteur($nbAuteur)
    {
        $this->nbAuteur = $nbAuteur;

        return $this;
    }

    /**
     * Get nbAuteur
     *
     * @return integer 
     */
    public function getNbAuteur()
    {
        return $this->nbAuteur;
    }

    /**
     * Set valeur
     *
     * @param string $valeur
     * @return Article
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;

        return $this;
    }

    /**
     * Get valeur
     *
     * @return string 
     */
    public function getValeur()
    {
        return $this->valeur;
    }

    /**
     * Set nomJournal
     *
     * @param string $nomJournal
     * @return Article
     */
    public function setNomJournal($nomJournal)
    {
        $this->nomJournal = $nomJournal;

        return $this;
    }

    /**
     * Get nomJournal
     *
     * @return string 
     */
    public function getNomJournal()
    {
        return $this->nomJournal;
    }

    /**
     * Set token
     *
     * @param string $token
     * @return Article
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string 
     */
    public function getToken()
    {
        return $this->token;
    }

    

    /**
     * Set brochure
     *
     * @param \LGM\AdministrationBundle\Entity\Media $brochure
     * @return Article
     */
    public function setBrochure(\LGM\AdministrationBundle\Entity\Media $brochure)
    {
        $this->brochure = $brochure;

        return $this;
    }

    /**
     * Get brochure
     *
     * @return \LGM\AdministrationBundle\Entity\Media 
     */
    public function getBrochure()
    {
        return $this->brochure;
    }

    /**
     * Set indx
     *
     * @param string $indx
     * @return Article
     */
    public function setIndx($indx)
    {
        $this->indx = $indx;

        return $this;
    }

    /**
     * Get indx
     *
     * @return string 
     */
    public function getIndx()
    {
        return $this->indx;
    }

    /**
     * Set vol
     *
     * @param string $vol
     * @return Article
     */
    public function setVol($vol)
    {
        $this->vol = $vol;

        return $this;
    }

    /**
     * Get vol
     *
     * @return string 
     */
    public function getVol()
    {
        return $this->vol;
    }

    /**
     * Set num
     *
     * @param string $num
     * @return Article
     */
    public function setNum($num)
    {
        $this->num = $num;

        return $this;
    }

    /**
     * Get num
     *
     * @return string 
     */
    public function getNum()
    {
        return $this->num;
    }

    /**
     * Set pp
     *
     * @param string $pp
     * @return Article
     */
    public function setPp($pp)
    {
        $this->pp = $pp;

        return $this;
    }

    /**
     * Get pp
     *
     * @return string 
     */
    public function getPp()
    {
        return $this->pp;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Article
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Article
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     * @return Article
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    /**
     * Get deletedAt
     *
     * @return \DateTime 
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    

    /**
     * Set user
     *
     * @param \LGM\UserBundle\Entity\User $user
     * @return Article
     */
    public function setUser(\LGM\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \LGM\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
