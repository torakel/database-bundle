<?php
namespace Torakel\DatabaseBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="competition")
 */
class Competition
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
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    protected $altNames;

    /**
     * @var \Torakel\DatabaseBundle\Entity\Continent
     * @ORM\ManyToOne(targetEntity="\Torakel\DatabaseBundle\Entity\Continent", inversedBy="competitions")
     * @ORM\JoinColumn(name="continent_id", referencedColumnName="id")
     */
    protected $continent;

    /**
     * @var \Torakel\DatabaseBundle\Entity\Country
     * @ORM\ManyToOne(targetEntity="\Torakel\DatabaseBundle\Entity\Country", inversedBy="competitions")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     */
    protected $country;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection;
     * @ORM\OneToMany(targetEntity="\Torakel\DatabaseBundle\Entity\Event", mappedBy="competition")
     */
    protected $events;

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
        $this->events = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Competition
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
     * @return Competition
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
     * @return Competition
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
     * @return Competition
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
     * @return Competition
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
     * Set continent
     *
     * @param \Torakel\DatabaseBundle\Entity\Continent $continent
     *
     * @return Competition
     */
    public function setContinent(\Torakel\DatabaseBundle\Entity\Continent $continent = null)
    {
        $this->continent = $continent;

        return $this;
    }

    /**
     * Get continent
     *
     * @return \Torakel\DatabaseBundle\Entity\Continent
     */
    public function getContinent()
    {
        return $this->continent;
    }

    /**
     * Set country
     *
     * @param \Torakel\DatabaseBundle\Entity\Country $country
     *
     * @return Competition
     */
    public function setCountry(\Torakel\DatabaseBundle\Entity\Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \Torakel\DatabaseBundle\Entity\Country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Add event
     *
     * @param \Torakel\DatabaseBundle\Entity\Event $event
     *
     * @return Competition
     */
    public function addEvent(\Torakel\DatabaseBundle\Entity\Event $event)
    {
        $this->events[] = $event;

        return $this;
    }

    /**
     * Remove event
     *
     * @param \Torakel\DatabaseBundle\Entity\Event $event
     */
    public function removeEvent(\Torakel\DatabaseBundle\Entity\Event $event)
    {
        $this->events->removeElement($event);
    }

    /**
     * Get events
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEvents()
    {
        return $this->events;
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
