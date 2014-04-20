<?php

namespace showlist\FormBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Serie
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="showlist\FormBundle\Entity\SerieRepository")
 */
class Serie
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;


    /**
    *
    *@ORM\OneToOne(targetEntity="showlist\FormBundle\Entity\Trailer", cascade={"persist"})
    *
    */
    private $trailerLink;

    /**
    * @ORM\OneToMany(targetEntity="showlist\FormBundle\Entity\Comment", mappedBy="serie")
    *
    **/
    private $comments;

    /**
    *  @ORM\OneToMany(targetEntity="showlist\FormBundle\Entity\Saison", mappedBy="serie")
    */
    private $saisons;

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
     * Set title
     *
     * @param string $title
     * @return Serie
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set trailerLink
     *
     * @param \showlist\FormBundle\Entity\Trailer $trailerLink
     * @return Serie
     */
    public function setTrailerLink(\showlist\FormBundle\Entity\Trailer $trailerLink = null)
    {
        $this->trailerLink = $trailerLink;

        return $this;
    }

    /**
     * Get trailerLink
     *
     * @return \showlist\FormBundle\Entity\Trailer 
     */
    public function getTrailerLink()
    {
        return $this->trailerLink;
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
     * @return Serie
     */
    public function addComment(\showlist\FormBundle\Entity\Comment $comments)
    {
        $this->comments[] = $comments;
        $comments->setSerie($this);
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

    /**
     * Add saisons
     *
     * @param \showlist\FormBundle\Entity\Saison $saisons
     * @return Serie
     */
    public function addSaison(\showlist\FormBundle\Entity\Saison $saisons)
    {
        $this->saisons[] = $saisons;

        return $this;
    }

    /**
     * Remove saisons
     *
     * @param \showlist\FormBundle\Entity\Saison $saisons
     */
    public function removeSaison(\showlist\FormBundle\Entity\Saison $saisons)
    {
        $this->saisons->removeElement($saisons);
    }

    /**
     * Get saisons
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSaisons()
    {
        return $this->saisons;
    }
}
