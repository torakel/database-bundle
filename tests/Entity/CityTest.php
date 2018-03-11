<?php
namespace Torakel\DatabaseBundle\Tests\Entity;

use Torakel\DatabaseBundle\Entity\City as City;
use Torakel\DatabaseBundle\Entity\Club as Club;
use Torakel\DatabaseBundle\Entity\Country as Country;
use Torakel\DatabaseBundle\Entity\Ground as Ground;
use Torakel\DatabaseBundle\Entity\Referee as Referee;
use Doctrine\Common\Collections\ArrayCollection;

class CityTest extends BaseTest
{

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new City();
        $this->object2 = new City();
    }

    /**
     * Tests the specific getters and setters for the City entity.
     */
    public function testGetterAndSetter()
    {

        $this->checkAttribute('Name', 'name1');
        $this->checkOneToMany('Country');
        $this->checkManyToOne('Club');
        $this->checkManyToOne('Ground');
        $this->checkManyToOne('Referee');

    }
}