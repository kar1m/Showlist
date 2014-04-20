<?php

namespace showlist\FormBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Saison
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="showlist\FormBundle\Entity\SaisonRepository")
 */
class Saison
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
     * @ORM\Column(name="description", type="string", length=512)
     */
    private $description;

    /**
    * @ORM\ManyToOne(targetEntity="showlist\FormBundle\Entity\Serie", inversedBy="saisons")
    * @ORM\JoinColumn(nullable=false)
    *
    */
    private $serie;

    /**
    * @ORM\OneToMany(targetEntity="showlist\FormBundle\Entity\Episode", mappedBy="saison")
    *
    */
    private $episodes;

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
     * Set description
     *
     * @param string $description
     * @return Saison
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
     * Set serie
     *
     * @param \showlist\FormBundle\Entity\Serie $serie
     * @return Saison
     */
    public function setSerie(\showlist\FormBundle\Entity\Serie $serie)
    {
        $this->serie = $serie;

        return $this;
    }

    /**
     * Get serie
     *
     * @return \showlist\FormBundle\Entity\Serie 
     */
    public function getSerie()
    {
        return $this->serie;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->episodes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add episodes
     *
     * @param \showlist\FormBundle\Entity\Episode $episodes
     * @return Saison
     */
    public function addEpisode(\showlist\FormBundle\Entity\Episode $episodes)
    {
        $this->episodes[] = $episodes;

        return $this;
    }

    /**
     * Remove episodes
     *
     * @param \showlist\FormBundle\Entity\Episode $episodes
     */
    public function removeEpisode(\showlist\FormBundle\Entity\Episode $episodes)
    {
        $this->episodes->removeElement($episodes);
    }

    /**
     * Get episodes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEpisodes()
    {
        return $this->episodes;
    }
}
