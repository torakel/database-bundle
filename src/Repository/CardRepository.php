<?php
namespace Torakel\DatabaseBundle\Repository;

use Torakel\DatabaseBundleBundle\Entity\Game;
use Torakel\DatabaseBundleBundle\Entity\Team;
use Doctrine\ORM\EntityRepository;

/**
 * Class CardRepository
 * @package Torakel\DatabaseBundleBundle\Repository
 */
class CardRepository extends EntityRepository
{

    /**
     * findCardByGameAndTeam
     *
     *
     *
     * @param Game $game
     * @param Team $team
     * @return mixed
     */
    public function findCardByGameAndTeam(Game $game, Team $team)
    {
        $cards = $this->getEntityManager()
            ->createQuery(
                'SELECT c FROM TorakelDatabaseBundle:Card c WHERE c.game = :game AND c.team = :team'
            )->setParameter('game', $game)->setParameter('team', $team)
            ->getResult();
        return $cards;
    }
}