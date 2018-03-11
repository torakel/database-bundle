<?php
namespace Torakel\DatabaseBundle\Tests\Entity;

use Torakel\DatabaseBundle\Entity\Competition as Competition;
use Torakel\DatabaseBundle\Entity\Continent;
use Torakel\DatabaseBundle\Entity\Country as Country;
use Doctrine\Common\Collections\ArrayCollection;

class ContinentTest extends BaseTest
{

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Continent();
        $this->object2 = new Continent();
    }

    /**
     * Tests the specific getters and setters for the City entity.
     */
    public function testGetterAndSetter()
    {

        $this->checkAttribute('Name', 'name1');
        $this->checkManyToOne('Country', 'Country', 'Countries');
        $this->checkManyToOne('Competition');

    }
}