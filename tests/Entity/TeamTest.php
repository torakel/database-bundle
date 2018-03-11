<?php
namespace Torakel\DatabaseBundle\Tests\Entity;

use Torakel\DatabaseBundle\Entity\City as City;
use Torakel\DatabaseBundle\Entity\Club as Club;
use Torakel\DatabaseBundle\Entity\Team as Team;

use Doctrine\Common\Collections\ArrayCollection;

class TeamTest extends BaseTest
{

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        /**
         * @var Club
         */
        $this->object = new Team();
        $this->object2 = new Team();
    }

    /**
     * Tests the specific getters and setters for the City entity.
     */
    public function testGetterAndSetter()
    {

        $this->checkAttribute('Name', 'name1');
        $this->checkAttribute('type', 'first');
        $this->checkAttribute('position', 3);
        $this->checkOneToMany('Club');
        $this->checkManyToOne('Game', 'HomeGame');
        $this->checkManyToOne('Game', 'AwayGame');
        $this->checkManyToOne('Goal');
        $this->checkManyToOne('GamePlayer');
        $this->checkManyToOne('GamePlayerStatistic');
        $this->checkManyToOne('GameTeamStatistic');
        $this->checkManyToOne('Substitution');
        $this->checkManyToOne('Card');
        $this->checkManyToOne('TablePosition');
    }
}