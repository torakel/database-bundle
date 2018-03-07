<?php
namespace Torakel\DatabaseBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="game_player_statistic")
 */
class GamePlayerStatistic
{
    /**
     * @var integer
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \Torakel\DatabaseBundle\Entity\Game
     * @ORM\ManyToOne(targetEntity="\Torakel\DatabaseBundle\Entity\Game", inversedBy="gamePlayerStatistics")
     * @ORM\JoinColumn(name="game_id", referencedColumnName="id")
     */
    protected $game;

    /**
     * @var \Torakel\DatabaseBundle\Entity\Team
     * @ORM\ManyToOne(targetEntity="\Torakel\DatabaseBundle\Entity\Team", inversedBy="gamePlayerStatistics")
     * @ORM\JoinColumn(name="team_id", referencedColumnName="id")
     */
    protected $team;

    /**
     * @var \Torakel\DatabaseBundle\Entity\Player
     * @ORM\ManyToOne(targetEntity="\Torakel\DatabaseBundle\Entity\Player", inversedBy="gamePlayerStatistics")
     * @ORM\JoinColumn(name="player_id", referencedColumnName="id")
     */
    protected $player;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="duels_won", nullable=true)
     */
    protected $duelsWon;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="duels_won_ground", nullable=true)
     */
    protected $duelsWonGround;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="duels_won_header", nullable=true)
     */
    protected $duelsWonHeader;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="duels_lost", nullable=true)
     */
    protected $duelsLost;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="duels_lost_ground", nullable=true)
     */
    protected $duelsLostGround;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="duels_lost_header", nullable=true)
     */
    protected $duelsLostHeader;

    /**
     * @var string
     * @ORM\Column(type="decimal", name="duels_won_percentage", precision=5, scale=2, nullable=true)
     */
    protected $duelsWonPercentage;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="passes_completed", nullable=true)
     */
    protected $passesCompleted;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="passes_failed", nullable=true)
     */
    protected $passesFailed;

    /**
     * @var string
     * @ORM\Column(type="decimal", name="passes_completed_percentage", precision=5, scale=2, nullable=true)
     */
    protected $passesCompletedPercentage;

    /**
     * @var string
     * @ORM\Column(type="decimal", name="passes_failed_percentage", precision=5, scale=2, nullable=true)
     */
    protected $passesFailedPercentage;
    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $passes;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="passes_short", nullable=true)
     */
    protected $passesShort;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="balls_touched", nullable=true)
     */
    protected $ballsTouched;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $shots;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="shots_on_goal", nullable=true)
     */
    protected $shotsOnGoal;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="shots_inside_box", nullable=true)
     */
    protected $shotsInsideBox;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="shots_outside_box", nullable=true)
     */
    protected $shotsOutsideBox;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="shots_foot_inside_box", nullable=true)
     */
    protected $shotsFootInsideBox;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="shots_foot_outside_box", nullable=true)
     */
    protected $shotsFootOutsideBox;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="shots_header", nullable=true)
     */
    protected $shotsHeader;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="crosses", nullable=true)
     */
    protected $crosses;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $offsides;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $freekicks;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="miss_chance", nullable=true)
     */
    protected $missChance;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $assists;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="assistsShot", nullable=true)
     */
    protected $assistsShot;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="throw_in", nullable=true)
     */
    protected $throwIn;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $punt;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="shots_penalty_scored", nullable=true)
     */
    protected $shotsPenaltyScored;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="shots_penalty_missed", nullable=true)
     */
    protected $shotsPenaltyMissed;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="shots_off_post", nullable=true)
     */
    protected $shotsOffPost;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="corner_kicks", nullable=true)
     */
    protected $cornerKicks;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $saves;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="catches_punches_crosses", nullable=true)
     */
    protected $catchesPunchesCrosses;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="catches_punches_corners", nullable=true)
     */
    protected $catchesPunchesCorners;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="goals_against", nullable=true)
     */
    protected $goalsAgainst;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="penalty_saves", nullable=true)
     */
    protected $PenaltySaves;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="clear_cut_chance", nullable=true)
     */
    protected $clearCutChance;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="fouls_committed", nullable=true)
     */
    protected $foulsCommitted;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="fouls_suffered", nullable=true)
     */
    protected $foulsSuffered;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $handballs;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="yellow_cards", nullable=true)
     */
    protected $yellowCards;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="red_cards", nullable=true)
     */
    protected $redCards;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="yellow_red_cards", nullable=true)
     */
    protected $yellowRedCards;

    /**
     * @var string
     * @ORM\Column(type="decimal", name="tracking_distance", precision=8, scale=2, nullable=true)
     */
    protected $trackingDistance;

    /**
     * @var string
     * @ORM\Column(type="decimal", name="tracking_sprints_distance", precision=8, scale=2, nullable=true)
     */
    protected $trackingSprintsDistance;

    /**
     * @var string
     * @ORM\Column(type="decimal", name="tracking_fast_runs_distance", precision=8, scale=2, nullable=true)
     */
    protected $trackingFastRunsDistance;

    /**
     * @var string
     * @ORM\Column(type="decimal", name="tracking_offensive_runs_distance", precision=8, scale=2, nullable=true)
     */
    protected $trackingOffensiveRunsDistance;

    /**
     * @var string
     * @ORM\Column(type="decimal", name="tracking_average_speed", precision=4, scale=2, nullable=true)
     */
    protected $trackingAverageSpeed;

    /**
     * @var string
     * @ORM\Column(type="decimal", name="tracking_max_speed", precision=4, scale=2, nullable=true)
     */
    protected $trackingMaxSpeed;

    /**
     * @var string
     * @ORM\Column(type="integer", name="tracking_sprints", nullable=true)
     */
    protected $trackingSprints;

    /**
     * @var string
     * @ORM\Column(type="integer", name="tracking_fast_runs", nullable=true)
     */
    protected $trackingFastRuns;

    /**
     * @var string
     * @ORM\Column(type="integer", name="tracking_offensive_runs", nullable=true)
     */
    protected $trackingOffensiveRuns;

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
     * Set duelsWon
     *
     * @param integer $duelsWon
     *
     * @return GamePlayerStatistic
     */
    public function setDuelsWon($duelsWon)
    {
        $this->duelsWon = $duelsWon;

        return $this;
    }

    /**
     * Get duelsWon
     *
     * @return integer
     */
    public function getDuelsWon()
    {
        return $this->duelsWon;
    }

    /**
     * Set duelsWonGround
     *
     * @param integer $duelsWonGround
     *
     * @return GamePlayerStatistic
     */
    public function setDuelsWonGround($duelsWonGround)
    {
        $this->duelsWonGround = $duelsWonGround;

        return $this;
    }

    /**
     * Get duelsWonGround
     *
     * @return integer
     */
    public function getDuelsWonGround()
    {
        return $this->duelsWonGround;
    }

    /**
     * Set duelsWonHeader
     *
     * @param integer $duelsWonHeader
     *
     * @return GamePlayerStatistic
     */
    public function setDuelsWonHeader($duelsWonHeader)
    {
        $this->duelsWonHeader = $duelsWonHeader;

        return $this;
    }

    /**
     * Get duelsWonHeader
     *
     * @return integer
     */
    public function getDuelsWonHeader()
    {
        return $this->duelsWonHeader;
    }

    /**
     * Set duelsLost
     *
     * @param integer $duelsLost
     *
     * @return GamePlayerStatistic
     */
    public function setDuelsLost($duelsLost)
    {
        $this->duelsLost = $duelsLost;

        return $this;
    }

    /**
     * Get duelsLost
     *
     * @return integer
     */
    public function getDuelsLost()
    {
        return $this->duelsLost;
    }

    /**
     * Set duelsLostGround
     *
     * @param integer $duelsLostGround
     *
     * @return GamePlayerStatistic
     */
    public function setDuelsLostGround($duelsLostGround)
    {
        $this->duelsLostGround = $duelsLostGround;

        return $this;
    }

    /**
     * Get duelsLostGround
     *
     * @return integer
     */
    public function getDuelsLostGround()
    {
        return $this->duelsLostGround;
    }

    /**
     * Set duelsLostHeader
     *
     * @param integer $duelsLostHeader
     *
     * @return GamePlayerStatistic
     */
    public function setDuelsLostHeader($duelsLostHeader)
    {
        $this->duelsLostHeader = $duelsLostHeader;

        return $this;
    }

    /**
     * Get duelsLostHeader
     *
     * @return integer
     */
    public function getDuelsLostHeader()
    {
        return $this->duelsLostHeader;
    }

    /**
     * Set duelsWonPercentage
     *
     * @param string $duelsWonPercentage
     *
     * @return GamePlayerStatistic
     */
    public function setDuelsWonPercentage($duelsWonPercentage)
    {
        $this->duelsWonPercentage = $duelsWonPercentage;

        return $this;
    }

    /**
     * Get duelsWonPercentage
     *
     * @return string
     */
    public function getDuelsWonPercentage()
    {
        return $this->duelsWonPercentage;
    }

    /**
     * Set passesCompleted
     *
     * @param integer $passesCompleted
     *
     * @return GamePlayerStatistic
     */
    public function setPassesCompleted($passesCompleted)
    {
        $this->passesCompleted = $passesCompleted;

        return $this;
    }

    /**
     * Get passesCompleted
     *
     * @return integer
     */
    public function getPassesCompleted()
    {
        return $this->passesCompleted;
    }

    /**
     * Set passesFailed
     *
     * @param integer $passesFailed
     *
     * @return GamePlayerStatistic
     */
    public function setPassesFailed($passesFailed)
    {
        $this->passesFailed = $passesFailed;

        return $this;
    }

    /**
     * Get passesFailed
     *
     * @return integer
     */
    public function getPassesFailed()
    {
        return $this->passesFailed;
    }

    /**
     * Set passesCompletedPercentage
     *
     * @param string $passesCompletedPercentage
     *
     * @return GamePlayerStatistic
     */
    public function setPassesCompletedPercentage($passesCompletedPercentage)
    {
        $this->passesCompletedPercentage = $passesCompletedPercentage;

        return $this;
    }

    /**
     * Get passesCompletedPercentage
     *
     * @return string
     */
    public function getPassesCompletedPercentage()
    {
        return $this->passesCompletedPercentage;
    }

    /**
     * Set passesFailedPercentage
     *
     * @param string $passesFailedPercentage
     *
     * @return GamePlayerStatistic
     */
    public function setPassesFailedPercentage($passesFailedPercentage)
    {
        $this->passesFailedPercentage = $passesFailedPercentage;

        return $this;
    }

    /**
     * Get passesFailedPercentage
     *
     * @return string
     */
    public function getPassesFailedPercentage()
    {
        return $this->passesFailedPercentage;
    }

    /**
     * Set passes
     *
     * @param integer $passes
     *
     * @return GamePlayerStatistic
     */
    public function setPasses($passes)
    {
        $this->passes = $passes;

        return $this;
    }

    /**
     * Get passes
     *
     * @return integer
     */
    public function getPasses()
    {
        return $this->passes;
    }

    /**
     * Set passesShort
     *
     * @param integer $passesShort
     *
     * @return GamePlayerStatistic
     */
    public function setPassesShort($passesShort)
    {
        $this->passesShort = $passesShort;

        return $this;
    }

    /**
     * Get passesShort
     *
     * @return integer
     */
    public function getPassesShort()
    {
        return $this->passesShort;
    }

    /**
     * Set ballsTouched
     *
     * @param integer $ballsTouched
     *
     * @return GamePlayerStatistic
     */
    public function setBallsTouched($ballsTouched)
    {
        $this->ballsTouched = $ballsTouched;

        return $this;
    }

    /**
     * Get ballsTouched
     *
     * @return integer
     */
    public function getBallsTouched()
    {
        return $this->ballsTouched;
    }

    /**
     * Set shots
     *
     * @param integer $shots
     *
     * @return GamePlayerStatistic
     */
    public function setShots($shots)
    {
        $this->shots = $shots;

        return $this;
    }

    /**
     * Get shots
     *
     * @return integer
     */
    public function getShots()
    {
        return $this->shots;
    }

    /**
     * Set shotsOnGoal
     *
     * @param integer $shotsOnGoal
     *
     * @return GamePlayerStatistic
     */
    public function setShotsOnGoal($shotsOnGoal)
    {
        $this->shotsOnGoal = $shotsOnGoal;

        return $this;
    }

    /**
     * Get shotsOnGoal
     *
     * @return integer
     */
    public function getShotsOnGoal()
    {
        return $this->shotsOnGoal;
    }

    /**
     * Set shotsInsideBox
     *
     * @param integer $shotsInsideBox
     *
     * @return GamePlayerStatistic
     */
    public function setShotsInsideBox($shotsInsideBox)
    {
        $this->shotsInsideBox = $shotsInsideBox;

        return $this;
    }

    /**
     * Get shotsInsideBox
     *
     * @return integer
     */
    public function getShotsInsideBox()
    {
        return $this->shotsInsideBox;
    }

    /**
     * Set shotsOutsideBox
     *
     * @param integer $shotsOutsideBox
     *
     * @return GamePlayerStatistic
     */
    public function setShotsOutsideBox($shotsOutsideBox)
    {
        $this->shotsOutsideBox = $shotsOutsideBox;

        return $this;
    }

    /**
     * Get shotsOutsideBox
     *
     * @return integer
     */
    public function getShotsOutsideBox()
    {
        return $this->shotsOutsideBox;
    }

    /**
     * Set shotsFootInsideBox
     *
     * @param integer $shotsFootInsideBox
     *
     * @return GamePlayerStatistic
     */
    public function setShotsFootInsideBox($shotsFootInsideBox)
    {
        $this->shotsFootInsideBox = $shotsFootInsideBox;

        return $this;
    }

    /**
     * Get shotsFootInsideBox
     *
     * @return integer
     */
    public function getShotsFootInsideBox()
    {
        return $this->shotsFootInsideBox;
    }

    /**
     * Set shotsFootOutsideBox
     *
     * @param integer $shotsFootOutsideBox
     *
     * @return GamePlayerStatistic
     */
    public function setShotsFootOutsideBox($shotsFootOutsideBox)
    {
        $this->shotsFootOutsideBox = $shotsFootOutsideBox;

        return $this;
    }

    /**
     * Get shotsFootOutsideBox
     *
     * @return integer
     */
    public function getShotsFootOutsideBox()
    {
        return $this->shotsFootOutsideBox;
    }

    /**
     * Set shotsHeader
     *
     * @param integer $shotsHeader
     *
     * @return GamePlayerStatistic
     */
    public function setShotsHeader($shotsHeader)
    {
        $this->shotsHeader = $shotsHeader;

        return $this;
    }

    /**
     * Get shotsHeader
     *
     * @return integer
     */
    public function getShotsHeader()
    {
        return $this->shotsHeader;
    }

    /**
     * Set crosses
     *
     * @param integer $crosses
     *
     * @return GamePlayerStatistic
     */
    public function setCrosses($crosses)
    {
        $this->crosses = $crosses;

        return $this;
    }

    /**
     * Get crosses
     *
     * @return integer
     */
    public function getCrosses()
    {
        return $this->crosses;
    }

    /**
     * Set offsides
     *
     * @param integer $offsides
     *
     * @return GamePlayerStatistic
     */
    public function setOffsides($offsides)
    {
        $this->offsides = $offsides;

        return $this;
    }

    /**
     * Get offsides
     *
     * @return integer
     */
    public function getOffsides()
    {
        return $this->offsides;
    }

    /**
     * Set freekicks
     *
     * @param integer $freekicks
     *
     * @return GamePlayerStatistic
     */
    public function setFreekicks($freekicks)
    {
        $this->freekicks = $freekicks;

        return $this;
    }

    /**
     * Get freekicks
     *
     * @return integer
     */
    public function getFreekicks()
    {
        return $this->freekicks;
    }

    /**
     * Set missChance
     *
     * @param integer $missChance
     *
     * @return GamePlayerStatistic
     */
    public function setMissChance($missChance)
    {
        $this->missChance = $missChance;

        return $this;
    }

    /**
     * Get missChance
     *
     * @return integer
     */
    public function getMissChance()
    {
        return $this->missChance;
    }

    /**
     * Set assists
     *
     * @param integer $assists
     *
     * @return GamePlayerStatistic
     */
    public function setAssists($assists)
    {
        $this->assists = $assists;

        return $this;
    }

    /**
     * Get assists
     *
     * @return integer
     */
    public function getAssists()
    {
        return $this->assists;
    }

    /**
     * Set assistsShot
     *
     * @param integer $assistsShot
     *
     * @return GamePlayerStatistic
     */
    public function setAssistsShot($assistsShot)
    {
        $this->assistsShot = $assistsShot;

        return $this;
    }

    /**
     * Get assistsShot
     *
     * @return integer
     */
    public function getAssistsShot()
    {
        return $this->assistsShot;
    }

    /**
     * Set throwIn
     *
     * @param integer $throwIn
     *
     * @return GamePlayerStatistic
     */
    public function setThrowIn($throwIn)
    {
        $this->throwIn = $throwIn;

        return $this;
    }

    /**
     * Get throwIn
     *
     * @return integer
     */
    public function getThrowIn()
    {
        return $this->throwIn;
    }

    /**
     * Set punt
     *
     * @param integer $punt
     *
     * @return GamePlayerStatistic
     */
    public function setPunt($punt)
    {
        $this->punt = $punt;

        return $this;
    }

    /**
     * Get punt
     *
     * @return integer
     */
    public function getPunt()
    {
        return $this->punt;
    }

    /**
     * Set shotsPenaltyScored
     *
     * @param integer $shotsPenaltyScored
     *
     * @return GamePlayerStatistic
     */
    public function setShotsPenaltyScored($shotsPenaltyScored)
    {
        $this->shotsPenaltyScored = $shotsPenaltyScored;

        return $this;
    }

    /**
     * Get shotsPenaltyScored
     *
     * @return integer
     */
    public function getShotsPenaltyScored()
    {
        return $this->shotsPenaltyScored;
    }

    /**
     * Set shotsPenaltyMissed
     *
     * @param integer $shotsPenaltyMissed
     *
     * @return GamePlayerStatistic
     */
    public function setShotsPenaltyMissed($shotsPenaltyMissed)
    {
        $this->shotsPenaltyMissed = $shotsPenaltyMissed;

        return $this;
    }

    /**
     * Get shotsPenaltyMissed
     *
     * @return integer
     */
    public function getShotsPenaltyMissed()
    {
        return $this->shotsPenaltyMissed;
    }

    /**
     * Set shotsOffPost
     *
     * @param integer $shotsOffPost
     *
     * @return GamePlayerStatistic
     */
    public function setShotsOffPost($shotsOffPost)
    {
        $this->shotsOffPost = $shotsOffPost;

        return $this;
    }

    /**
     * Get shotsOffPost
     *
     * @return integer
     */
    public function getShotsOffPost()
    {
        return $this->shotsOffPost;
    }

    /**
     * Set cornerKicks
     *
     * @param integer $cornerKicks
     *
     * @return GamePlayerStatistic
     */
    public function setCornerKicks($cornerKicks)
    {
        $this->cornerKicks = $cornerKicks;

        return $this;
    }

    /**
     * Get cornerKicks
     *
     * @return integer
     */
    public function getCornerKicks()
    {
        return $this->cornerKicks;
    }

    /**
     * Set saves
     *
     * @param integer $saves
     *
     * @return GamePlayerStatistic
     */
    public function setSaves($saves)
    {
        $this->saves = $saves;

        return $this;
    }

    /**
     * Get saves
     *
     * @return integer
     */
    public function getSaves()
    {
        return $this->saves;
    }

    /**
     * Set catchesPunchesCrosses
     *
     * @param integer $catchesPunchesCrosses
     *
     * @return GamePlayerStatistic
     */
    public function setCatchesPunchesCrosses($catchesPunchesCrosses)
    {
        $this->catchesPunchesCrosses = $catchesPunchesCrosses;

        return $this;
    }

    /**
     * Get catchesPunchesCrosses
     *
     * @return integer
     */
    public function getCatchesPunchesCrosses()
    {
        return $this->catchesPunchesCrosses;
    }

    /**
     * Set catchesPunchesCorners
     *
     * @param integer $catchesPunchesCorners
     *
     * @return GamePlayerStatistic
     */
    public function setCatchesPunchesCorners($catchesPunchesCorners)
    {
        $this->catchesPunchesCorners = $catchesPunchesCorners;

        return $this;
    }

    /**
     * Get catchesPunchesCorners
     *
     * @return integer
     */
    public function getCatchesPunchesCorners()
    {
        return $this->catchesPunchesCorners;
    }

    /**
     * Set goalsAgainst
     *
     * @param integer $goalsAgainst
     *
     * @return GamePlayerStatistic
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
     * Set penaltySaves
     *
     * @param integer $penaltySaves
     *
     * @return GamePlayerStatistic
     */
    public function setPenaltySaves($penaltySaves)
    {
        $this->PenaltySaves = $penaltySaves;

        return $this;
    }

    /**
     * Get penaltySaves
     *
     * @return integer
     */
    public function getPenaltySaves()
    {
        return $this->PenaltySaves;
    }

    /**
     * Set clearCutChance
     *
     * @param integer $clearCutChance
     *
     * @return GamePlayerStatistic
     */
    public function setClearCutChance($clearCutChance)
    {
        $this->clearCutChance = $clearCutChance;

        return $this;
    }

    /**
     * Get clearCutChance
     *
     * @return integer
     */
    public function getClearCutChance()
    {
        return $this->clearCutChance;
    }

    /**
     * Set foulsCommitted
     *
     * @param integer $foulsCommitted
     *
     * @return GamePlayerStatistic
     */
    public function setFoulsCommitted($foulsCommitted)
    {
        $this->foulsCommitted = $foulsCommitted;

        return $this;
    }

    /**
     * Get foulsCommitted
     *
     * @return integer
     */
    public function getFoulsCommitted()
    {
        return $this->foulsCommitted;
    }

    /**
     * Set foulsSuffered
     *
     * @param integer $foulsSuffered
     *
     * @return GamePlayerStatistic
     */
    public function setFoulsSuffered($foulsSuffered)
    {
        $this->foulsSuffered = $foulsSuffered;

        return $this;
    }

    /**
     * Get foulsSuffered
     *
     * @return integer
     */
    public function getFoulsSuffered()
    {
        return $this->foulsSuffered;
    }

    /**
     * Set handballs
     *
     * @param integer $handballs
     *
     * @return GamePlayerStatistic
     */
    public function setHandballs($handballs)
    {
        $this->handballs = $handballs;

        return $this;
    }

    /**
     * Get handballs
     *
     * @return integer
     */
    public function getHandballs()
    {
        return $this->handballs;
    }

    /**
     * Set yellowCards
     *
     * @param integer $yellowCards
     *
     * @return GamePlayerStatistic
     */
    public function setYellowCards($yellowCards)
    {
        $this->yellowCards = $yellowCards;

        return $this;
    }

    /**
     * Get yellowCards
     *
     * @return integer
     */
    public function getYellowCards()
    {
        return $this->yellowCards;
    }

    /**
     * Set redCards
     *
     * @param integer $redCards
     *
     * @return GamePlayerStatistic
     */
    public function setRedCards($redCards)
    {
        $this->redCards = $redCards;

        return $this;
    }

    /**
     * Get redCards
     *
     * @return integer
     */
    public function getRedCards()
    {
        return $this->redCards;
    }

    /**
     * Set yellowRedCards
     *
     * @param integer $yellowRedCards
     *
     * @return GamePlayerStatistic
     */
    public function setYellowRedCards($yellowRedCards)
    {
        $this->yellowRedCards = $yellowRedCards;

        return $this;
    }

    /**
     * Get yellowRedCards
     *
     * @return integer
     */
    public function getYellowRedCards()
    {
        return $this->yellowRedCards;
    }

    /**
     * Set trackingDistance
     *
     * @param string $trackingDistance
     *
     * @return GamePlayerStatistic
     */
    public function setTrackingDistance($trackingDistance)
    {
        $this->trackingDistance = $trackingDistance;

        return $this;
    }

    /**
     * Get trackingDistance
     *
     * @return string
     */
    public function getTrackingDistance()
    {
        return $this->trackingDistance;
    }

    /**
     * Set trackingSprintsDistance
     *
     * @param string $trackingSprintsDistance
     *
     * @return GamePlayerStatistic
     */
    public function setTrackingSprintsDistance($trackingSprintsDistance)
    {
        $this->trackingSprintsDistance = $trackingSprintsDistance;

        return $this;
    }

    /**
     * Get trackingSprintsDistance
     *
     * @return string
     */
    public function getTrackingSprintsDistance()
    {
        return $this->trackingSprintsDistance;
    }

    /**
     * Set trackingFastRunsDistance
     *
     * @param string $trackingFastRunsDistance
     *
     * @return GamePlayerStatistic
     */
    public function setTrackingFastRunsDistance($trackingFastRunsDistance)
    {
        $this->trackingFastRunsDistance = $trackingFastRunsDistance;

        return $this;
    }

    /**
     * Get trackingFastRunsDistance
     *
     * @return string
     */
    public function getTrackingFastRunsDistance()
    {
        return $this->trackingFastRunsDistance;
    }

    /**
     * Set trackingOffensiveRunsDistance
     *
     * @param string $trackingOffensiveRunsDistance
     *
     * @return GamePlayerStatistic
     */
    public function setTrackingOffensiveRunsDistance($trackingOffensiveRunsDistance)
    {
        $this->trackingOffensiveRunsDistance = $trackingOffensiveRunsDistance;

        return $this;
    }

    /**
     * Get trackingOffensiveRunsDistance
     *
     * @return string
     */
    public function getTrackingOffensiveRunsDistance()
    {
        return $this->trackingOffensiveRunsDistance;
    }

    /**
     * Set trackingAverageSpeed
     *
     * @param string $trackingAverageSpeed
     *
     * @return GamePlayerStatistic
     */
    public function setTrackingAverageSpeed($trackingAverageSpeed)
    {
        $this->trackingAverageSpeed = $trackingAverageSpeed;

        return $this;
    }

    /**
     * Get trackingAverageSpeed
     *
     * @return string
     */
    public function getTrackingAverageSpeed()
    {
        return $this->trackingAverageSpeed;
    }

    /**
     * Set trackingMaxSpeed
     *
     * @param string $trackingMaxSpeed
     *
     * @return GamePlayerStatistic
     */
    public function setTrackingMaxSpeed($trackingMaxSpeed)
    {
        $this->trackingMaxSpeed = $trackingMaxSpeed;

        return $this;
    }

    /**
     * Get trackingMaxSpeed
     *
     * @return string
     */
    public function getTrackingMaxSpeed()
    {
        return $this->trackingMaxSpeed;
    }

    /**
     * Set trackingSprints
     *
     * @param integer $trackingSprints
     *
     * @return GamePlayerStatistic
     */
    public function setTrackingSprints($trackingSprints)
    {
        $this->trackingSprints = $trackingSprints;

        return $this;
    }

    /**
     * Get trackingSprints
     *
     * @return integer
     */
    public function getTrackingSprints()
    {
        return $this->trackingSprints;
    }

    /**
     * Set trackingFastRuns
     *
     * @param integer $trackingFastRuns
     *
     * @return GamePlayerStatistic
     */
    public function setTrackingFastRuns($trackingFastRuns)
    {
        $this->trackingFastRuns = $trackingFastRuns;

        return $this;
    }

    /**
     * Get trackingFastRuns
     *
     * @return integer
     */
    public function getTrackingFastRuns()
    {
        return $this->trackingFastRuns;
    }

    /**
     * Set trackingOffensiveRuns
     *
     * @param integer $trackingOffensiveRuns
     *
     * @return GamePlayerStatistic
     */
    public function setTrackingOffensiveRuns($trackingOffensiveRuns)
    {
        $this->trackingOffensiveRuns = $trackingOffensiveRuns;

        return $this;
    }

    /**
     * Get trackingOffensiveRuns
     *
     * @return integer
     */
    public function getTrackingOffensiveRuns()
    {
        return $this->trackingOffensiveRuns;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return GamePlayerStatistic
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
     * @return GamePlayerStatistic
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
     * Set game
     *
     * @param \Torakel\DatabaseBundle\Entity\Game $game
     *
     * @return GamePlayerStatistic
     */
    public function setGame(\Torakel\DatabaseBundle\Entity\Game $game = null)
    {
        $this->game = $game;

        return $this;
    }

    /**
     * Get game
     *
     * @return \Torakel\DatabaseBundle\Entity\Game
     */
    public function getGame()
    {
        return $this->game;
    }

    /**
     * Set team
     *
     * @param \Torakel\DatabaseBundle\Entity\Team $team
     *
     * @return GamePlayerStatistic
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
     * Set player
     *
     * @param \Torakel\DatabaseBundle\Entity\Player $player
     *
     * @return GamePlayerStatistic
     */
    public function setPlayer(\Torakel\DatabaseBundle\Entity\Player $player = null)
    {
        $this->player = $player;

        return $this;
    }

    /**
     * Get player
     *
     * @return \Torakel\DatabaseBundle\Entity\Player
     */
    public function getPlayer()
    {
        return $this->player;
    }
}
