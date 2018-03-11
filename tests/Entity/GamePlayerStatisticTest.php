<?php
namespace Torakel\DatabaseBundle\Tests;

use Torakel\DatabaseBundle\Entity\Card as Card;
use Torakel\DatabaseBundle\Entity\Coach as Coach;
use Torakel\DatabaseBundle\Entity\Game as Game;
use Torakel\DatabaseBundle\Entity\GamePlayer as GamePlayer;
use Torakel\DatabaseBundle\Entity\GamePlayerStatistic as GamePlayerStatistic;
use Torakel\DatabaseBundle\Entity\GameTeamStatistic as GameTeamStatistic;
use Torakel\DatabaseBundle\Entity\Goal as Goal;
use Torakel\DatabaseBundle\Entity\Ground as Ground;
use Torakel\DatabaseBundle\Entity\Matchday as Matchday;
use Torakel\DatabaseBundle\Entity\Substitution as Substitution;
use Torakel\DatabaseBundle\Entity\Team as Team;
use Doctrine\Common\Collections\ArrayCollection;

class GamePlayerStatisticTest extends BaseTest
{

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new GamePlayerStatistic();
        $this->object2 = new GamePlayerStatistic();
    }

    /**
     * Tests the general getters and setters
     */
    public function testGeneralGetterAndSetter()
    {

        $this->assertNull($this->object->getId());

        $date = new \DateTime();
        $this->object->setCreatedAt($date);
        $this->assertEquals($date, $this->object->getCreatedAt());
        $this->object->setUpdatedAt($date);
        $this->assertEquals($date, $this->object->getUpdatedAt());

        $city = $this->object2;
        $city->prePersist();
        $this->assertTrue(is_object($city->getCreatedAt()));
        $city->preUpdate();
        $this->assertTrue(is_object($city->getUpdatedAt()));
    }

    /**
     * Tests the specific getters and setters for the City entity.
     */
    public function testGetterAndSetter()
    {

        $this->checkOneToMany('Game');
        $this->checkOneToMany('Player');
        $this->checkOneToMany('Team');
        $this->checkAttribute('DuelsWon', 1);
        $this->checkAttribute('DuelsWonGround', 2);
        $this->checkAttribute('DuelsWonHeader', 3);
        $this->checkAttribute('DuelsLost', 10);
        $this->checkAttribute('DuelsLostGround', 12);
        $this->checkAttribute('DuelsLostHeader', 13);
        $this->checkAttribute('DuelsWonPercentage', 30);
        $this->checkAttribute('PassesCompleted', 31);
        $this->checkAttribute('PassesFailed', 32);
        $this->checkAttribute('PassesCompletedPercentage', 34);
        $this->checkAttribute('PassesFailedPercentage', 35);
        $this->checkAttribute('Passes', 36);
        $this->checkAttribute('PassesShort', 37);
        $this->checkAttribute('BallsTouched', 38);
        $this->checkAttribute('Shots', 39);
        $this->checkAttribute('ShotsOnGoal', 40);
        $this->checkAttribute('ShotsInsideBox', 41);
        $this->checkAttribute('ShotsOutsideBox', 42);
        $this->checkAttribute('ShotsFootInsideBox', 43);
        $this->checkAttribute('ShotsFootOutsideBox', 44);
        $this->checkAttribute('ShotsHeader', 45);
        $this->checkAttribute('Crosses', 46);
        $this->checkAttribute('Offsides', 47);
        $this->checkAttribute('Freekicks', 48);
        $this->checkAttribute('MissChance', 49);
        $this->checkAttribute('Assists', 50);
        $this->checkAttribute('AssistsShot', 51);
        $this->checkAttribute('ThrowIn', 52);
        $this->checkAttribute('ShotsPenaltyScored', 53);
        $this->checkAttribute('ShotsPenaltyMissed', 54);
        $this->checkAttribute('Punt', 55);
        $this->checkAttribute('CornerKicks', 56);
        $this->checkAttribute('ShotsOffPost', 57);
        $this->checkAttribute('Saves', 58);
        $this->checkAttribute('CatchesPunchesCorners', 59);
        $this->checkAttribute('CatchesPunchesCrosses', 60);
        $this->checkAttribute('GoalsAgainst', 61);
        $this->checkAttribute('PenaltySaves', 62);
        $this->checkAttribute('ClearCutChance', 61);
        $this->checkAttribute('FoulsCommitted', 63);
        $this->checkAttribute('FoulsSuffered', 64);
        $this->checkAttribute('Handballs', 65);
        $this->checkAttribute('YellowCards', 66);
        $this->checkAttribute('RedCards', 67);
        $this->checkAttribute('YellowRedCards', 68);
        $this->checkAttribute('TrackingDistance', 61.10);
        $this->checkAttribute('TrackingSprintsDistance', 61.20);
        $this->checkAttribute('TrackingFastRunsDistance', 61.30);
        $this->checkAttribute('TrackingOffensiveRunsDistance', 61.40);
        $this->checkAttribute('TrackingAverageSpeed', 61.50);
        $this->checkAttribute('TrackingMaxSpeed', 61.60);
        $this->checkAttribute('TrackingSprints', 69);
        $this->checkAttribute('TrackingFastRuns', 70);
        $this->checkAttribute('TrackingOffensiveRuns', 71);
    }
}