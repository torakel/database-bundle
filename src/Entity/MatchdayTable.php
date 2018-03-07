<?php
namespace Torakel\DatabaseBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="matchday_table")
 */
class MatchdayTable
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
     * @var \Torakel\DatabaseBundle\Entity\Matchday
     * @ORM\OneToOne(targetEntity="\Torakel\DatabaseBundle\Entity\Matchday", inversedBy="matchdayTable")
     * @ORM\JoinColumn(name="matchday_id", referencedColumnName="id")
     */
    protected $matchday;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection;
     * @ORM\OneToMany(targetEntity="\Torakel\DatabaseBundle\Entity\TablePosition", mappedBy="matchdayTable")
     * @ORM\OrderBy({"position" = "ASC"})
     */
    protected $tablePositions;

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
        $this->homeGames = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tablePositions = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Table
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Table
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
     * @return Table
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
     * Set matchday
     *
     * @param \Torakel\DatabaseBundle\Entity\Matchday $matchday
     *
     * @return Table
     */
    public function setMatchday(\Torakel\DatabaseBundle\Entity\Matchday $matchday = null)
    {
        $this->matchday = $matchday;

        return $this;
    }

    /**
     * Get matchday
     *
     * @return \Torakel\DatabaseBundle\Entity\Matchday
     */
    public function getMatchday()
    {
        return $this->matchday;
    }

    /**
     * Add tablePosition
     *
     * @param \Torakel\DatabaseBundle\Entity\TablePosition $tablePosition
     *
     * @return Table
     */
    public function addTablePosition(\Torakel\DatabaseBundle\Entity\TablePosition $tablePosition)
    {
        $this->tablePositions[] = $tablePosition;

        return $this;
    }

    /**
     * Remove tablePosition
     *
     * @param \Torakel\DatabaseBundle\Entity\TablePosition $tablePosition
     */
    public function removeTablePosition(\Torakel\DatabaseBundle\Entity\TablePosition $tablePosition)
    {
        $this->tablePositions->removeElement($tablePosition);
    }

    /**
     * Get tablePositions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTablePositions()
    {
        return $this->tablePositions;
    }
}
