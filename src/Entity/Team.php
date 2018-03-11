<?php
namespace Torakel\DatabaseBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="team")
 */
class Team
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
     * @var string
     * @ORM\Column(type="text")
     */
    protected $type;

    /**
     * @var \Torakel\DatabaseBundle\Entity\Club
     * @ORM\ManyToOne(targetEntity="\Torakel\DatabaseBundle\Entity\Club", inversedBy="teams")
     * @ORM\JoinColumn(name="club_id", referencedColumnName="id")
     */
    protected $club;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection;
     * @ORM\OneToMany(targetEntity="\Torakel\DatabaseBundle\Entity\Game", mappedBy="teamHome")
     */
    protected $homeGames;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection;
     * @ORM\OneToMany(targetEntity="\Torakel\DatabaseBundle\Entity\Game", mappedBy="teamAway")
     */
    protected $awayGames;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection;
     * @ORM\OneToMany(targetEntity="\Torakel\DatabaseBundle\Entity\Goal", mappedBy="team")
     */
    protected $goals;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection;
     * @ORM\OneToMany(targetEntity="\Torakel\DatabaseBundle\Entity\GamePlayer", mappedBy="team")
     */
    protected $gamePlayers;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection;
     * @ORM\OneToMany(targetEntity="\Torakel\DatabaseBundle\Entity\GamePlayerStatistic", mappedBy="team")
     */
    protected $gamePlayerStatistics;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection;
     * @ORM\OneToMany(targetEntity="\Torakel\DatabaseBundle\Entity\GameTeamStatistic", mappedBy="team")
     */
    protected $gameTeamStatistics;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection;
     * @ORM\OneToMany(targetEntity="\Torakel\DatabaseBundle\Entity\Substitution", mappedBy="team")
     */
    protected $substitutions;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection;
     * @ORM\OneToMany(targetEntity="\Torakel\DatabaseBundle\Entity\Card", mappedBy="team")
     */
    protected $cards;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection;
     * @ORM\OneToMany(targetEntity="\Torakel\DatabaseBundle\Entity\TablePosition", mappedBy="team")
     */
    protected $tablePositions;

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
        $this->homeGames = new \Doctrine\Common\Collections\ArrayCollection();
        $this->awayGames = new \Doctrine\Common\Collections\ArrayCollection();
        $this->goals = new \Doctrine\Common\Collections\ArrayCollection();
        $this->gamePlayers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->gamePlayerStatistics = new \Doctrine\Common\Collections\ArrayCollection();
        $this->gameTeamStatistics = new \Doctrine\Common\Collections\ArrayCollection();
        $this->substitutions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->cards = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tablePositions = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Team
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
     * @return Team
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
     * Set position
     *
     * @param integer $position
     *
     * @return Team
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
     * @return Team
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
     * @return Team
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
     * Set club
     *
     * @param \Torakel\DatabaseBundle\Entity\Club $club
     *
     * @return Team
     */
    public function setClub(\Torakel\DatabaseBundle\Entity\Club $club = null)
    {
        $this->club = $club;

        return $this;
    }

    /**
     * Get club
     *
     * @return \Torakel\DatabaseBundle\Entity\Club
     */
    public function getClub()
    {
        return $this->club;
    }

    /**
     * Add homeGame
     *
     * @param \Torakel\DatabaseBundle\Entity\Game $homeGame
     *
     * @return Team
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
     * @return Team
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
     * Add goal
     *
     * @param \Torakel\DatabaseBundle\Entity\Goal $goal
     *
     * @return Team
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
     * @return Team
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
     * Add gamePlayer
     *
     * @param \Torakel\DatabaseBundle\Entity\GamePlayer $gamePlayer
     *
     * @return Team
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
     * Add substitution
     *
     * @param \Torakel\DatabaseBundle\Entity\Substitution $substitution
     *
     * @return Team
     */
    public function addSubstitution(\Torakel\DatabaseBundle\Entity\Substitution $substitution)
    {
        $this->substitutions[] = $substitution;

        return $this;
    }

    /**
     * Remove substitution
     *
     * @param \Torakel\DatabaseBundle\Entity\Substitution $substitution
     */
    public function removeSubstitution(\Torakel\DatabaseBundle\Entity\Substitution $substitution)
    {
        $this->substitutions->removeElement($substitution);
    }

    /**
     * Get substitutions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSubstitutions()
    {
        return $this->substitutions;
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
     * Set type
     *
     * @param string $type
     *
     * @return Team
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Add tablePosition
     *
     * @param \Torakel\DatabaseBundle\Entity\TablePosition $tablePosition
     *
     * @return Team
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

    /**
     * Add gamePlayerStatistic
     *
     * @param \Torakel\DatabaseBundle\Entity\GamePlayerStatistic $gamePlayerStatistic
     *
     * @return Team
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

    /**
     * Add gameTeamStatistic
     *
     * @param \Torakel\DatabaseBundle\Entity\GameTeamStatistic $gameTeamStatistic
     *
     * @return Team
     */
    public function addGameTeamStatistic(\Torakel\DatabaseBundle\Entity\GameTeamStatistic $gameTeamStatistic)
    {
        $this->gameTeamStatistics[] = $gameTeamStatistic;

        return $this;
    }

    /**
     * Remove gameTeamStatistic
     *
     * @param \Torakel\DatabaseBundle\Entity\GameTeamStatistic $gameTeamStatistic
     */
    public function removeGameTeamStatistic(\Torakel\DatabaseBundle\Entity\GameTeamStatistic $gameTeamStatistic)
    {
        $this->gameTeamStatistics->removeElement($gameTeamStatistic);
    }

    /**
     * Get gameTeamStatistics
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGameTeamStatistics()
    {
        return $this->gameTeamStatistics;
    }
}
