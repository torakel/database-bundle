<?php
namespace Torakel\DatabaseBundle\Tests;

use Torakel\DatabaseBundle\Entity\Game as Game;
use Torakel\DatabaseBundle\Entity\Goal as Goal;
use Torakel\DatabaseBundle\Entity\Player as Player;
use Torakel\DatabaseBundle\Entity\Team as Team;
use Doctrine\Common\Collections\ArrayCollection;

class GoalTest extends BaseTest
{

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Goal();
        $this->object2 = new Goal();
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

        $minute = 32;
        $this->object->setMinute($minute);
        $this->assertEquals($minute, $this->object->getMinute());

        $type = 'red';
        $this->object->setType($type);
        $this->assertEquals($type, $this->object->getType());

        $period = 1;
        $this->object->setPeriod($period);
        $this->assertEquals($period, $this->object->getPeriod());

        $notice = 'bla bla';
        $this->object->setNotice($notice);
        $this->assertEquals($notice, $this->object->getNotice());

        $passing = 'echt jetzt';
        $this->object->setPassing($passing);
        $this->assertEquals($passing, $this->object->getPassing());

        $attemptPosition = 'strafraum';
        $this->object->setAttemptPosition($attemptPosition);
        $this->assertEquals($attemptPosition, $this->object->getAttemptPosition());

        $assistPlayerMock = $this->getMockBuilder(Player::class)->getMock();
        $this->object->setAssistPlayer($assistPlayerMock);
        $this->assertEquals($assistPlayerMock, $this->object->getAssistPlayer());

        $teamMock = $this->getMockBuilder(Team::class)->getMock();
        $this->object->setTeam($teamMock);
        $this->assertEquals($teamMock, $this->object->getTeam());

        $playerMock = $this->getMockBuilder(Player::class)->getMock();
        $this->object->setPlayer($playerMock);
        $this->assertEquals($playerMock, $this->object->getPlayer());

        $gameMock = $this->getMockBuilder(Game::class)->getMock();
        $this->object->setGame($gameMock);
        $this->assertEquals($gameMock, $this->object->getGame());
    }
}