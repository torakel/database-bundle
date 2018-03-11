<?php
namespace Torakel\DatabaseBundle\Tests\Entity;

use Torakel\DatabaseBundle\Entity\City;
use Torakel\DatabaseBundle\Entity\Game as Game;
use Torakel\DatabaseBundle\Entity\Ground;
use Doctrine\Common\Collections\ArrayCollection;

class GroundTest extends BaseTest
{

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Ground();
        $this->object2 = new Ground();
    }

    /**
     * Tests the specific getters and setters for the City entity.
     */
    public function testGetterAndSetter()
    {

        $this->checkAttribute('Name', 'name1');
        $this->checkAttribute('Since', 2001);
        $this->checkAttribute('Capacity', 30101);
        $this->checkAttribute('Address', 'Somewhere over the rainbow');
        $this->checkOneToMany('City');
        $this->checkManyToOne('Game');
    }

}