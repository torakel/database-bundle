<?php
namespace Torakel\DatabaseBundle\Tests\Entity;

use Torakel\DatabaseBundle\Entity\City as City;
use Torakel\DatabaseBundle\Entity\Club as Club;
use Torakel\DatabaseBundle\Entity\Team as Team;

use Doctrine\Common\Collections\ArrayCollection;

class ClubTest extends BaseTest
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
        $this->object = new Club();
        $this->object2 = new Club();
    }

    /**
     * Tests the specific getters and setters for the City entity.
     */
    public function testGetterAndSetter()
    {

        $this->checkAttribute('Name', 'name1');
        $this->checkAttribute('InternationalName', 'intName');
        $this->checkAttribute('ShortName', 'SN');
        $this->checkOneToMany('City');
        $this->checkManyToOne('Team');

    }
}