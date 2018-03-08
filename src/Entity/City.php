<?php
namespace Torakel\DatabaseBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="city")
 */
class City
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
     * @var \Torakel\DatabaseBundle\Entity\Country
     * @ORM\ManyToOne(targetEntity="\Torakel\DatabaseBundle\Entity\Country", inversedBy="cities")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     */
    protected $country;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection;
     * @ORM\OneToMany(targetEntity="\Torakel\DatabaseBundle\Entity\Club", mappedBy="city")
     */
    protected $clubs;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection;
     * @ORM\OneToMany(targetEntity="\Torakel\DatabaseBundle\Entity\Ground", mappedBy="city")
     */
    protected $grounds;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection;
     * @ORM\OneToMany(targetEntity="\Torakel\DatabaseBundle\Entity\Referee", mappedBy="city")
     */
    protected $referees;

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
        $this->clubs = new ArrayCollection();
        $this->grounds = new ArrayCollection();
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
     * @return City
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
     * @return City
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
     * @return City
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
     * @return City
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
     * Set country
     *
     * @param \Torakel\DatabaseBundle\Entity\Country $country
     *
     * @return City
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
     * Add ground
     *
     * @param \Torakel\DatabaseBundle\Entity\Ground $ground
     *
     * @return City
     */
    public function addGround(\Torakel\DatabaseBundle\Entity\Ground $ground)
    {
        $this->grounds[] = $ground;

        return $this;
    }

    /**
     * Remove ground
     *
     * @param \Torakel\DatabaseBundle\Entity\Ground $ground
     */
    public function removeGround(\Torakel\DatabaseBundle\Entity\Ground $ground)
    {
        $this->grounds->removeElement($ground);
    }

    /**
     * Get grounds
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGrounds()
    {
        return $this->grounds;
    }

    /**
     * Add club
     *
     * @param \Torakel\DatabaseBundle\Entity\Club $club
     *
     * @return City
     */
    public function addClub(\Torakel\DatabaseBundle\Entity\Club $club)
    {
        $this->clubs[] = $club;

        return $this;
    }

    /**
     * Remove club
     *
     * @param \Torakel\DatabaseBundle\Entity\Club $club
     */
    public function removeClub(\Torakel\DatabaseBundle\Entity\Club $club)
    {
        $this->clubs->removeElement($club);
    }

    /**
     * Get clubs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClubs()
    {
        return $this->clubs;
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
     * Add referee
     *
     * @param \Torakel\DatabaseBundle\Entity\Referee $referee
     *
     * @return City
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
}
