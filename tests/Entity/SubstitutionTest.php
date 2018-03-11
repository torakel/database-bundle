<?php
namespace Torakel\DatabaseBundle\Tests\Entity;

use Torakel\DatabaseBundle\Entity\Game as Game;
use Torakel\DatabaseBundle\Entity\Goal as Goal;
use Torakel\DatabaseBundle\Entity\Player as Player;
use Torakel\DatabaseBundle\Entity\Substitution;
use Torakel\DatabaseBundle\Entity\Team as Team;
use Doctrine\Common\Collections\ArrayCollection;

class SubstitutionTest extends BaseTest
{

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Substitution();
        $this->object2 = new Substitution();
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

        $this->checkAttribute('Minute', 32);
        $this->checkAttribute('Number', 33);
        $this->checkAttribute('Position', 'red');
        $this->checkAttribute('Period', 1);
        $this->checkAttribute('Notice', 'bla bla');
        $this->checkOneToMany('Player', 'IntoPlayer');
        $this->checkOneToMany('Team');
        $this->checkOneToMany('Player', 'OutPlayer');
        $this->checkOneToMany('Game');

    }
}