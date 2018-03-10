<?php
namespace Torakel\DatabaseBundle\Tests;

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

        $name = 'name1';
        $this->object->setName($name);
        $this->assertEquals($name, $this->object->getName());

        $since = 2001;
        $this->object->setSince($since);
        $this->assertEquals($since, $this->object->getSince());

        $capacity = 30101;
        $this->object->setCapacity($capacity);
        $this->assertEquals($capacity, $this->object->getCapacity());

        $address = 'Somewhere over the rainbow';
        $this->object->setAddress($address);
        $this->assertEquals($address, $this->object->getAddress());

        $cityMock = $this->getMockBuilder(City::class)->getMock();
        $this->object->setCity($cityMock);
        $this->assertEquals($cityMock, $this->object->getCity());

        $game1 = $this->getMockBuilder(Game::class)->getMock();
        $game2 = $this->getMockBuilder(Game::class)->getMock();
        $game3 = $this->getMockBuilder(Game::class)->getMock();
        $games = new ArrayCollection();
        $games[] = $game1;
        $games[] = $game2;
        $this->object->addGame($game1);
        $this->object->addGame($game2);
        $this->object->addGame($game3);
        $this->object->removeGame($game3);
        $this->assertEquals($games, $this->object->getGames());
    }

}