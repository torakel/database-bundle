<?php
namespace Torakel\DatabaseBundle\Tests;

use Torakel\DatabaseBundle\Entity\City as City;
use Torakel\DatabaseBundle\Entity\Coach as Coach;
use Torakel\DatabaseBundle\Entity\Competition as Competition;
use Torakel\DatabaseBundle\Entity\Continent as Continent;
use Torakel\DatabaseBundle\Entity\Country as Country;
use Torakel\DatabaseBundle\Entity\Referee as Referee;
use Doctrine\Common\Collections\ArrayCollection;

class CountryTest extends BaseTest
{

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Country();
        $this->object2 = new Country();
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

        $competition1 = $this->getMockBuilder(Competition::class)->getMock();
        $competition2 = $this->getMockBuilder(Competition::class)->getMock();
        $competition3 = $this->getMockBuilder(Competition::class)->getMock();
        $competitions = new ArrayCollection();
        $competitions[] = $competition1;
        $competitions[] = $competition2;
        $this->object->addCompetition($competition1);
        $this->object->addCompetition($competition2);
        $this->object->addCompetition($competition3);
        $this->object->removeCompetition($competition3);
        $this->assertEquals($competitions, $this->object->getCompetitions());

        $referee1 = $this->getMockBuilder(Referee::class)->getMock();
        $referee2 = $this->getMockBuilder(Referee::class)->getMock();
        $referee3 = $this->getMockBuilder(Referee::class)->getMock();
        $referees = new ArrayCollection();
        $referees[] = $referee1;
        $referees[] = $referee2;
        $this->object->addReferee($referee1);
        $this->object->addReferee($referee2);
        $this->object->addReferee($referee3);
        $this->object->removeReferee($referee3);
        $this->assertEquals($referees, $this->object->getReferees());

        $coach1 = $this->getMockBuilder(Coach::class)->getMock();
        $coach2 = $this->getMockBuilder(Coach::class)->getMock();
        $coach3 = $this->getMockBuilder(Coach::class)->getMock();
        $coaches = new ArrayCollection();
        $coaches[] = $coach1;
        $coaches[] = $coach2;
        $this->object->addCoach($coach1);
        $this->object->addCoach($coach2);
        $this->object->addCoach($coach3);
        $this->object->removeCoach($coach3);
        $this->assertEquals($coaches, $this->object->getCoaches());

        $city1 = $this->getMockBuilder(City::class)->getMock();
        $city2 = $this->getMockBuilder(City::class)->getMock();
        $city3 = $this->getMockBuilder(City::class)->getMock();
        $cities = new ArrayCollection();
        $cities[] = $city1;
        $cities[] = $city2;
        $this->object->addCity($city1);
        $this->object->addCity($city2);
        $this->object->addCity($city3);
        $this->object->removeCity($city3);
        $this->assertEquals($cities, $this->object->getCities());
    }
}