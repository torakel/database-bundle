<?php
namespace Torakel\DatabaseBundle\Constants;

/**
 * Class DatabaseConstants
 *
 * The purpose of this class is to minimize the usage of string declarations in your code.
 * Whenever you want to use a string more than once, define a constant for it.
 *
 * @package Torakel\DatabaseBundle\Constants
 */
class DatabaseConstants
{

    const TABLE_SORTING_CRITERIA_POINTS = 'points';

    const TABLE_SORTING_CRITERIA_GOAL_DIFFERENCE = 'goal-difference';

    const TABLE_SORTING_CRITERIA_GOALS = 'goals';

    const TABLE_SORTING_CRITERIA_COMPARED_MATCHES_BY_GOALS = 'compared-matches-goals';

    const TABLE_SORTING_CRITERIA_COMPARED_MATCHES_BY_GOALS_AWAY = 'compared-matches-goals-away';

    const TABLE_SORTING_CRITERIA_GOALS_AWAY = 'goals-away';

    const TABLE_SORTING_CRITERIA_GAME = 'game';

    /**
     * the internal string for a red card
     * @var string
     */
    const CARD_TYPE_RED = 'red';

    /**
     * the internal string for a yellow card
     * @var string
     */
    const CARD_TYPE_YELLOW = 'yellow';

    /**
     * the internal string for a yellow red card
     * @var string
     */
    const CARD_TYPE_YELLOW_RED = 'yellowred';

}