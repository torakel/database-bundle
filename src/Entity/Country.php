<?php
namespace Torakel\DatabaseBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="country")
 */
class Country
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
     * @ORM\Column(name="alt_names", type="text", nullable=true)
     */
    protected $altNames;

    /**
     * @var \Torakel\DatabaseBundle\Entity\Continent
     * @ORM\ManyToOne(targetEntity="\Torakel\DatabaseBundle\Entity\Continent", inversedBy="countries")
     * @ORM\JoinColumn(name="continent_id", referencedColumnName="id")
     */
    protected $continent;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection;
     * @ORM\OneToMany(targetEntity="\Torakel\DatabaseBundle\Entity\City", mappedBy="country")
     */
    protected $cities;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection;
     * @ORM\OneToMany(targetEntity="\Torakel\DatabaseBundle\Entity\Coach", mappedBy="nationality")
     */
    protected $coaches;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection;
     * @ORM\OneToMany(targetEntity="\Torakel\DatabaseBundle\Entity\Referee", mappedBy="nationality")
     */
    protected $referees;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection;
     * @ORM\OneToMany(targetEntity="\Torakel\DatabaseBundle\Entity\Competition", mappedBy="country")
     */
    protected $competitions;

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

    public function __construct() {
        $this->coaches= new ArrayCollection();
        $this->competitions= new ArrayCollection();
        $this->cities= new ArrayCollection();
        $this->referees = new ArrayCollection();
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
     * @return Country
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
     * @return Country
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
     * @return Country
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
     * @return Country
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
     * @return Country
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
     * Add city
     *
     * @param \Torakel\DatabaseBundle\Entity\City $city
     *
     * @return Country
     */
    public function addCity(\Torakel\DatabaseBundle\Entity\City $city)
    {
        $this->cities[] = $city;

        return $this;
    }

    /**
     * Remove city
     *
     * @param \Torakel\DatabaseBundle\Entity\City $city
     */
    public function removeCity(\Torakel\DatabaseBundle\Entity\City $city)
    {
        $this->cities->removeElement($city);
    }

    /**
     * Get cities
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCities()
    {
        return $this->cities;
    }

    /**
     * Add competition
     *
     * @param \Torakel\DatabaseBundle\Entity\Competition $competition
     *
     * @return Country
     */
    public function addCompetition(\Torakel\DatabaseBundle\Entity\Competition $competition)
    {
        $this->competitions[] = $competition;

        return $this;
    }

    /**
     * Remove competition
     *
     * @param \Torakel\DatabaseBundle\Entity\Competition $competition
     */
    public function removeCompetition(\Torakel\DatabaseBundle\Entity\Competition $competition)
    {
        $this->competitions->removeElement($competition);
    }

    /**
     * Get competitions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCompetitions()
    {
        return $this->competitions;
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
     * Add referee
     *
     * @param \Torakel\DatabaseBundle\Entity\Referee $referee
     *
     * @return Country
     */
    public function addReferee(\Torakel\DatabaseBundle\Entity\Referee $referee)
    {
        $this->referees[] = $referee;

        return $this;
    }

    /**
     * Remove referee
     *
     * @param \Torakel\DatabaseBundle\Entity\Referee $referee
     */
    public function removeReferee(\Torakel\DatabaseBundle\Entity\Referee $referee)
    {
        $this->referees->removeElement($referee);
    }

    /**
     * Get referees
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReferees()
    {
        return $this->referees;
    }

    /**
     * @return ArrayCollection
     */
    public function getCoaches()
    {
        return $this->coaches;
    }

    /**
     * Add coach
     *
     * @param \Torakel\DatabaseBundle\Entity\Coach $coach
     *
     * @return Country
     */
    public function addCoach(\Torakel\DatabaseBundle\Entity\Coach $coach)
    {
        $this->coaches[] = $coach;

        return $this;
    }
    /**
     * Remove coach
     *
     * @param \Torakel\DatabaseBundle\Entity\Coach $coach
     */
    public function removeCoach(\Torakel\DatabaseBundle\Entity\Coach $coach)
    {
        $this->coaches->removeElement($coach);
    }

}
