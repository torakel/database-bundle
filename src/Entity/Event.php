<?php
namespace Torakel\DatabaseBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="event")
 */
class Event
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
     * @var \Torakel\DatabaseBundle\Entity\Competition
     * @ORM\ManyToOne(targetEntity="\Torakel\DatabaseBundle\Entity\Competition", inversedBy="events")
     * @ORM\JoinColumn(name="competition_id", referencedColumnName="id")
     */
    protected $competition;

    /**
     * @var \Torakel\DatabaseBundle\Entity\Season
     * @ORM\ManyToOne(targetEntity="\Torakel\DatabaseBundle\Entity\Season", inversedBy="events")
     * @ORM\JoinColumn(name="season_id", referencedColumnName="id")
     */
    protected $season;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection;
     * @ORM\OneToMany(targetEntity="\Torakel\DatabaseBundle\Entity\Round", mappedBy="event")
     */
    protected $rounds;

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
        $this->rounds = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Event
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
     * @return Event
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
     * Set altNames
     *
     * @param string $altNames
     *
     * @return Event
     */
    public function setAltNames($altNames)
    {
        $this->altNames = $altNames;

        return $this;
    }

    /**
     * Get altNames
     *
     * @return string
     */
    public function getAltNames()
    {
        return $this->altNames;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Event
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
     * @return Event
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
     * Set competition
     *
     * @param \Torakel\DatabaseBundle\Entity\Competition $competition
     *
     * @return Event
     */
    public function setCompetition(\Torakel\DatabaseBundle\Entity\Competition $competition = null)
    {
        $this->competition = $competition;

        return $this;
    }

    /**
     * Get competition
     *
     * @return \Torakel\DatabaseBundle\Entity\Competition
     */
    public function getCompetition()
    {
        return $this->competition;
    }

    /**
     * Set season
     *
     * @param \Torakel\DatabaseBundle\Entity\Season $season
     *
     * @return Event
     */
    public function setSeason(\Torakel\DatabaseBundle\Entity\Season $season = null)
    {
        $this->season = $season;

        return $this;
    }

    /**
     * Get season
     *
     * @return \Torakel\DatabaseBundle\Entity\Season
     */
    public function getSeason()
    {
        return $this->season;
    }

    /**
     * Add round
     *
     * @param \Torakel\DatabaseBundle\Entity\Round $round
     *
     * @return Event
     */
    public function addRound(\Torakel\DatabaseBundle\Entity\Round $round)
    {
        $this->rounds[] = $round;

        return $this;
    }

    /**
     * Remove round
     *
     * @param \Torakel\DatabaseBundle\Entity\Round $round
     */
    public function removeRound(\Torakel\DatabaseBundle\Entity\Round $round)
    {
        $this->rounds->removeElement($round);
    }

    /**
     * Get rounds
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRounds()
    {
        return $this->rounds;
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
}
