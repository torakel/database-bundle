<?php
namespace Torakel\DatabaseBundle\Tests;

use Torakel\DatabaseBundle\Entity\Coach as Coach;
use Torakel\DatabaseBundle\Entity\Country as Country;
use Torakel\DatabaseBundle\Entity\Game as Game;
use Doctrine\Common\Collections\ArrayCollection;

class CoachTest extends BaseTest
{

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Coach();
        $this->object2 = new Coach();
    }

    /**
     * Tests the specific getters and setters for the City entity.
     */
    public function testGetterAndSetter()
    {
        $firstname = 'firstname';
        $this->object->setFirstname($firstname);
        $this->assertEquals($firstname, $this->object->getFirstname());
        $lastname = 'lastname';
        $this->object->setLastname($lastname);
        $this->assertEquals($lastname, $this->object->getLastname());

        $nickname = 'nickname';
        $this->object->setNickname($nickname);
        $this->assertEquals($nickname, $this->object->getNickname());

        $countryMock = $this->getMockBuilder(Country::class)->getMock();
        $this->object->setNationality($countryMock);
        $this->assertEquals($countryMock, $this->object->getNationality());

        $card1 = $this->getMockBuilder(Card::class)->getMock();
        $card2 = $this->getMockBuilder(Card::class)->getMock();
        $card3 = $this->getMockBuilder(Card::class)->getMock();
        $cards = new ArrayCollection();
        $cards[] = $card1;
        $cards[] = $card2;
        $this->object->addCard($card1);
        $this->object->addCard($card2);
        $this->object->addCard($card3);
        $this->object->removeCard($card3);
        $this->assertEquals($cards, $this->object->getCards());

        $homeGame1 = $this->getMockBuilder(Game::class)->getMock();
        $homeGame2 = $this->getMockBuilder(Game::class)->getMock();
        $homeGame3 = $this->getMockBuilder(Game::class)->getMock();
        $homeGames = new ArrayCollection();
        $homeGames[] = $homeGame1;
        $homeGames[] = $homeGame2;
        $this->object->addHomeGame($homeGame1);
        $this->object->addHomeGame($homeGame2);
        $this->object->addHomeGame($homeGame3);
        $this->object->removeHomeGame($homeGame3);
        $this->assertEquals($homeGames, $this->object->getHomeGames());

        $awayGame1 = $this->getMockBuilder(Game::class)->getMock();
        $awayGame2 = $this->getMockBuilder(Game::class)->getMock();
        $awayGame3 = $this->getMockBuilder(Game::class)->getMock();
        $awayGames = new ArrayCollection();
        $awayGames[] = $awayGame1;
        $awayGames[] = $awayGame2;
        $this->object->addAwayGame($awayGame1);
        $this->object->addAwayGame($awayGame2);
        $this->object->addAwayGame($awayGame3);
        $this->object->removeAwayGame($awayGame3);
        $this->assertEquals($awayGames, $this->object->getAwayGames());
    }
}