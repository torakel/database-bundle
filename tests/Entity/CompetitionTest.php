<?php
namespace Torakel\DatabaseBundle\Tests\Entity;

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

        $this->checkAttribute('Name', 'name1');
        $this->checkOneToMany('Continent');
        $this->checkOneToMany('Country');
        $this->checkManyToOne('Event');
    }
}