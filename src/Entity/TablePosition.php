<?php
namespace Torakel\DatabaseBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Torakel\DatabaseBundle\Repository\TablePositionRepository")
 * @ORM\Table(name="table_position")
 */
class TablePosition
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
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $position;

    /**
     * @var \Torakel\DatabaseBundle\Entity\Team
     * @ORM\ManyToOne(targetEntity="\Torakel\DatabaseBundle\Entity\Team", inversedBy="tablePositions")
     * @ORM\JoinColumn(name="team_id", referencedColumnName="id")
     */
    protected $team;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="games_played")
     */
    protected $gamesPlayed;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $points;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="points_away")
     */
    protected $pointsAway;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="points_home")
     */
    protected $pointsHome;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    protected $wins;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="wins_away")
     */
    protected $winsAway;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="wins_home")
     */
    protected $winsHome;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    protected $losses;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="losses_away")
     */
    protected $lossesAway;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="losses_home")
     */
    protected $lossesHome;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    protected $draws;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="draws_away")
     */
    protected $drawsAway;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="draws_home")
     */
    protected $drawsHome;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    protected $goals;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="goals_away")
     */
    protected $goalsAway;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="goals_home")
     */
    protected $goalsHome;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="goals_against")
     */
    protected $goalsAgainst;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="goals_against_away")
     */
    protected $goalsAgainstAway;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="goals_against_home")
     */
    protected $goalsAgainstHome;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="goal_difference")
     */
    protected $goalDifference;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="goal_difference_away")
     */
    protected $goalDifferenceAway;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="goal_difference_home")
     */
    protected $goalDifferenceHome;

    /**
     * @var \Torakel\DatabaseBundle\Entity\MatchdayTable
     * @ORM\ManyToOne(targetEntity="\Torakel\DatabaseBundle\Entity\MatchdayTable", inversedBy="tablePositions")
     * @ORM\JoinColumn(name="matchday_table_id", referencedColumnName="id")
     */
    protected $matchdayTable;

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
        $this->points = 0;
        $this->pointsAway = 0;
        $this->pointsHome = 0;
        $this->wins = 0;
        $this->winsAway = 0;
        $this->winsHome = 0;
        $this->losses = 0;
        $this->lossesAway = 0;
        $this->lossesHome = 0;
        $this->draws = 0;
        $this->drawsAway = 0;
        $this->drawsHome = 0;
        $this->goals = 0;
        $this->goalsAway = 0;
        $this->goalsHome = 0;
        $this->goalsAgainst = 0;
        $this->goalsAgainstAway = 0;
        $this->goalsAgainstHome = 0;
        $this->goalDifference = 0;
        $this->goalDifferenceAway = 0;
        $this->goalDifferenceHome = 0;
    }

    public function __clone()
    {
        $this->id = null;
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
     * Set displayPosition
     *
     * @param integer $displayPosition
     *
     * @return TablePosition
     */
    public function setDisplayPosition($displayPosition)
    {
        $this->displayPosition = $displayPosition;

        return $this;
    }

    /**
     * Get displayPosition
     *
     * @return integer
     */
    public function getDisplayPosition()
    {
        return $this->displayPosition;
    }

    /**
     * Set position
     *
     * @param string $position
     *
     * @return TablePosition
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set points
     *
     * @param integer $points
     *
     * @return TablePosition
     */
    public function setPoints($points)
    {
        $this->points = $points;

        return $this;
    }

    /**
     * Get points
     *
     * @return integer
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * Set pointsAway
     *
     * @param integer $pointsAway
     *
     * @return TablePosition
     */
    public function setPointsAway($pointsAway)
    {
        $this->pointsAway = $pointsAway;

        return $this;
    }

    /**
     * Get pointsAway
     *
     * @return integer
     */
    public function getPointsAway()
    {
        return $this->pointsAway;
    }

    /**
     * Set pointsHome
     *
     * @param integer $pointsHome
     *
     * @return TablePosition
     */
    public function setPointsHome($pointsHome)
    {
        $this->pointsHome = $pointsHome;

        return $this;
    }

    /**
     * Get pointsHome
     *
     * @return integer
     */
    public function getPointsHome()
    {
        return $this->pointsHome;
    }

    /**
     * Set wins
     *
     * @param integer $wins
     *
     * @return TablePosition
     */
    public function setWins($wins)
    {
        $this->wins = $wins;

        return $this;
    }

    /**
     * Get wins
     *
     * @return integer
     */
    public function getWins()
    {
        return $this->wins;
    }

    /**
     * Set winsAway
     *
     * @param integer $winsAway
     *
     * @return TablePosition
     */
    public function setWinsAway($winsAway)
    {
        $this->winsAway = $winsAway;

        return $this;
    }

    /**
     * Get winsAway
     *
     * @return integer
     */
    public function getWinsAway()
    {
        return $this->winsAway;
    }

    /**
     * Set winsHome
     *
     * @param integer $winsHome
     *
     * @return TablePosition
     */
    public function setWinsHome($winsHome)
    {
        $this->winsHome = $winsHome;

        return $this;
    }

    /**
     * Get winsHome
     *
     * @return integer
     */
    public function getWinsHome()
    {
        return $this->winsHome;
    }

    /**
     * Set losses
     *
     * @param integer $losses
     *
     * @return TablePosition
     */
    public function setLosses($losses)
    {
        $this->losses = $losses;

        return $this;
    }

    /**
     * Get losses
     *
     * @return integer
     */
    public function getLosses()
    {
        return $this->losses;
    }

    /**
     * Set lossesAway
     *
     * @param integer $lossesAway
     *
     * @return TablePosition
     */
    public function setLossesAway($lossesAway)
    {
        $this->lossesAway = $lossesAway;

        return $this;
    }

    /**
     * Get lossesAway
     *
     * @return integer
     */
    public function getLossesAway()
    {
        return $this->lossesAway;
    }

    /**
     * Set lossesHome
     *
     * @param integer $lossesHome
     *
     * @return TablePosition
     */
    public function setLossesHome($lossesHome)
    {
        $this->lossesHome = $lossesHome;

        return $this;
    }

    /**
     * Get lossesHome
     *
     * @return integer
     */
    public function getLossesHome()
    {
        return $this->lossesHome;
    }

    /**
     * Set draws
     *
     * @param integer $draws
     *
     * @return TablePosition
     */
    public function setDraws($draws)
    {
        $this->draws = $draws;

        return $this;
    }

    /**
     * Get draws
     *
     * @return integer
     */
    public function getDraws()
    {
        return $this->draws;
    }

    /**
     * Set drawsAway
     *
     * @param integer $drawsAway
     *
     * @return TablePosition
     */
    public function setDrawsAway($drawsAway)
    {
        $this->drawsAway = $drawsAway;

        return $this;
    }

    /**
     * Get drawsAway
     *
     * @return integer
     */
    public function getDrawsAway()
    {
        return $this->drawsAway;
    }

    /**
     * Set drawsHome
     *
     * @param integer $drawsHome
     *
     * @return TablePosition
     */
    public function setDrawsHome($drawsHome)
    {
        $this->drawsHome = $drawsHome;

        return $this;
    }

    /**
     * Get drawsHome
     *
     * @return integer
     */
    public function getDrawsHome()
    {
        return $this->drawsHome;
    }

    /**
     * Set goals
     *
     * @param integer $goals
     *
     * @return TablePosition
     */
    public function setGoals($goals)
    {
        $this->goals = $goals;

        return $this;
    }

    /**
     * Get goals
     *
     * @return integer
     */
    public function getGoals()
    {
        return $this->goals;
    }

    /**
     * Set goalsAway
     *
     * @param integer $goalsAway
     *
     * @return TablePosition
     */
    public function setGoalsAway($goalsAway)
    {
        $this->goalsAway = $goalsAway;

        return $this;
    }

    /**
     * Get goalsAway
     *
     * @return integer
     */
    public function getGoalsAway()
    {
        return $this->goalsAway;
    }

    /**
     * Set goalsHome
     *
     * @param integer $goalsHome
     *
     * @return TablePosition
     */
    public function setGoalsHome($goalsHome)
    {
        $this->goalsHome = $goalsHome;

        return $this;
    }

    /**
     * Get goalsHome
     *
     * @return integer
     */
    public function getGoalsHome()
    {
        return $this->goalsHome;
    }

    /**
     * Set goalsAgainst
     *
     * @param integer $goalsAgainst
     *
     * @return TablePosition
     */
    public function setGoalsAgainst($goalsAgainst)
    {
        $this->goalsAgainst = $goalsAgainst;

        return $this;
    }

    /**
     * Get goalsAgainst
     *
     * @return integer
     */
    public function getGoalsAgainst()
    {
        return $this->goalsAgainst;
    }

    /**
     * Set goalsAgainstAway
     *
     * @param integer $goalsAgainstAway
     *
     * @return TablePosition
     */
    public function setGoalsAgainstAway($goalsAgainstAway)
    {
        $this->goalsAgainstAway = $goalsAgainstAway;

        return $this;
    }

    /**
     * Get goalsAgainstAway
     *
     * @return integer
     */
    public function getGoalsAgainstAway()
    {
        return $this->goalsAgainstAway;
    }

    /**
     * Set goalsAgainstHome
     *
     * @param integer $goalsAgainstHome
     *
     * @return TablePosition
     */
    public function setGoalsAgainstHome($goalsAgainstHome)
    {
        $this->goalsAgainstHome = $goalsAgainstHome;

        return $this;
    }

    /**
     * Get goalsAgainstHome
     *
     * @return integer
     */
    public function getGoalsAgainstHome()
    {
        return $this->goalsAgainstHome;
    }

    /**
     * Set goalDifference
     *
     * @param integer $goalDifference
     *
     * @return TablePosition
     */
    public function setGoalDifference($goalDifference)
    {
        $this->goalDifference = $goalDifference;

        return $this;
    }

    /**
     * Get goalDifference
     *
     * @return integer
     */
    public function getGoalDifference()
    {
        return $this->goalDifference;
    }

    /**
     * Set goalDifferenceAway
     *
     * @param integer $goalDifferenceAway
     *
     * @return TablePosition
     */
    public function setGoalDifferenceAway($goalDifferenceAway)
    {
        $this->goalDifferenceAway = $goalDifferenceAway;

        return $this;
    }

    /**
     * Get goalDifferenceAway
     *
     * @return integer
     */
    public function getGoalDifferenceAway()
    {
        return $this->goalDifferenceAway;
    }

    /**
     * Set goalDifferenceHome
     *
     * @param integer $goalDifferenceHome
     *
     * @return TablePosition
     */
    public function setGoalDifferenceHome($goalDifferenceHome)
    {
        $this->goalDifferenceHome = $goalDifferenceHome;

        return $this;
    }

    /**
     * Get goalDifferenceHome
     *
     * @return integer
     */
    public function getGoalDifferenceHome()
    {
        return $this->goalDifferenceHome;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return TablePosition
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
     * @return TablePosition
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
     * Set team
     *
     * @param \Torakel\DatabaseBundle\Entity\Team $team
     *
     * @return TablePosition
     */
    public function setTeam(\Torakel\DatabaseBundle\Entity\Team $team = null)
    {
        $this->team = $team;

        return $this;
    }

    /**
     * Get team
     *
     * @return \Torakel\DatabaseBundle\Entity\Team
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * Set table
     *
     * @param \Torakel\DatabaseBundle\Entity\Table $table
     *
     * @return TablePosition
     */
    public function setTable(\Torakel\DatabaseBundle\Entity\Table $table = null)
    {
        $this->table = $table;

        return $this;
    }

    /**
     * Get table
     *
     * @return \Torakel\DatabaseBundle\Entity\Table
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * Set gamesPlayed
     *
     * @param integer $gamesPlayed
     *
     * @return TablePosition
     */
    public function setGamesPlayed($gamesPlayed)
    {
        $this->gamesPlayed = $gamesPlayed;

        return $this;
    }

    /**
     * Get gamesPlayed
     *
     * @return integer
     */
    public function getGamesPlayed()
    {
        return $this->gamesPlayed;
    }

    /**
     * Set matchdayTable
     *
     * @param \Torakel\DatabaseBundle\Entity\MatchdayTable $matchdayTable
     *
     * @return TablePosition
     */
    public function setMatchdayTable(\Torakel\DatabaseBundle\Entity\MatchdayTable $matchdayTable = null)
    {
        $this->matchdayTable = $matchdayTable;

        return $this;
    }

    /**
     * Get matchdayTable
     *
     * @return \Torakel\DatabaseBundle\Entity\MatchdayTable
     */
    public function getMatchdayTable()
    {
        return $this->matchdayTable;
    }
}
