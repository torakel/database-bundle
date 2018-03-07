<?php
namespace Torakel\DatabaseBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="coach")
 */
class Coach
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
     * @ORM\Column(type="string", nullable=true)
     */
    protected $nickname;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    protected $alt_names;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection;
     * @ORM\OneToMany(targetEntity="\Torakel\DatabaseBundle\Entity\Card", mappedBy="coach")
     */
    protected $cards;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection;
     * @ORM\OneToMany(targetEntity="\Torakel\DatabaseBundle\Entity\Game", mappedBy="coachHome")
     */
    protected $homeGames;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection;
     * @ORM\OneToMany(targetEntity="\Torakel\DatabaseBundle\Entity\Game", mappedBy="coachAway")
     */
    protected $awayGames;

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
        $this->awayGames = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getFullname()
    {
        if (!$this->firstname) {

            return $this->lastname;
        }
        $fullname = $this->firstname . ' ' . $this->lastname;

        return $fullname;
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
        if (in_array($name, $names) == false) {
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
     * @return Coach
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
     * @return Coach
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
     * @return Coach
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
     * @return Coach
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
        $this->alt_names = implode('|', $altNames);

        return $this;
    }

    /**
     * Get altNames
     *
     * @return array
     */
    public function getAltNames()
    {
        return explode('|', $this->alt_names);
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Coach
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
     * @return Coach
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
     * Add homeGame
     *
     * @param \Torakel\DatabaseBundle\Entity\Game $homeGame
     *
     * @return Coach
     */
    public function addHomeGame(\Torakel\DatabaseBundle\Entity\Game $homeGame)
    {
        $this->homeGames[] = $homeGame;

        return $this;
    }

    /**
     * Remove homeGame
     *
     * @param \Torakel\DatabaseBundle\Entity\Game $homeGame
     */
    public function removeHomeGame(\Torakel\DatabaseBundle\Entity\Game $homeGame)
    {
        $this->homeGames->removeElement($homeGame);
    }

    /**
     * Get homeGames
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHomeGames()
    {
        return $this->homeGames;
    }

    /**
     * Add awayGame
     *
     * @param \Torakel\DatabaseBundle\Entity\Game $awayGame
     *
     * @return Coach
     */
    public function addAwayGame(\Torakel\DatabaseBundle\Entity\Game $awayGame)
    {
        $this->awayGames[] = $awayGame;

        return $this;
    }

    /**
     * Remove awayGame
     *
     * @param \Torakel\DatabaseBundle\Entity\Game $awayGame
     */
    public function removeAwayGame(\Torakel\DatabaseBundle\Entity\Game $awayGame)
    {
        $this->awayGames->removeElement($awayGame);
    }

    /**
     * Get awayGames
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAwayGames()
    {
        return $this->awayGames;
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
     * Add card
     *
     * @param \Torakel\DatabaseBundle\Entity\Card $card
     *
     * @return Coach
     */
    public function addCard(\Torakel\DatabaseBundle\Entity\Card $card)
    {
        $this->cards[] = $card;

        return $this;
    }

    /**
     * Remove card
     *
     * @param \Torakel\DatabaseBundle\Entity\Card $card
     */
    public function removeCard(\Torakel\DatabaseBundle\Entity\Card $card)
    {
        $this->cards->removeElement($card);
    }

    /**
     * Get cards
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCards()
    {
        return $this->cards;
    }
}
