<?php
namespace Torakel\DatabaseBundle\Repository;

use Doctrine\Common\Collections\ArrayCollection;
use Torakel\DatabaseBundle\Entity\Event;
use Torakel\DatabaseBundle\Entity\Game;
use Torakel\DatabaseBundle\Entity\Matchday;
use Torakel\DatabaseBundle\Entity\Team;
use Doctrine\ORM\EntityRepository;

/**
 * Class GameRepository
 *
 * @package Torakel\DatabaseBundle\Repository
 */
class GameRepository extends EntityRepository
{

    /**
     * createOrLoadGame
     *
     * Returns the Game entity for the given Matchday and Team entities.
     *
     * @param Matchday $matchday
     * @param Team $teamHome
     * @param Team $teamAway
     * @return Game
     */
    public function createOrLoadGame(Matchday $matchday, Team $teamHome, Team $teamAway): Game
    {
        $game = null;
        // check if all entities were persisted before
        if ($matchday->getId() > 0 && $teamHome->getId() > 0 && $teamAway->getId() > 0) {
            $game = $this->findGameByMatchdayAndTeams($matchday, $teamHome, $teamAway);
        }
        if (!$game) {
            $game = new Game();
            $game->setMatchday($matchday);
            $game->setTeamHome($teamHome);
            $game->setTeamAway($teamAway);
            $slug = $game->getMatchday()->getSlug(). '-' . $teamHome->getSlug() . '-' . $teamAway->getSlug();
            $game->setSlug($slug);
        } else {
            $game = array_shift($game);
        }

        return $game;
    }

    /**
     * findPreviousGamesByTeamsAndEvent
     *
     * Returns all the previous games between the two given Team entities in the given Event.
     *
     * @param Team $team
     * @param Team $opponentTeam
     * @param Event $event
     * @return ArrayCollection
     */
    public function findPreviousGamesByTeamsAndEvent(Team $team, Team $opponentTeam, Event $event): ArrayCollection
    {
        $previousGames = $this->getEntityManager()
            ->createQuery(
                'SELECT g FROM AbenilFootballDbBundle:Game g
                  JOIN AbenilFootballDbBundle:Matchday m WITH g.matchday = m
                  JOIN AbenilFootballDbBundle:Round r WITH m.round = r
                  WHERE
                    (g.teamHome = :team AND g.teamAway = :opponentTeam)
                    OR (g.teamAway = :team AND g.teamHome = :opponentTeam)
                  AND r.event = :event'
            )
            ->setParameter('team', $team)
            ->setParameter('opponentTeam', $opponentTeam)
            ->setParameter('event', $event)
            ->getResult();

        return $previousGames;
    }

    /**
     * findGameByMatchdayAndTeams
     *
     * Returns the Game entity for the given Matchday and Team entities if it exists.
     *
     * @param Matchday $matchday
     * @param Team $team
     * @param Team $opponentTeam
     * @return ArrayCollection
     */
    public function findGameByMatchdayAndTeams(Matchday $matchday, Team $team, Team $opponentTeam): ArrayCollection
    {
        $game = $this->getEntityManager()
            ->createQuery(
                'SELECT g
              FROM TorakelDatabaseBundle:Game g
              WHERE g.matchday = :matchday AND g.teamHome = :teamHome AND g.teamAway = :teamAway'
            )
            ->setParameter('matchday', $matchday)
            ->setParameter('teamHome', $team)
            ->setParameter('teamAway', $opponentTeam)
            ->getResult();

        return $game;

    }
}