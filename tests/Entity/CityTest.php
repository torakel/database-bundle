<?php
namespace Torakel\DatabaseBundle\Tests;

use Torakel\DatabaseBundle\Entity\City as City;

class CityTest extends \PHPUnit_Framework_TestCase {

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

    public function testGetterAndSetter() {

        $this->assertNull($this->object->getId());

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

        $countryMock = $this->getMockBuilder(City::class)->getMock();
        $this->object->setCountry($countryMock);
        $this->assertEquals($countryMock, $this->object->getCountry());

        $date = new \DateTime();

        $this->object->setCreatedAt($date);
        $this->assertEquals($date, $this->object->getCreatedAt());

        $this->object->setUpdatedAt($date);
        $this->assertEquals($date, $this->object->getUpdatedAt());
    }
}