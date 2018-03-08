<?php
namespace Torakel\DatabaseBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="club")
 */
class Club
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
     * @ORM\Column(name="international_name")
     */
    protected $internationalName;

    /**
     * @var string
     * @ORM\Column(name="short_name", nullable=true)
     */
    protected $shortName;

    /**
     * @var string
     * @ORM\Column(name="alt_names", type="text", nullable=true)
     */
    protected $altNames;

    /**
     * @var \Torakel\DatabaseBundle\Entity\City
     * @ORM\ManyToOne(targetEntity="\Torakel\DatabaseBundle\Entity\City", inversedBy="clubs")
     * @ORM\JoinColumn(name="city_id", referencedColumnName="id")
     */
    protected $city;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection;
     * @ORM\OneToMany(targetEntity="\Torakel\DatabaseBundle\Entity\Team", mappedBy="club")
     */
    protected $teams;

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
        $this->teams = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add alt(ernative) name
     *
     * Adds an alternative name to the entity. For example external IDs.
     *
     * @param $name
     */
    public function addAltName($name)
    {
        $names = $this->getAltNames();
        if (in_array($name, $names) === false) {
            $names[] = $name;
            $this->setAltNames($names);
        }
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
     * @return Club
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
     * @return Club
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
     * @param array $altNames
     *
     * @return Player
     */
    public function setAltNames($altNames)
    {
        $this->altNames = implode('|', $altNames);

        return $this;
    }

    /**
     * @return string
     */
    public function getShortName()
    {
        return $this->shortName;
    }

    /**
     * @param string $shortName
     */
    public function setShortName($shortName)
    {
        $this->shortName = $shortName;
    }

    /**
     * Get altNames
     *
     * @return array
     */
    public function getAltNames()
    {
        return explode('|', $this->altNames);
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Club
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
     * @return Club
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
     * Set city
     *
     * @param \Torakel\DatabaseBundle\Entity\City $city
     *
     * @return Club
     */
    public function setCity(\Torakel\DatabaseBundle\Entity\City $city = null)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return \Torakel\DatabaseBundle\Entity\City
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Add team
     *
     * @param \Torakel\DatabaseBundle\Entity\Team $team
     *
     * @return Club
     */
    public function addTeam(\Torakel\DatabaseBundle\Entity\Team $team)
    {
        $this->teams[] = $team;

        return $this;
    }

    /**
     * Remove team
     *
     * @param \Torakel\DatabaseBundle\Entity\Team $team
     */
    public function removeTeam(\Torakel\DatabaseBundle\Entity\Team $team)
    {
        $this->teams->removeElement($team);
    }

    /**
     * Get teams
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTeams()
    {
        return $this->teams;
    }

    /**
     * @ORM\PrePersist
     */
    public function prePersist()
    {
        $this->createdAt = new \DateTime();
        $altNames = $this->getAltNames();
        $altNames[999999] = '';
        $this->setAltNames($altNames);
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
        $this->updatedAt = new \DateTime();
    }

    /**
     * Set internationalName
     *
     * @param string $internationalName
     *
     * @return Club
     */
    public function setInternationalName($internationalName)
    {
        $this->internationalName = $internationalName;

        return $this;
    }

    /**
     * Get internationalName
     *
     * @return string
     */
    public function getInternationalName()
    {
        return $this->internationalName;
    }
}
