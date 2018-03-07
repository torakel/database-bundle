<?php
namespace Torakel\DatabaseBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="game_team_statistic")
 */
class GameTeamStatistic
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
     * @ORM\ManyToOne(targetEntity="\Torakel\DatabaseBundle\Entity\Game", inversedBy="gameTeamStatistics")
     * @ORM\JoinColumn(name="game_id", referencedColumnName="id")
     */
    protected $game;

    /**
     * @var \Torakel\DatabaseBundle\Entity\Team
     * @ORM\ManyToOne(targetEntity="\Torakel\DatabaseBundle\Entity\Team", inversedBy="gameTeamStatistics")
     * @ORM\JoinColumn(name="team_id", referencedColumnName="id")
     */
    protected $team;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="duels_won", nullable=true)
     */
    protected $duelsWon;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="duels_lost", nullable=true)
     */
    protected $duelsLost;

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
     * @ORM\Column(type="integer", name="balls_touched", nullable=true)
     */
    protected $ballsTouched;

    /**
     * @var string
     * @ORM\Column(type="decimal", name="balls_touched_percentage", precision=5, scale=2, nullable=true)
     */
    protected $ballsTouchedPercentage;

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
     * @ORM\Column(type="integer", name="crosses_left", nullable=true)
     */
    protected $crossesLeft;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="crosses_right", nullable=true)
     */
    protected $crossesRight;

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
     * @ORM\Column(type="integer", name="corner_kicks_left", nullable=true)
     */
    protected $cornerKicksLeft;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="corner_kicks_right", nullable=true)
     */
    protected $cornerKicksRight;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $saves;

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
     * @ORM\Column(type="decimal", name="tracking_max_speed", precision=7, scale=5, nullable=true)
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
     * @return GameTeamStatistic
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
     * Set duelsLost
     *
     * @param integer $duelsLost
     *
     * @return GameTeamStatistic
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
     * Set duelsWonPercentage
     *
     * @param string $duelsWonPercentage
     *
     * @return GameTeamStatistic
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
     * @return GameTeamStatistic
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
     * @return GameTeamStatistic
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
     * @return GameTeamStatistic
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
     * @return GameTeamStatistic
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
     * Set ballsTouched
     *
     * @param integer $ballsTouched
     *
     * @return GameTeamStatistic
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
     * Set ballsTouchedPercentage
     *
     * @param string $ballsTouchedPercentage
     *
     * @return GameTeamStatistic
     */
    public function setBallsTouchedPercentage($ballsTouchedPercentage)
    {
        $this->ballsTouchedPercentage = $ballsTouchedPercentage;

        return $this;
    }

    /**
     * Get ballsTouchedPercentage
     *
     * @return string
     */
    public function getBallsTouchedPercentage()
    {
        return $this->ballsTouchedPercentage;
    }

    /**
     * Set shots
     *
     * @param integer $shots
     *
     * @return GameTeamStatistic
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
     * @return GameTeamStatistic
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
     * @return GameTeamStatistic
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
     * @return GameTeamStatistic
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
     * @return GameTeamStatistic
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
     * @return GameTeamStatistic
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
     * @return GameTeamStatistic
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
     * @return GameTeamStatistic
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
     * Set crossesLeft
     *
     * @param integer $crossesLeft
     *
     * @return GameTeamStatistic
     */
    public function setCrossesLeft($crossesLeft)
    {
        $this->crossesLeft = $crossesLeft;

        return $this;
    }

    /**
     * Get crossesLeft
     *
     * @return integer
     */
    public function getCrossesLeft()
    {
        return $this->crossesLeft;
    }

    /**
     * Set crossesRight
     *
     * @param integer $crossesRight
     *
     * @return GameTeamStatistic
     */
    public function setCrossesRight($crossesRight)
    {
        $this->crossesRight = $crossesRight;

        return $this;
    }

    /**
     * Get crossesRight
     *
     * @return integer
     */
    public function getCrossesRight()
    {
        return $this->crossesRight;
    }

    /**
     * Set offsides
     *
     * @param integer $offsides
     *
     * @return GameTeamStatistic
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
     * @return GameTeamStatistic
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
     * @return GameTeamStatistic
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
     * Set shotsOffPost
     *
     * @param integer $shotsOffPost
     *
     * @return GameTeamStatistic
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
     * @return GameTeamStatistic
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
     * Set cornerKicksLeft
     *
     * @param integer $cornerKicksLeft
     *
     * @return GameTeamStatistic
     */
    public function setCornerKicksLeft($cornerKicksLeft)
    {
        $this->cornerKicksLeft = $cornerKicksLeft;

        return $this;
    }

    /**
     * Get cornerKicksLeft
     *
     * @return integer
     */
    public function getCornerKicksLeft()
    {
        return $this->cornerKicksLeft;
    }

    /**
     * Set cornerKicksRight
     *
     * @param integer $cornerKicksRight
     *
     * @return GameTeamStatistic
     */
    public function setCornerKicksRight($cornerKicksRight)
    {
        $this->cornerKicksRight = $cornerKicksRight;

        return $this;
    }

    /**
     * Get cornerKicksRight
     *
     * @return integer
     */
    public function getCornerKicksRight()
    {
        return $this->cornerKicksRight;
    }

    /**
     * Set saves
     *
     * @param integer $saves
     *
     * @return GameTeamStatistic
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
     * Set foulsCommitted
     *
     * @param integer $foulsCommitted
     *
     * @return GameTeamStatistic
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
     * @return GameTeamStatistic
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
     * @return GameTeamStatistic
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
     * @return GameTeamStatistic
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
     * @return GameTeamStatistic
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
     * @return GameTeamStatistic
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
     * @return GameTeamStatistic
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
     * @return GameTeamStatistic
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
     * @return GameTeamStatistic
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
     * Set trackingMaxSpeed
     *
     * @param string $trackingMaxSpeed
     *
     * @return GameTeamStatistic
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
     * @return GameTeamStatistic
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
     * @return GameTeamStatistic
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return GameTeamStatistic
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
     * @return GameTeamStatistic
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
     * @return GameTeamStatistic
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
     * @return GameTeamStatistic
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
}
