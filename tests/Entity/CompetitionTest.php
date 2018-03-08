<?php
namespace Torakel\DatabaseBundle\Tests;

use Torakel\DatabaseBundle\Entity\Continent as Continent;
use Torakel\DatabaseBundle\Entity\Competition as Competition;
use Torakel\DatabaseBundle\Entity\Country as Country;
use Torakel\DatabaseBundle\Entity\Event as Event;
use Doctrine\Common\Collections\ArrayCollection;

class CompetitionTest extends BaseTest
{

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Competition();
        $this->object2 = new Competition();
    }

    /**
     * Tests the specific getters and setters for the City entity.
     */
    public function testGetterAndSetter()
    {

        $name = 'name1';
        $this->object->setName($name);
        $this->assertEquals($name, $this->object->getName());

        $continentMock = $this->getMockBuilder(Continent::class)->getMock();
        $this->object->setContinent($continentMock);
        $this->assertEquals($continentMock, $this->object->getContinent());

        $countryMock = $this->getMockBuilder(Country::class)->getMock();
        $this->object->setCountry($countryMock);
        $this->assertEquals($countryMock, $this->object->getCountry());

        $event1 = $this->getMockBuilder(Event::class)->getMock();
        $event2 = $this->getMockBuilder(Event::class)->getMock();
        $event3 = $this->getMockBuilder(Event::class)->getMock();
        $events = new ArrayCollection();
        $events[] = $event1;
        $events[] = $event2;
        $this->object->addEvent($event1);
        $this->object->addEvent($event2);
        $this->object->addEvent($event3);
        $this->object->removeEvent($event3);
        $this->assertEquals($events, $this->object->getEvents());

    }
}