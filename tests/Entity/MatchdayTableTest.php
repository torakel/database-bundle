<?php
namespace Torakel\DatabaseBundle\Tests\Entity;

use Torakel\DatabaseBundle\Entity\Competition as Competition;
use Torakel\DatabaseBundle\Entity\Event as Event;
use Torakel\DatabaseBundle\Entity\Group;
use Torakel\DatabaseBundle\Entity\Matchday;
use Torakel\DatabaseBundle\Entity\MatchdayTable;
use Torakel\DatabaseBundle\Entity\Round as Round;
use Torakel\DatabaseBundle\Entity\Season as Season;
use Doctrine\Common\Collections\ArrayCollection;

class MatchdayTableTest extends BaseTest
{

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new MatchdayTable();
        $this->object2 = new MatchdayTable();
    }

    /**
     * Tests the general getters and setters
     */
    public function testGeneralGetterAndSetter()
    {

        $this->assertNull($this->object->getId());

        $this->checkAttribute('Slug', 'slug1');
        $date = new \DateTime();
        $this->object->setCreatedAt($date);
        $this->assertEquals($date, $this->object->getCreatedAt());
        $this->object->setUpdatedAt($date);
        $this->assertEquals($date, $this->object->getUpdatedAt());

        $city = $this->object2;
        $city->prePersist();
        $this->assertTrue(is_object($city->getCreatedAt()));
        $city->preUpdate();
        $this->assertTrue(is_object($city->getUpdatedAt()));
    }

    /**
     * Tests the specific getters and setters for the City entity.
     */
    public function testGetterAndSetter()
    {

        $this->checkOneToMany('Matchday');
        $this->checkManyToOne('TablePosition');
    }
}