<?php
namespace Torakel\DatabaseBundle\Tests;

use Torakel\DatabaseBundle\Entity\Card as Card;
use Torakel\DatabaseBundle\Entity\Coach as Coach;
use Torakel\DatabaseBundle\Entity\Game as Game;
use Torakel\DatabaseBundle\Entity\GamePlayer as GamePlayer;
use Torakel\DatabaseBundle\Entity\GamePlayerStatistic as GamePlayerStatistic;
use Torakel\DatabaseBundle\Entity\GameTeamStatistic as GameTeamStatistic;
use Torakel\DatabaseBundle\Entity\Goal as Goal;
use Torakel\DatabaseBundle\Entity\Ground as Ground;
use Torakel\DatabaseBundle\Entity\Matchday as Matchday;
use Torakel\DatabaseBundle\Entity\Substitution as Substitution;
use Torakel\DatabaseBundle\Entity\Team as Team;
use Doctrine\Common\Collections\ArrayCollection;

class GameTest extends BaseTest
{

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Game();
        $this->object2 = new Game();
    }

    /**
     * Tests the general getters and setters
     */
    public function testGeneralGetterAndSetter()
    {

        $this->assertNull($this->object->getId());

        $slug = 'slug1';
        $this->object->setSlug($slug);
        $this->assertEquals($slug, $this->object->getSlug());

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

        $startTime = new \DateTime();
        $this->object->setStartTime($startTime);
        $this->assertEquals($startTime, $this->object->getStartTime());

        $matchdayMock = $this->getMockBuilder(Matchday::class)->getMock();
        $this->object->setMatchday($matchdayMock);
        $this->assertEquals($matchdayMock, $this->object->getMatchday());

        $groundMock = $this->getMockBuilder(Ground::class)->getMock();
        $this->object->setGround($groundMock);
        $this->assertEquals($groundMock, $this->object->getGround());

        $coachHomeMock = $this->getMockBuilder(Coach::class)->getMock();
        $this->object->setCoachHome($coachHomeMock);
        $this->assertEquals($coachHomeMock, $this->object->getCoachHome());

        $coachAwayMock = $this->getMockBuilder(Coach::class)->getMock();
        $this->object->setCoachAway($coachAwayMock);
        $this->assertEquals($coachAwayMock, $this->object->getCoachAway());

        $teamHomeMock = $this->getMockBuilder(Team::class)->getMock();
        $this->object->setTeamHome($teamHomeMock);
        $this->assertEquals($teamHomeMock, $this->object->getTeamHome());

        $teamAwayMock = $this->getMockBuilder(Team::class)->getMock();
        $this->object->setTeamAway($teamAwayMock);
        $this->assertEquals($teamAwayMock, $this->object->getTeamAway());

        $scoreHomeHalftime = 1;
        $this->object->setScoreHomeHalftime($scoreHomeHalftime);
        $this->assertEquals($scoreHomeHalftime, $this->object->getScoreHomeHalftime());

        $scoreHomeFulltime = 2;
        $this->object->setScoreHomeFulltime($scoreHomeFulltime);
        $this->assertEquals($scoreHomeFulltime, $this->object->getScoreHomeFulltime());

        $scoreHomeExtratime = 3;
        $this->object->setScoreHomeExtratime($scoreHomeExtratime);
        $this->assertEquals($scoreHomeExtratime, $this->object->getScoreHomeExtratime());

        $scoreHomePenalties = 8;
        $this->object->setScoreHomePenalties($scoreHomePenalties);
        $this->assertEquals($scoreHomePenalties, $this->object->getScoreHomePenalties());

        $scoreAwayHalftime = 4;
        $this->object->setScoreAwayHalftime($scoreAwayHalftime);
        $this->assertEquals($scoreAwayHalftime, $this->object->getScoreAwayHalftime());

        $scoreAwayFulltime = 5;
        $this->object->setScoreAwayFulltime($scoreAwayFulltime);
        $this->assertEquals($scoreAwayFulltime, $this->object->getScoreAwayFulltime());

        $scoreAwayExtratime = 6;
        $this->object->setScoreAwayExtratime($scoreAwayExtratime);
        $this->assertEquals($scoreAwayExtratime, $this->object->getScoreAwayExtratime());

        $scoreAwayPenalties = 7;
        $this->object->setScoreAwayPenalties($scoreAwayPenalties);
        $this->assertEquals($scoreAwayPenalties, $this->object->getScoreAwayPenalties());

        $audience = 9000;
        $this->object->setAudience($audience);
        $this->assertEquals($audience, $this->object->getAudience());

        $resultCalculated = true;
        $this->object->setResultCalculated($resultCalculated);
        $this->assertEquals($resultCalculated, $this->object->getResultCalculated());

        $gamePlayer1 = $this->getMockBuilder(GamePlayer::class)->getMock();
        $gamePlayer2 = $this->getMockBuilder(GamePlayer::class)->getMock();
        $gamePlayer3 = $this->getMockBuilder(GamePlayer::class)->getMock();
        $gamePlayers = new ArrayCollection();
        $gamePlayers[] = $gamePlayer1;
        $gamePlayers[] = $gamePlayer2;
        $this->object->addGamePlayer($gamePlayer1);
        $this->object->addGamePlayer($gamePlayer2);
        $this->object->addGamePlayer($gamePlayer3);
        $this->object->removeGamePlayer($gamePlayer3);
        $this->assertEquals($gamePlayers, $this->object->getGamePlayers());

        $gamePlayerStatistic1 = $this->getMockBuilder(GamePlayerStatistic::class)->getMock();
        $gamePlayerStatistic2 = $this->getMockBuilder(GamePlayerStatistic::class)->getMock();
        $gamePlayerStatistic3 = $this->getMockBuilder(GamePlayerStatistic::class)->getMock();
        $gamePlayerStatistics = new ArrayCollection();
        $gamePlayerStatistics[] = $gamePlayerStatistic1;
        $gamePlayerStatistics[] = $gamePlayerStatistic2;
        $this->object->addGamePlayerStatistic($gamePlayerStatistic1);
        $this->object->addGamePlayerStatistic($gamePlayerStatistic2);
        $this->object->addGamePlayerStatistic($gamePlayerStatistic3);
        $this->object->removeGamePlayerStatistic($gamePlayerStatistic3);
        $this->assertEquals($gamePlayerStatistics, $this->object->getGamePlayerStatistics());

        $gameTeamStatistic1 = $this->getMockBuilder(GameTeamStatistic::class)->getMock();
        $gameTeamStatistic2 = $this->getMockBuilder(GameTeamStatistic::class)->getMock();
        $gameTeamStatistic3 = $this->getMockBuilder(GameTeamStatistic::class)->getMock();
        $gameTeamStatistics = new ArrayCollection();
        $gameTeamStatistics[] = $gameTeamStatistic1;
        $gameTeamStatistics[] = $gameTeamStatistic2;
        $this->object->addGameTeamStatistic($gameTeamStatistic1);
        $this->object->addGameTeamStatistic($gameTeamStatistic2);
        $this->object->addGameTeamStatistic($gameTeamStatistic3);
        $this->object->removeGameTeamStatistic($gameTeamStatistic3);
        $this->assertEquals($gameTeamStatistics, $this->object->getGameTeamStatistics());

        $goal1 = $this->getMockBuilder(Goal::class)->getMock();
        $goal2 = $this->getMockBuilder(Goal::class)->getMock();
        $goal3 = $this->getMockBuilder(Goal::class)->getMock();
        $goals = new ArrayCollection();
        $goals[] = $goal1;
        $goals[] = $goal2;
        $this->object->addGoal($goal1);
        $this->object->addGoal($goal2);
        $this->object->addGoal($goal3);
        $this->object->removeGoal($goal3);
        $this->assertEquals($goals, $this->object->getGoals());

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

        $substitution1 = $this->getMockBuilder(Substitution::class)->getMock();
        $substitution2 = $this->getMockBuilder(Substitution::class)->getMock();
        $substitution3 = $this->getMockBuilder(Substitution::class)->getMock();
        $substitutions = new ArrayCollection();
        $substitutions[] = $substitution1;
        $substitutions[] = $substitution2;
        $this->object->addSubstitution($substitution1);
        $this->object->addSubstitution($substitution2);
        $this->object->addSubstitution($substitution3);
        $this->object->removeSubstitution($substitution3);
        $this->assertEquals($substitutions, $this->object->getSubstitutions());

    }
}