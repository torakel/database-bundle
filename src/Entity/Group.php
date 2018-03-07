<?php
namespace Torakel\DatabaseBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="group")
 */
class Group
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
     * @ORM\ManyToOne(targetEntity="\Torakel\DatabaseBundle\Entity\Round", inversedBy="groups")
     * @ORM\JoinColumn(name="round_id", referencedColumnName="id")
     */
    protected $round;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection;
     * @ORM\OneToMany(targetEntity="\Torakel\DatabaseBundle\Entity\Matchday", mappedBy="group")
     */
    protected $matchdays;

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
        $this->matchdays = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Group
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
     * @return Group
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
     * @return Group
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
     * @return Group
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
     * @return Group
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
     * @return Group
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
     * Add matchday
     *
     * @param \Torakel\DatabaseBundle\Entity\Matchday $matchday
     *
     * @return Group
     */
    public function addMatchday(\Torakel\DatabaseBundle\Entity\Matchday $matchday)
    {
        $this->matchdays[] = $matchday;

        return $this;
    }

    /**
     * Remove matchday
     *
     * @param \Torakel\DatabaseBundle\Entity\Matchday $matchday
     */
    public function removeMatchday(\Torakel\DatabaseBundle\Entity\Matchday $matchday)
    {
        $this->matchdays->removeElement($matchday);
    }

    /**
     * Get matchdays
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMatchdays()
    {
        return $this->matchdays;
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
