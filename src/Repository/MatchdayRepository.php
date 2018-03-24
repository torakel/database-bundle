<?php
namespace Torakel\DatabaseBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Torakel\DatabaseBundle\Entity\Matchday;

/**
 * Class MatchdayRepository
 *
 * This class handles all the database queries for the Matchday entity.
 *
 * @package Torakel\DatabaseBundle\Repository
 */
class MatchdayRepository extends EntityRepository
{

    /**
     * findPreviousMatchdaySameRound
     *
     * Returns the previous matchday in the same round of a given matchday.
     *
     * @param Matchday $matchday
     * @return Matchday
     */
    public function findPreviousMatchdaySameRound(Matchday $matchday)
    {
        $currentPosition = $matchday->getPosition();
        $round = $matchday->getRound();
        $previousPosition = $currentPosition - 1;
        if ($currentPosition == 0) {

            return null;
        }
        $previousMatchday = $this->getEntityManager()
            ->createQuery(
                'SELECT m FROM TorakelDatabaseBundle:Matchday m  WHERE m.position = :position AND m.round = :round'
            )->setParameter('position', $previousPosition)->setParameter('round', $round)
            ->getResult();
        if (!$previousMatchday) {
            return null;
        }

        return array_shift($previousMatchday);
    }

    /**
     * findNextMatchdaySameRound
     *
     * Returns the next matchday in the same round of a given matchday.
     *
     * @param Matchday $matchday
     * @return Matchday
     */
    public function findNextMatchdaySameRound(Matchday $matchday)
    {
        $currentPosition = $matchday->getPosition();
        $round = $matchday->getRound();
        $nextPosition = $currentPosition + 1;
        $nextMatchday = $this->getEntityManager()
            ->createQuery(
                'SELECT m FROM TorakelDatabaseBundle:Matchday m  WHERE m.position = :position AND m.round = :round'
            )->setParameter('position', $nextPosition)->setParameter('round', $round)
            ->getResult();
        if (!$nextMatchday) {
            return null;
        }

        return array_shift($nextMatchday);
    }

    /**
     * findAllMatchdaysOfRoundByMatchday
     *
     * Returns all matchdays of a round for a given matchday.
     *
     * @param Matchday $matchday
     * @return Matchday
     */
    public function findAllMatchdaysOfRoundByMatchday(Matchday $matchday)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT m FROM TorakelDatabaseBundle:Matchday m JOIN TorakelDatabaseBundle:Round r WITH m.round = r WHERE r.event = :event ORDER BY m.position ASC'
            )->setParameter('event', $matchday->getRound()->getEvent())
            ->getResult();
    }
}