<?php
namespace Torakel\DatabaseBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="player")
 */
class Player
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
     * @ORM\Column(type="string", nullable=true)
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
     * @ORM\OneToMany(targetEntity="\Torakel\DatabaseBundle\Entity\Goal", mappedBy="player")
     */
    protected $goals;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection;
     * @ORM\OneToMany(targetEntity="\Torakel\DatabaseBundle\Entity\Goal", mappedBy="assistPlayer")
     */
    protected $assists;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection;
     * @ORM\OneToMany(targetEntity="\Torakel\DatabaseBundle\Entity\Card", mappedBy="player")
     */
    protected $cards;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection;
     * @ORM\OneToMany(targetEntity="\Torakel\DatabaseBundle\Entity\GamePlayer", mappedBy="player")
     */
    protected $gamePlayers;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection;
     * @ORM\OneToMany(targetEntity="\Torakel\DatabaseBundle\Entity\GamePlayerStatistic", mappedBy="player")
     */
    protected $gamePlayerStatistics;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection;
     * @ORM\OneToMany(targetEntity="\Torakel\DatabaseBundle\Entity\Substitution", mappedBy="intoPlayer")
     */
    protected $intoSubstitutions;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection;
     * @ORM\OneToMany(targetEntity="\Torakel\DatabaseBundle\Entity\Substitution", mappedBy="outPlayer")
     */
    protected $outSubstitutions;

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
        $this->goals = new \Doctrine\Common\Collections\ArrayCollection();
        $this->cards = new \Doctrine\Common\Collections\ArrayCollection();
        $this->assists = new \Doctrine\Common\Collections\ArrayCollection();
        $this->gamePlayers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->intoSubstitutions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->outSubstitutions = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Player
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
     * @return Player
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
     * Set surname
     *
     * @param string $surname
     *
     * @return Player
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set nickname
     *
     * @param string $nickname
     *
     * @return Player
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
     * Add goal
     *
     * @param \Torakel\DatabaseBundle\Entity\Goal $goal
     *
     * @return Player
     */
    public function addGoal(\Torakel\DatabaseBundle\Entity\Goal $goal)
    {
        $this->goals[] = $goal;

        return $this;
    }

    /**
     * Remove goal
     *
     * @param \Torakel\DatabaseBundle\Entity\Goal $goal
     */
    public function removeGoal(\Torakel\DatabaseBundle\Entity\Goal $goal)
    {
        $this->goals->removeElement($goal);
    }

    /**
     * Get goals
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGoals()
    {
        return $this->goals;
    }

    /**
     * Add card
     *
     * @param \Torakel\DatabaseBundle\Entity\Card $card
     *
     * @return Player
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

    /**
     * Add assist
     *
     * @param \Torakel\DatabaseBundle\Entity\Goal $assist
     *
     * @return Player
     */
    public function addAssist(\Torakel\DatabaseBundle\Entity\Goal $assist)
    {
        $this->assists[] = $assist;

        return $this;
    }

    /**
     * Remove assist
     *
     * @param \Torakel\DatabaseBundle\Entity\Goal $assist
     */
    public function removeAssist(\Torakel\DatabaseBundle\Entity\Goal $assist)
    {
        $this->assists->removeElement($assist);
    }

    /**
     * Get assists
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAssists()
    {
        return $this->assists;
    }

    /**
     * Add gamePlayer
     *
     * @param \Torakel\DatabaseBundle\Entity\GamePlayer $gamePlayer
     *
     * @return Player
     */
    public function addGamePlayer(\Torakel\DatabaseBundle\Entity\GamePlayer $gamePlayer)
    {
        $this->gamePlayers[] = $gamePlayer;

        return $this;
    }

    /**
     * Remove gamePlayer
     *
     * @param \Torakel\DatabaseBundle\Entity\GamePlayer $gamePlayer
     */
    public function removeGamePlayer(\Torakel\DatabaseBundle\Entity\GamePlayer $gamePlayer)
    {
        $this->gamePlayers->removeElement($gamePlayer);
    }

    /**
     * Get gamePlayers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGamePlayers()
    {
        return $this->gamePlayers;
    }

    /**
     * Add intoSubstitution
     *
     * @param \Torakel\DatabaseBundle\Entity\Substitution $intoSubstitution
     *
     * @return Player
     */
    public function addIntoSubstitution(\Torakel\DatabaseBundle\Entity\Substitution $intoSubstitution)
    {
        $this->intoSubstitutions[] = $intoSubstitution;

        return $this;
    }

    /**
     * Remove intoSubstitution
     *
     * @param \Torakel\DatabaseBundle\Entity\Substitution $intoSubstitution
     */
    public function removeIntoSubstitution(\Torakel\DatabaseBundle\Entity\Substitution $intoSubstitution)
    {
        $this->intoSubstitutions->removeElement($intoSubstitution);
    }

    /**
     * Get intoSubstitutions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIntoSubstitutions()
    {
        return $this->intoSubstitutions;
    }

    /**
     * Add outSubstitution
     *
     * @param \Torakel\DatabaseBundle\Entity\Substitution $outSubstitution
     *
     * @return Player
     */
    public function addOutSubstitution(\Torakel\DatabaseBundle\Entity\Substitution $outSubstitution)
    {
        $this->outSubstitutions[] = $outSubstitution;

        return $this;
    }

    /**
     * Remove outSubstitution
     *
     * @param \Torakel\DatabaseBundle\Entity\Substitution $outSubstitution
     */
    public function removeOutSubstitution(\Torakel\DatabaseBundle\Entity\Substitution $outSubstitution)
    {
        $this->outSubstitutions->removeElement($outSubstitution);
    }

    /**
     * Get outSubstitutions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOutSubstitutions()
    {
        return $this->outSubstitutions;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Player
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
     * @return Player
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
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Player
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
     * Add gamePlayerStatistic
     *
     * @param \Torakel\DatabaseBundle\Entity\GamePlayerStatistic $gamePlayerStatistic
     *
     * @return Player
     */
    public function addGamePlayerStatistic(\Torakel\DatabaseBundle\Entity\GamePlayerStatistic $gamePlayerStatistic)
    {
        $this->gamePlayerStatistics[] = $gamePlayerStatistic;

        return $this;
    }

    /**
     * Remove gamePlayerStatistic
     *
     * @param \Torakel\DatabaseBundle\Entity\GamePlayerStatistic $gamePlayerStatistic
     */
    public function removeGamePlayerStatistic(\Torakel\DatabaseBundle\Entity\GamePlayerStatistic $gamePlayerStatistic)
    {
        $this->gamePlayerStatistics->removeElement($gamePlayerStatistic);
    }

    /**
     * Get gamePlayerStatistics
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGamePlayerStatistics()
    {
        return $this->gamePlayerStatistics;
    }
}
