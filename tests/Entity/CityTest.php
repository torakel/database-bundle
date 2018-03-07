<?php
namespace Torakel\DatabaseBundle\Tests;

use Torakel\DatabaseBundle\Entity\City as City;
use Torakel\DatabaseBundle\Entity\Country as Country;
use Torakel\DatabaseBundle\Entity\Ground as Ground;
use Torakel\DatabaseBundle\Entity\Referee as Referee;
use PHPUnit\Framework\TestCase;
use Doctrine\Common\Collections\ArrayCollection;

class CityTest extends TestCase {

    /**
     * @var City
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new City();
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

        $city = new City();
        $city->prePersist();
        $this->assertTrue(is_object($city->getCreatedAt()));
        $this->assertTrue(array_key_exists(999999, $city->getAltNames()));
        $city->preUpdate();
        $this->assertTrue(is_object($city->getUpdatedAt()));
    }

    /**
     * Tests the specific getters and setters for the City entity.
     */
    public function testGetterAndSetter()
    {

        $slug = 'slug1';
        $this->object->setSlug($slug);
        $this->assertEquals($slug, $this->object->getSlug());

        $name = 'name1';
        $this->object->setName($name);
        $this->assertEquals($name, $this->object->getName());

        $altNames = array(
            'altname1',
            'altname2'
        );
        $this->object->setAltNames($altNames);
        $this->assertEquals($altNames, $this->object->getAltNames());
        $additionalAltName = 'altname3';
        $altNames[] = $additionalAltName;
        $this->object->addAltName($additionalAltName);
        $this->assertEquals($altNames, $this->object->getAltNames());

        $countryMock = $this->getMockBuilder(Country::class)->getMock();
        $this->object->setCountry($countryMock);
        $this->assertEquals($countryMock, $this->object->getCountry());

        $club1 = $this->getMockBuilder(Club::class)->getMock();
        $club2 = $this->getMockBuilder(Club::class)->getMock();
        $club3 = $this->getMockBuilder(Club::class)->getMock();
        $clubs = new ArrayCollection();
        $clubs[] = $club1;
        $clubs[] = $club2;
        $this->object->addClub($club1);
        $this->object->addClub($club2);
        $this->object->addClub($club3);
        $this->object->removeClub($club3);
        $this->assertEquals($clubs, $this->object->getClubs());

        $ground1 = $this->getMockBuilder(Ground::class)->getMock();
        $ground2 = $this->getMockBuilder(Ground::class)->getMock();
        $ground3 = $this->getMockBuilder(Ground::class)->getMock();
        $grounds = new ArrayCollection();
        $grounds[] = $ground1;
        $grounds[] = $ground2;
        $this->object->addGround($ground1);
        $this->object->addGround($ground2);
        $this->object->addGround($ground3);
        $this->object->removeGround($ground3);
        $this->assertEquals($grounds, $this->object->getGrounds());

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
    }
}