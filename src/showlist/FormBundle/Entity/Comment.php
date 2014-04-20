<?php

namespace showlist\FormBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comment
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="showlist\FormBundle\Entity\CommentRepository")
 */
class Comment
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
     * @var integer
     *
     * @ORM\Column(name="grade", type="integer")
     */
    private $grade;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=511)
     */
    private $content;



    /**
    * @ORM\ManyToOne(targetEntity="showlist\FormBundle\Entity\Serie", inversedBy="comments")
    *     
    **/
    private $serie;

    /**
    * @ORM\ManyToOne(targetEntity="showlist\FormBundle\Entity\Episode", inversedBy="comments")
    * 
    *
    **/
    private $episode;

    /**
    * @ORM\ManyToOne(targetEntity="showlist\FormBundle\Entity\User", inversedBy="comments")
    * @ORM\JoinColumn(nullable=false)
    *
    **/
    private $author;

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
     * Set grade
     *
     * @param integer $grade
     * @return Comment
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;

        return $this;
    }

    /**
     * Get grade
     *
     * @return integer 
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Comment
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set serie
     *
     * @param \showlist\FormBundle\Entity\Serie $serie
     * @return Comment
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
     * Set author
     *
     * @param \showlist\FormBundle\Entity\User $author
     * @return Comment
     */
    public function setAuthor(\showlist\FormBundle\Entity\User $author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return \showlist\FormBundle\Entity\User 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set episode
     *
     * @param \showlist\FormBundle\Entity\Episode $episode
     * @return Comment
     */
    public function setEpisode(\showlist\FormBundle\Entity\Episode $episode = null)
    {
        $this->episode = $episode;

        return $this;
    }

    /**
     * Get episode
     *
     * @return \showlist\FormBundle\Entity\Episode 
     */
    public function getEpisode()
    {
        return $this->episode;
    }
}
