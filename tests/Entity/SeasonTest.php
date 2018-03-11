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
use Torakel\DatabaseBundle\Entity\Season;
use Torakel\DatabaseBundle\Entity\Substitution as Substitution;
use Torakel\DatabaseBundle\Entity\Team as Team;
use Doctrine\Common\Collections\ArrayCollection;

class SeasonTest extends BaseTest
{

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Season();
        $this->object2 = new Season();
    }

    /**
     * Tests the general getters and setters
     */
    public function testGeneralGetterAndSetter()
    {

        $this->assertNull($this->object->getId());
        $this->checkAttribute('Slug', 'slug1');
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

        $this->checkAttribute('Name', 'name1');
        $this->checkManyToOne('Event');

    }
}