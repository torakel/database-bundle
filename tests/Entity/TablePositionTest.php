<?php
namespace Torakel\DatabaseBundle\Tests\Entity;

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
use Torakel\DatabaseBundle\Entity\TablePosition;
use Torakel\DatabaseBundle\Entity\Team as Team;
use Doctrine\Common\Collections\ArrayCollection;

class TablePositionTest extends BaseTest
{

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new TablePosition();
        $this->object2 = new TablePosition();
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

        $this->checkAttribute('Position', 1);
        $this->checkOneToMany('Team');
        $this->checkOneToMany('MatchdayTable');
        $this->checkAttribute('GamesPlayed', 2);
        $this->checkAttribute('Points', 3);
        $this->checkAttribute('PointsAway', 4);
        $this->checkAttribute('PointsHome', 5);
        $this->checkAttribute('Wins', 6);
        $this->checkAttribute('WinsAway', 7);
        $this->checkAttribute('WinsHome', 8);
        $this->checkAttribute('Losses', 9);
        $this->checkAttribute('LossesAway', 10);
        $this->checkAttribute('LossesHome', 11);
        $this->checkAttribute('Draws', 12);
        $this->checkAttribute('DrawsAway', 13);
        $this->checkAttribute('DrawsHome', 14);
        $this->checkAttribute('Goals', 15);
        $this->checkAttribute('GoalsAway', 16);
        $this->checkAttribute('GoalsHome', 17);
        $this->checkAttribute('GoalsAgainst', 18);
        $this->checkAttribute('GoalsAgainstAway', 19);
        $this->checkAttribute('GoalsAgainstHome', 20);
        $this->checkAttribute('GoalDifference', 21);
        $this->checkAttribute('GoalDifferenceAway', 22);
        $this->checkAttribute('GoalDifferenceHome', 23);

        $this->assertEquals(null, $this->object->getId());
        $objectClone = clone $this->object;
        $this->assertEquals(null, $objectClone->getId());
    }
}