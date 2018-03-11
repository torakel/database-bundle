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
use Torakel\DatabaseBundle\Entity\Team as Team;
use Doctrine\Common\Collections\ArrayCollection;

class GameTest extends BaseTest
{

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Game();
        $this->object2 = new Game();
    }

    /**
     * Tests the general getters and setters
     */
    public function testGeneralGetterAndSetter()
    {

        $this->assertNull($this->object->getId());

        $slug = 'slug1';
        $this->object->setSlug($slug);
        $this->assertEquals($slug, $this->object->getSlug());

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

        $startTime = new \DateTime();
        $this->checkAttribute('StartTime', $startTime);
        $this->checkOneToMany('Matchday');
        $this->checkOneToMany('Ground');
        $this->checkOneToMany('Coach', 'CoachHome');
        $this->checkOneToMany('Coach', 'CoachAway');
        $this->checkOneToMany('Team', 'TeamHome');
        $this->checkOneToMany('Team', 'TeamAway');
        $this->checkOneToMany('Referee');
        $this->checkAttribute('ScoreHomeHalftime', 1);
        $this->checkAttribute('ScoreHomeFulltime', 2);
        $this->checkAttribute('ScoreHomeExtratime', 3);
        $this->checkAttribute('ScoreHomePenalties', 4);
        $this->checkAttribute('ScoreAwayHalftime', 5);
        $this->checkAttribute('ScoreAwayFulltime', 6);
        $this->checkAttribute('ScoreAwayExtratime', 7);
        $this->checkAttribute('ScoreAwayPenalties', 8);
        $this->checkAttribute('Audience', 100000);
        $this->checkAttribute('ResultCalculated', true);
        $this->checkManyToOne('GamePlayer');
        $this->checkManyToOne('GamePlayerStatistic');
        $this->checkManyToOne('GameTeamStatistic');
        $this->checkManyToOne('Goal');
        $this->checkManyToOne('Card');
        $this->checkManyToOne('Substitution');

    }
}