<?php
namespace Torakel\DatabaseBundle\Tests;

use Torakel\DatabaseBundle\Entity\Competition as Competition;
use Torakel\DatabaseBundle\Entity\Event as Event;
use Torakel\DatabaseBundle\Entity\Round as Round;
use Torakel\DatabaseBundle\Entity\Season as Season;
use Doctrine\Common\Collections\ArrayCollection;

class EventTest extends BaseTest
{

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Event();
        $this->object2 = new Event();
    }

    /**
     * Tests the specific getters and setters for the City entity.
     */
    public function testGetterAndSetter()
    {

        $name = 'name1';
        $this->object->setName($name);
        $this->assertEquals($name, $this->object->getName());

        $competitionMock = $this->getMockBuilder(Competition::class)->getMock();
        $this->object->setCompetition($competitionMock);
        $this->assertEquals($competitionMock, $this->object->getCompetition());

        $seasonMock = $this->getMockBuilder(Season::class)->getMock();
        $this->object->setSeason($seasonMock);
        $this->assertEquals($seasonMock, $this->object->getSeason());

        $round1 = $this->getMockBuilder(Round::class)->getMock();
        $round2 = $this->getMockBuilder(Round::class)->getMock();
        $round3 = $this->getMockBuilder(Round::class)->getMock();
        $rounds = new ArrayCollection();
        $rounds[] = $round1;
        $rounds[] = $round2;
        $this->object->addRound($round1);
        $this->object->addRound($round2);
        $this->object->addRound($round3);
        $this->object->removeRound($round3);
        $this->assertEquals($rounds, $this->object->getRounds());
    }
}