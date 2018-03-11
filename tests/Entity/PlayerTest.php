<?php
namespace Torakel\DatabaseBundle\Tests;

use Torakel\DatabaseBundle\Entity\Card as Card;
use Torakel\DatabaseBundle\Entity\Coach as Coach;
use Torakel\DatabaseBundle\Entity\Country as Country;
use Torakel\DatabaseBundle\Entity\Game as Game;
use Doctrine\Common\Collections\ArrayCollection;
use Torakel\DatabaseBundle\Entity\Player;

class PlayerTest extends BaseTest
{

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Player();
        $this->object2 = new Player();
    }

    /**
     * Tests the specific getters and setters for the City entity.
     */
    public function testGetterAndSetter()
    {

        $firstname = 'firstname';
        $lastname = 'lastname';
        $this->checkAttribute('Firstname', $firstname);
        $this->checkAttribute('Lastname', $lastname);
        $this->checkAttribute('Nickname', 'Hansele');

        $fullname = $firstname . ' ' . $lastname;
        $this->assertEquals($fullname, $this->object->getFullname());

        $this->object->setFirstname(null);
        $this->assertEquals($lastname, $this->object->getFullname());

        $this->checkOneToMany('Country', 'Nationality');
        $this->checkManyToOne('Goal');
        $this->checkManyToOne('Goal', 'Assist', 'Assists');
        $this->checkManyToOne('Card');
        $this->checkManyToOne('GamePlayer');
        $this->checkManyToOne('GamePlayerStatistic');
        $this->checkManyToOne('Substitution', 'IntoSubstitution');
        $this->checkManyToOne('Substitution', 'OutSubstitution');
    }
}