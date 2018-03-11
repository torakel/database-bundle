<?php
namespace Torakel\DatabaseBundle\Tests\Entity;

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

        $this->checkAttribute('Name', 'name1');
        $this->checkOneToMany('Competition');
        $this->checkOneToMany('Season');
        $this->checkManyToOne('Round');
    }
}