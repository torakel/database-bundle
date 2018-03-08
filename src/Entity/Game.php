<?php
namespace Torakel\DatabaseBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Torakel\DatabaseBundle\Repository\GameRepository")
 * @ORM\Table(name="game")
 */
class Game
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
     * @var \DateTime
     * @ORM\Column(type="datetime", name="start_time", nullable=true)
     */
    protected $startTime;

    /**
     * @var \Torakel\DatabaseBundle\Entity\Matchday
     * @ORM\ManyToOne(targetEntity="\Torakel\DatabaseBundle\Entity\Matchday", inversedBy="games")
     * @ORM\JoinColumn(name="matchday_id", referencedColumnName="id")
     */
    protected $matchday;

    /**
     * @var \Torakel\DatabaseBundle\Entity\Ground
     * @ORM\ManyToOne(targetEntity="\Torakel\DatabaseBundle\Entity\Ground", inversedBy="games")
     * @ORM\JoinColumn(name="ground_id", referencedColumnName="id")
     */
    protected $ground;

    /**
     * @var \Torakel\DatabaseBundle\Entity\Coach
     * @ORM\ManyToOne(targetEntity="\Torakel\DatabaseBundle\Entity\Coach", inversedBy="homeGames")
     * @ORM\JoinColumn(name="coach_home_id", referencedColumnName="id")
     */
    protected $coachHome;

    /**
     * @var \Torakel\DatabaseBundle\Entity\Coach
     * @ORM\ManyToOne(targetEntity="\Torakel\DatabaseBundle\Entity\Coach", inversedBy="awayGames")
     * @ORM\JoinColumn(name="coach_away_id", referencedColumnName="id")
     */
    protected $coachAway;

    /**
     * @var \Torakel\DatabaseBundle\Entity\Team
     * @ORM\ManyToOne(targetEntity="\Torakel\DatabaseBundle\Entity\Team", inversedBy="homeGames")
     * @ORM\JoinColumn(name="team_home_id", referencedColumnName="id")
     */
    protected $teamHome;

    /**
     * @var \Torakel\DatabaseBundle\Entity\Team
     * @ORM\ManyToOne(targetEntity="\Torakel\DatabaseBundle\Entity\Team", inversedBy="awayGames")
     * @ORM\JoinColumn(name="team_away_id", referencedColumnName="id")
     */
    protected $teamAway;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection;
     * @ORM\OneToMany(targetEntity="\Torakel\DatabaseBundle\Entity\GamePlayer", mappedBy="game")
     */
    protected $gamePlayers;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection;
     * @ORM\OneToMany(targetEntity="\Torakel\DatabaseBundle\Entity\GamePlayerStatistic", mappedBy="game")
     */
    protected $gamePlayerStatistics;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection;
     * @ORM\OneToMany(targetEntity="\Torakel\DatabaseBundle\Entity\GameTeamStatistic", mappedBy="game")
     */
    protected $gameTeamStatistics;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection;
     * @ORM\OneToMany(targetEntity="\Torakel\DatabaseBundle\Entity\Card", mappedBy="game")
     */
    protected $cards;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection;
     * @ORM\OneToMany(targetEntity="\Torakel\DatabaseBundle\Entity\Goal", mappedBy="game")
     */
    protected $goals;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection;
     * @ORM\OneToMany(targetEntity="\Torakel\DatabaseBundle\Entity\Substitution", mappedBy="game")
     */
    protected $substitutions;

    /**
     * @var \Torakel\DatabaseBundle\Entity\Referee
     * @ORM\ManyToOne(targetEntity="\Torakel\DatabaseBundle\Entity\Referee", inversedBy="games")
     * @ORM\JoinColumn(name="referee_id", referencedColumnName="id")
     */
    protected $referee;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="score_home_halftime", nullable=true)
     */
    protected $scoreHomeHalftime;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="score_home_fulltime", nullable=true)
     */
    protected $scoreHomeFulltime;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="score_home_extratime", nullable=true)
     */
    protected $scoreHomeExtratime;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="score_home_penalties", nullable=true)
     */
    protected $scoreHomePenalties;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="score_away_halftime", nullable=true)
     */
    protected $scoreAwayHalftime;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="score_away_fulltime", nullable=true)
     */
    protected $scoreAwayFulltime;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="score_away_extratime", nullable=true)
     */
    protected $scoreAwayExtratime;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="score_away_penalties", nullable=true)
     */
    protected $scoreAwayPenalties;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $audience;

    /**
     * @var bool
     * @ORM\Column(type="boolean", name="result_calculated")
     */
    protected $resultCalculated;

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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set scoreHomeHalftime
     *
     * @param integer $scoreHomeHalftime
     *
     * @return Game
     */
    public function setScoreHomeHalftime($scoreHomeHalftime)
    {
        $this->scoreHomeHalftime = $scoreHomeHalftime;

        return $this;
    }

    /**
     * Get scoreHomeHalftime
     *
     * @return integer
     */
    public function getScoreHomeHalftime()
    {
        return $this->scoreHomeHalftime;
    }

    /**
     * Set scoreHomeFulltime
     *
     * @param integer $scoreHomeFulltime
     *
     * @return Game
     */
    public function setScoreHomeFulltime($scoreHomeFulltime)
    {
        $this->scoreHomeFulltime = $scoreHomeFulltime;

        return $this;
    }

    /**
     * Get scoreHomeFulltime
     *
     * @return integer
     */
    public function getScoreHomeFulltime()
    {
        return $this->scoreHomeFulltime;
    }

    /**
     * Set scoreHomeExtratime
     *
     * @param integer $scoreHomeExtratime
     *
     * @return Game
     */
    public function setScoreHomeExtratime($scoreHomeExtratime)
    {
        $this->scoreHomeExtratime = $scoreHomeExtratime;

        return $this;
    }

    /**
     * Get scoreHomeExtratime
     *
     * @return integer
     */
    public function getScoreHomeExtratime()
    {
        return $this->scoreHomeExtratime;
    }

    /**
     * Set scoreHomePenalties
     *
     * @param integer $scoreHomePenalties
     *
     * @return Game
     */
    public function setScoreHomePenalties($scoreHomePenalties)
    {
        $this->scoreHomePenalties = $scoreHomePenalties;

        return $this;
    }

    /**
     * Get scoreHomePenalties
     *
     * @return integer
     */
    public function getScoreHomePenalties()
    {
        return $this->scoreHomePenalties;
    }

    /**
     * Set scoreAwayHalftime
     *
     * @param integer $scoreAwayHalftime
     *
     * @return Game
     */
    public function setScoreAwayHalftime($scoreAwayHalftime)
    {
        $this->scoreAwayHalftime = $scoreAwayHalftime;

        return $this;
    }

    /**
     * Get scoreAwayHalftime
     *
     * @return integer
     */
    public function getScoreAwayHalftime()
    {
        return $this->scoreAwayHalftime;
    }

    /**
     * Set scoreAwayFulltime
     *
     * @param integer $scoreAwayFulltime
     *
     * @return Game
     */
    public function setScoreAwayFulltime($scoreAwayFulltime)
    {
        $this->scoreAwayFulltime = $scoreAwayFulltime;

        return $this;
    }

    /**
     * Get scoreAwayFulltime
     *
     * @return integer
     */
    public function getScoreAwayFulltime()
    {
        return $this->scoreAwayFulltime;
    }

    /**
     * Set scoreAwayExtratime
     *
     * @param integer $scoreAwayExtratime
     *
     * @return Game
     */
    public function setScoreAwayExtratime($scoreAwayExtratime)
    {
        $this->scoreAwayExtratime = $scoreAwayExtratime;

        return $this;
    }

    /**
     * Get scoreAwayExtratime
     *
     * @return integer
     */
    public function getScoreAwayExtratime()
    {
        return $this->scoreAwayExtratime;
    }

    /**
     * Set scoreAwayPenalties
     *
     * @param integer $scoreAwayPenalties
     *
     * @return Game
     */
    public function setScoreAwayPenalties($scoreAwayPenalties)
    {
        $this->scoreAwayPenalties = $scoreAwayPenalties;

        return $this;
    }

    /**
     * Get scoreAwayPenalties
     *
     * @return integer
     */
    public function getScoreAwayPenalties()
    {
        return $this->scoreAwayPenalties;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Game
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
     * @return Game
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
     * @return Game
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
     * Set ground
     *
     * @param \Torakel\DatabaseBundle\Entity\Ground $ground
     *
     * @return Game
     */
    public function setGround(\Torakel\DatabaseBundle\Entity\Ground $ground = null)
    {
        $this->ground = $ground;

        return $this;
    }

    /**
     * Get ground
     *
     * @return \Torakel\DatabaseBundle\Entity\Ground
     */
    public function getGround()
    {
        return $this->ground;
    }

    /**
     * Set teamHome
     *
     * @param \Torakel\DatabaseBundle\Entity\Team $teamHome
     *
     * @return Game
     */
    public function setTeamHome(\Torakel\DatabaseBundle\Entity\Team $teamHome = null)
    {
        $this->teamHome = $teamHome;

        return $this;
    }

    /**
     * Get teamHome
     *
     * @return \Torakel\DatabaseBundle\Entity\Team
     */
    public function getTeamHome()
    {
        return $this->teamHome;
    }

    /**
     * Set teamAway
     *
     * @param \Torakel\DatabaseBundle\Entity\Team $teamAway
     *
     * @return Game
     */
    public function setTeamAway(\Torakel\DatabaseBundle\Entity\Team $teamAway = null)
    {
        $this->teamAway = $teamAway;

        return $this;
    }

    /**
     * Get teamAway
     *
     * @return \Torakel\DatabaseBundle\Entity\Team
     */
    public function getTeamAway()
    {
        return $this->teamAway;
    }

    /**
     * Set audience
     *
     * @param integer $audience
     *
     * @return Game
     */
    public function setAudience($audience)
    {
        $this->audience = $audience;

        return $this;
    }

    /**
     * Get audience
     *
     * @return integer
     */
    public function getAudience()
    {
        return $this->audience;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->resultCalculated = false;
        $this->gamePlayers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->substitutions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add gamePlayer
     *
     * @param \Torakel\DatabaseBundle\Entity\GamePlayer $gamePlayer
     *
     * @return Game
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
     * @return Game
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
     * Set referee
     *
     * @param \Torakel\DatabaseBundle\Entity\Referee $referee
     *
     * @return Game
     */
    public function setReferee(\Torakel\DatabaseBundle\Entity\Referee $referee = null)
    {
        $this->referee = $referee;

        return $this;
    }

    /**
     * Get referee
     *
     * @return \Torakel\DatabaseBundle\Entity\Referee
     */
    public function getReferee()
    {
        return $this->referee;
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
     * Set coachHome
     *
     * @param \Torakel\DatabaseBundle\Entity\Coach $coachHome
     *
     * @return Game
     */
    public function setCoachHome(\Torakel\DatabaseBundle\Entity\Coach $coachHome = null)
    {
        $this->coachHome = $coachHome;

        return $this;
    }

    /**
     * Get coachHome
     *
     * @return \Torakel\DatabaseBundle\Entity\Coach
     */
    public function getCoachHome()
    {
        return $this->coachHome;
    }

    /**
     * Set coachAway
     *
     * @param \Torakel\DatabaseBundle\Entity\Coach $coachAway
     *
     * @return Game
     */
    public function setCoachAway(\Torakel\DatabaseBundle\Entity\Coach $coachAway = null)
    {
        $this->coachAway = $coachAway;

        return $this;
    }

    /**
     * Get coachAway
     *
     * @return \Torakel\DatabaseBundle\Entity\Coach
     */
    public function getCoachAway()
    {
        return $this->coachAway;
    }

    /**
     * Add card
     *
     * @param \Torakel\DatabaseBundle\Entity\Card $card
     *
     * @return Game
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
     * Add goal
     *
     * @param \Torakel\DatabaseBundle\Entity\Goal $goal
     *
     * @return Game
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
     * Set resultCalculated
     *
     * @param bool $resultCalculated
     *
     * @return Game
     */
    public function setResultCalculated($resultCalculated)
    {
        $this->resultCalculated = $resultCalculated;

        return $this;
    }

    /**
     * Get resultCalculated
     *
     * @return \bool
     */
    public function getResultCalculated()
    {
        return $this->resultCalculated;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Game
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
     * Set startTime
     *
     * @param \DateTime $startTime
     *
     * @return Game
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;

        return $this;
    }

    /**
     * Get startTime
     *
     * @return \DateTime
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * Add gamePlayerStatistic
     *
     * @param \Torakel\DatabaseBundle\Entity\GamePlayerStatistic $gamePlayerStatistic
     *
     * @return Game
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
     * @return Game
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
