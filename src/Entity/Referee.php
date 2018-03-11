<?php
namespace Torakel\DatabaseBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="referee")
 */
class Referee
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
    protected $firstname;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $lastname;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $title;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $nickname;

    /**
     * @var \Torakel\DatabaseBundle\Entity\City
     * @ORM\ManyToOne(targetEntity="\Torakel\DatabaseBundle\Entity\City", inversedBy="referees")
     * @ORM\JoinColumn(name="city_id", referencedColumnName="id")
     */
    protected $city;

    /**
     * @var \Torakel\DatabaseBundle\Entity\Country
     * @ORM\ManyToOne(targetEntity="\Torakel\DatabaseBundle\Entity\Country", inversedBy="referees")
     * @ORM\JoinColumn(name="nationality_id", referencedColumnName="id")
     */
    protected $nationality;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    protected $altNames;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection;
     * @ORM\OneToMany(targetEntity="\Torakel\DatabaseBundle\Entity\Game", mappedBy="referee")
     */
    protected $games;

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

    public function getFullname()
    {
        if (!$this->firstname) {

            return $this->lastname;
        }
        $title = '';
        if ($this->title) {
            $title = $this->title . ' ';
        }
        $fullname = $title . $this->firstname . ' ' . $this->lastname;

        return $fullname;
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
     * @return Referee
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
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Referee
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Referee
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set nickname
     *
     * @param string $nickname
     *
     * @return Referee
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;

        return $this;
    }

    /**
     * Get nickname
     *
     * @return string
     */
    public function getNickname()
    {
        return $this->nickname;
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
     * Add game
     *
     * @param \Torakel\DatabaseBundle\Entity\Game $game
     *
     * @return Referee
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Referee
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
     * @return Referee
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
     * Set city
     *
     * @param \Torakel\DatabaseBundle\Entity\City $city
     *
     * @return Referee
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
     * Set nationality
     *
     * @param \Torakel\DatabaseBundle\Entity\Country $nationality
     *
     * @return Referee
     */
    public function setNationality(\Torakel\DatabaseBundle\Entity\Country $nationality = null)
    {
        $this->nationality = $nationality;

        return $this;
    }

    /**
     * Get nationality
     *
     * @return \Torakel\DatabaseBundle\Entity\Country
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Referee
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
}
