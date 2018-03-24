<?php
namespace Torakel\DatabaseBundle\Tests\Repository;

class MatchdayRepositoryTest extends RepositoryTest
{
    public function testFindPreviousMatchdaySameRound()
    {
        $matchdayRepository = $this->container->get('torakel.matchday_repository');
    }
}