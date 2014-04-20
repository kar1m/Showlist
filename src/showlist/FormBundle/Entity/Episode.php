<?php

namespace showlist\FormBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Episode
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="showlist\FormBundle\Entity\EpisodeRepository")
 */
class Episode
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
     * @var array
     *
     * @ORM\Column(name="actors", type="array")
     */
    private $actors;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="broadcastDate", type="datetime")
     */
    private $broadcastDate;

    /**
    * @ORM\ManyToOne(targetEntity="showlist\FormBundle\Entity\Saison",inversedBy="episodes")
    * @ORM\JoinColumn(nullable=false)
    *
    */
    private $saison;


    /**
    * @ORM\OneToMany(targetEntity="showlist\FormBundle\Entity\Comment", mappedBy="episode")
    *
    */
    private $comments;

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
     * @return Episode
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
     * Set actors
     *
     * @param array $actors
     * @return Episode
     */
    public function setActors($actors)
    {
        $this->actors = $actors;

        return $this;
    }

    /**
     * Get actors
     *
     * @return array 
     */
    public function getActors()
    {
        return $this->actors;
    }

    /**
     * Set broadcastDate
     *
     * @param \DateTime $broadcastDate
     * @return Episode
     */
    public function setBroadcastDate($broadcastDate)
    {
        $this->broadcastDate = $broadcastDate;

        return $this;
    }

    /**
     * Get broadcastDate
     *
     * @return \DateTime 
     */
    public function getBroadcastDate()
    {
        return $this->broadcastDate;
    }

    /**
     * Set saison
     *
     * @param \showlist\FormBundle\Entity\Saison $saison
     * @return Episode
     */
    public function setSaison(\showlist\FormBundle\Entity\Saison $saison = null)
    {
        $this->saison = $saison;

        return $this;
    }

    /**
     * Get saison
     *
     * @return \showlist\FormBundle\Entity\Saison 
     */
    public function getSaison()
    {
        return $this->saison;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add comments
     *
     * @param \showlist\FormBundle\Entity\Comment $comments
     * @return Episode
     */
    public function addComment(\showlist\FormBundle\Entity\Comment $comments)
    {
        $this->comments[] = $comments;

        return $this;
    }

    /**
     * Remove comments
     *
     * @param \showlist\FormBundle\Entity\Comment $comments
     */
    public function removeComment(\showlist\FormBundle\Entity\Comment $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }
}
