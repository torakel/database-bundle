<?php
namespace Torakel\DatabaseBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Torakel\DatabaseBundle\Repository\SubstitutionRepository")
 * @ORM\Table(name="substitution")
 */
class Substitution
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
    protected $number;

    /**
     * @var string
     * @ORM\Column(type="integer")
     */
    protected $minute;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    protected $period;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $notice;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $position;

    /**
     * @var \Torakel\DatabaseBundle\Entity\Game
     * @ORM\ManyToOne(targetEntity="\Torakel\DatabaseBundle\Entity\Game", inversedBy="substitutions")
     * @ORM\JoinColumn(name="game_id", referencedColumnName="id")
     */
    protected $game;

    /**
     * @var \Torakel\DatabaseBundle\Entity\Team
     * @ORM\ManyToOne(targetEntity="\Torakel\DatabaseBundle\Entity\Team", inversedBy="substitutions")
     * @ORM\JoinColumn(name="team_id", referencedColumnName="id")
     */
    protected $team;

    /**
     * @var \Torakel\DatabaseBundle\Entity\Player
     * @ORM\ManyToOne(targetEntity="\Torakel\DatabaseBundle\Entity\Player", inversedBy="intoSubstitutions")
     * @ORM\JoinColumn(name="into_player_id", referencedColumnName="id")
     */
    protected $intoPlayer;

    /**
     * @var \Torakel\DatabaseBundle\Entity\Player
     * @ORM\ManyToOne(targetEntity="\Torakel\DatabaseBundle\Entity\Player", inversedBy="outSubstitutions")
     * @ORM\JoinColumn(name="out_player_id", referencedColumnName="id")
     */
    protected $outPlayer;

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
     * Set number
     *
     * @param integer $number
     *
     * @return Substitution
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set minute
     *
     * @param integer $minute
     *
     * @return Substitution
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
     * Set position
     *
     * @param string $position
     *
     * @return Substitution
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
     * Set game
     *
     * @param \Torakel\DatabaseBundle\Entity\Game $game
     *
     * @return Substitution
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
     * @return Substitution
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
     * Set intoPlayer
     *
     * @param \Torakel\DatabaseBundle\Entity\Player $intoPlayer
     *
     * @return Substitution
     */
    public function setIntoPlayer(\Torakel\DatabaseBundle\Entity\Player $intoPlayer = null)
    {
        $this->intoPlayer = $intoPlayer;

        return $this;
    }

    /**
     * Get intoPlayer
     *
     * @return \Torakel\DatabaseBundle\Entity\Player
     */
    public function getIntoPlayer()
    {
        return $this->intoPlayer;
    }

    /**
     * Set outPlayer
     *
     * @param \Torakel\DatabaseBundle\Entity\Player $outPlayer
     *
     * @return Substitution
     */
    public function setOutPlayer(\Torakel\DatabaseBundle\Entity\Player $outPlayer = null)
    {
        $this->outPlayer = $outPlayer;

        return $this;
    }

    /**
     * Get outPlayer
     *
     * @return \Torakel\DatabaseBundle\Entity\Player
     */
    public function getOutPlayer()
    {
        return $this->outPlayer;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Substitution
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
     * @return Substitution
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
     * @return Substitution
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
     * @return Substitution
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
}
