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

        $this->checkAttribute('Name', 'name1');
        $this->checkOneToMany('Continent');
        $this->checkManyToOne('Competition');
        $this->checkManyToOne('Referee');
        $this->checkManyToOne('Coach', 'Coach', 'Coaches');
        $this->checkManyToOne('City', 'City', 'Cities');

    }
}