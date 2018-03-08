<?php
namespace Torakel\DatabaseBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Torakel\DatabaseBundle\Repository\GoalRepository")
 * @ORM\Table(name="goal")
 */
class Goal
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
     * @ORM\ManyToOne(targetEntity="\Torakel\DatabaseBundle\Entity\Game", inversedBy="goals")
     * @ORM\JoinColumn(name="game_id", referencedColumnName="id")
     */
    protected $game;

    /**
     * @var string
     * @ORM\Column(type="integer")
     */
    protected $minute;

    /**
     * @var string
     * @ORM\Column(type="integer", nullable="true")
     */
    protected $minuteExtratime;

    /**
     * @var string
     * @ORM\Column(type="integer")
     */
    protected $period;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $type;

    /**
     * @var string
     * @ORM\Column(type="string", name="attempt_position", nullable=true)
     */
    protected $attemptPosition;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $passing;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $notice;

    /**
     * @var \Torakel\DatabaseBundle\Entity\Team
     * @ORM\ManyToOne(targetEntity="\Torakel\DatabaseBundle\Entity\Team", inversedBy="goals")
     * @ORM\JoinColumn(name="team_id", referencedColumnName="id")
     */
    protected $team;

    /**
     * @var \Torakel\DatabaseBundle\Entity\Player
     * @ORM\ManyToOne(targetEntity="\Torakel\DatabaseBundle\Entity\Player", inversedBy="goals")
     * @ORM\JoinColumn(name="player_id", referencedColumnName="id")
     */
    protected $player;

    /**
     * @var \Torakel\DatabaseBundle\Entity\Player
     * @ORM\ManyToOne(targetEntity="\Torakel\DatabaseBundle\Entity\Player", inversedBy="assists")
     * @ORM\JoinColumn(name="assist_player_id", referencedColumnName="id")
     */
    protected $assistPlayer;

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
     * Set minute
     *
     * @param $minute
     *
     * @return Goal
     */
    public function setMinute(int $minute)
    {
        $this->minute = $minute;

        return $this;
    }

    /**
     * Get minute
     *
     * @return integer
     */
    public function getMinute()
    {
        return $this->minute;
    }

    /**
     * Set minuteExtratime
     *
     * @param $minuteExtratime
     *
     * @return Goal
     */
    public function setMinuteExtratime(int $minuteExtratime)
    {
        $this->minuteExtratime = $minuteExtratime;

        return $this;
    }

    /**
     * Get minuteExtratime
     *
     * @return integer
     */
    public function getMinuteExtratime()
    {
        return $this->minuteExtratime;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Goal
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
     * Set team
     *
     * @param \Torakel\DatabaseBundle\Entity\Team $team
     *
     * @return Goal
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
     * @return Goal
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

    /**
     * Set assistPlayer
     *
     * @param \Torakel\DatabaseBundle\Entity\Player $assistPlayer
     *
     * @return Goal
     */
    public function setAssistPlayer(\Torakel\DatabaseBundle\Entity\Player $assistPlayer = null)
    {
        $this->assistPlayer = $assistPlayer;

        return $this;
    }

    /**
     * Get assistPlayer
     *
     * @return \Torakel\DatabaseBundle\Entity\Player
     */
    public function getAssistPlayer()
    {
        return $this->assistPlayer;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Goal
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
     * @return Goal
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
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
        $this->updatedAt = new \DateTime();
    }

    /**
     * Set period
     *
     * @param $period
     *
     * @return Goal
     */
    public function setPeriod(int $period)
    {
        $this->period = $period;

        return $this;
    }

    /**
     * Get period
     *
     * @return integer
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * Set notice
     *
     * @param string $notice
     *
     * @return Goal
     */
    public function setNotice($notice)
    {
        $this->notice = $notice;

        return $this;
    }

    /**
     * Get notice
     *
     * @return string
     */
    public function getNotice()
    {
        return $this->notice;
    }

    /**
     * Set game
     *
     * @param \Torakel\DatabaseBundle\Entity\Game $game
     *
     * @return Goal
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
     * Set attemptPosition
     *
     * @param string $attemptPosition
     *
     * @return Goal
     */
    public function setAttemptPosition($attemptPosition)
    {
        $this->attemptPosition = $attemptPosition;

        return $this;
    }

    /**
     * Get attemptPosition
     *
     * @return string
     */
    public function getAttemptPosition()
    {
        return $this->attemptPosition;
    }

    /**
     * Set passing
     *
     * @param string $passing
     *
     * @return Goal
     */
    public function setPassing($passing)
    {
        $this->passing = $passing;

        return $this;
    }

    /**
     * Get passing
     *
     * @return string
     */
    public function getPassing()
    {
        return $this->passing;
    }
}
