<?php
namespace Torakel\DatabaseBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Torakel\DatabaseBundle\Repository\CardRepository")
 * @ORM\Table(name="card")
 */
class Card
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
     * @ORM\ManyToOne(targetEntity="\Torakel\DatabaseBundle\Entity\Game", inversedBy="cards")
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
     * @ORM\Column(type="integer")
     */
    protected $period;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $type;

    /**
     * @var \Torakel\DatabaseBundle\Entity\Team
     * @ORM\ManyToOne(targetEntity="\Torakel\DatabaseBundle\Entity\Team", inversedBy="cards")
     * @ORM\JoinColumn(name="team_id", referencedColumnName="id")
     */
    protected $team;

    /**
     * @var \Torakel\DatabaseBundle\Entity\Coach
     * @ORM\ManyToOne(targetEntity="\Torakel\DatabaseBundle\Entity\Coach", inversedBy="cards")
     * @ORM\JoinColumn(name="coach_id", referencedColumnName="id")
     */
    protected $coach;

    /**
     * @var \Torakel\DatabaseBundle\Entity\Player
     * @ORM\ManyToOne(targetEntity="\Torakel\DatabaseBundle\Entity\Player", inversedBy="cards")
     * @ORM\JoinColumn(name="player_id", referencedColumnName="id")
     */
    protected $player;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $notice;

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
     * @param integer $minute
     *
     * @return Card
     */
    public function setMinute($minute)
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
     * @param integer $minuteExtratime
     *
     * @return Card
     */
    public function setMinuteExtratime($minuteExtratime)
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
     * @return Card
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
     * @return Card
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
     * @return Card
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Card
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
     * @return Card
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
     * @param integer $period
     *
     * @return Card
     */
    public function setPeriod($period)
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
     * @return Card
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
     * @return Card
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
     * Set coach
     *
     * @param \Torakel\DatabaseBundle\Entity\Coach $coach
     *
     * @return Card
     */
    public function setCoach(\Torakel\DatabaseBundle\Entity\Coach $coach = null)
    {
        $this->coach = $coach;

        return $this;
    }

    /**
     * Get coach
     *
     * @return \Torakel\DatabaseBundle\Entity\Coach
     */
    public function getCoach()
    {
        return $this->coach;
    }
}
