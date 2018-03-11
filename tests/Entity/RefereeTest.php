<?php
namespace Torakel\DatabaseBundle\Tests;

use Torakel\DatabaseBundle\Entity\Card as Card;
use Torakel\DatabaseBundle\Entity\Coach as Coach;
use Torakel\DatabaseBundle\Entity\Country as Country;
use Torakel\DatabaseBundle\Entity\Game as Game;
use Doctrine\Common\Collections\ArrayCollection;
use Torakel\DatabaseBundle\Entity\Referee;

class RefereeTest extends BaseTest
{

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Referee();
        $this->object2 = new Referee();
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
        $title = 'Dr.';
        $this->checkAttribute('Title', $title);
        $fullname = $title . ' ' . $firstname . ' ' . $lastname;
        $this->assertEquals($fullname, $this->object->getFullname());
        $this->object->setFirstname(null);
        $this->assertEquals($lastname, $this->object->getFullname());

        $this->checkOneToMany('Country', 'Nationality');
        $this->checkOneToMany('City');
        $this->checkManyToOne('Game');
    }
}