<?php
namespace Torakel\DatabaseBundle\Tests;

use Torakel\DatabaseBundle\Entity\Competition as Competition;
use Torakel\DatabaseBundle\Entity\Continent;
use Torakel\DatabaseBundle\Entity\Country as Country;
use Doctrine\Common\Collections\ArrayCollection;

class ContinentTest extends BaseTest
{

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Continent();
        $this->object2 = new Continent();
    }

    /**
     * Tests the specific getters and setters for the City entity.
     */
    public function testGetterAndSetter()
    {

        $name = 'name1';
        $this->object->setName($name);
        $this->assertEquals($name, $this->object->getName());

        $country1 = $this->getMockBuilder(Country::class)->getMock();
        $country2 = $this->getMockBuilder(Country::class)->getMock();
        $country3 = $this->getMockBuilder(Country::class)->getMock();
        $countries = new ArrayCollection();
        $countries[] = $country1;
        $countries[] = $country2;
        $this->object->addCountry($country1);
        $this->object->addCountry($country2);
        $this->object->addCountry($country3);
        $this->object->removeCountry($country3);
        $this->assertEquals($countries, $this->object->getCountries());

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
    }
}