<?php
namespace Torakel\DatabaseBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Torakel\DatabaseBundle\Repository\MatchdayRepository")
 * @ORM\Table(name="matchday")
 */
class Matchday
{

    /**
     * @var integer
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $slug;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @var \Torakel\DatabaseBundle\Entity\Round
     * @ORM\ManyToOne(targetEntity="\Torakel\DatabaseBundle\Entity\Round", inversedBy="matchdays")
     * @ORM\JoinColumn(name="round_id", referencedColumnName="id")
     */
    protected $round;

    /**
     * @var \Torakel\DatabaseBundle\Entity\Round
     * @ORM\ManyToOne(targetEntity="\Torakel\DatabaseBundle\Entity\Group", inversedBy="matchdays")
     * @ORM\JoinColumn(name="group_id", referencedColumnName="id")
     */
    protected $group;

    /**
     * @var \Torakel\DatabaseBundle\Entity\MatchdayTable
     * @ORM\OneToOne(targetEntity="\Torakel\DatabaseBundle\Entity\MatchdayTable", mappedBy="matchday")
     */
    protected $matchdayTable;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection;
     * @ORM\OneToMany(targetEntity="\Torakel\DatabaseBundle\Entity\Game", mappedBy="matchday")
     */
    protected $games;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    protected $position;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", name="created_at")
     */
    protected $createdAt;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", name="updated_at", nullable=true)
     */
    protected $updatedAt;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->games = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set slug
     *
     * @param string $slug
     *
     * @return Matchday
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Matchday
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set position
     *
     * @param integer $position
     *
     * @return Matchday
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Matchday
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Matchday
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set round
     *
     * @param \Torakel\DatabaseBundle\Entity\Round $round
     *
     * @return Matchday
     */
    public function setRound(\Torakel\DatabaseBundle\Entity\Round $round = null)
    {
        $this->round = $round;

        return $this;
    }

    /**
     * Get round
     *
     * @return \Torakel\DatabaseBundle\Entity\Round
     */
    public function getRound()
    {
        return $this->round;
    }

    /**
     * Set group
     *
     * @param \Torakel\DatabaseBundle\Entity\Group $group
     *
     * @return Matchday
     */
    public function setGroup(\Torakel\DatabaseBundle\Entity\Group $group = null)
    {
        $this->group = $group;

        return $this;
    }

    /**
     * Get group
     *
     * @return \Torakel\DatabaseBundle\Entity\Group
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Add game
     *
     * @param \Torakel\DatabaseBundle\Entity\Game $game
     *
     * @return Matchday
     */
    public function addGame(\Torakel\DatabaseBundle\Entity\Game $game)
    {
        $this->games[] = $game;

        return $this;
    }

    /**
     * Remove game
     *
     * @param \Torakel\DatabaseBundle\Entity\Game $game
     */
    public function removeGame(\Torakel\DatabaseBundle\Entity\Game $game)
    {
        $this->games->removeElement($game);
    }

    /**
     * Get games
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGames()
    {
        return $this->games;
    }

    /**
     * @ORM\PrePersist
     */
    public function prePersist()
    {
        $this->createdAt = new \DateTime();
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
        $this->updatedAt = new \DateTime();
    }

    /**
     * Set matchdayTable
     *
     * @param \Torakel\DatabaseBundle\Entity\MatchdayTable $matchdayTable
     *
     * @return Matchday
     */
    public function setMatchdayTable(\Torakel\DatabaseBundle\Entity\MatchdayTable $matchdayTable = null)
    {
        $this->matchdayTable = $matchdayTable;

        return $this;
    }

    /**
     * Get matchdayTable
     *
     * @return \Torakel\DatabaseBundle\Entity\MatchdayTable
     */
    public function getMatchdayTable()
    {
        return $this->matchdayTable;
    }
}
