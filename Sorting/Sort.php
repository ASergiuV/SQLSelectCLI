<?php
declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: sergiuabrudean
 * Date: 24.07.2018
 * Time: 17:46
 */


/**
 * @param array $data
 * @param string $column
 * @param string $mode
 * @param string $direction
 *
 * @return array
 */
function sortCol(array $data, string $column, string $mode, string $direction) : array
{
    if ($mode === 'natural') {
        $mode = SORT_NATURAL;
    } elseif ($mode === 'numeric') {
        $mode = SORT_NUMERIC;
    } else {
        $mode = SORT_STRING;
    }

    if ($direction === 'asc') {
        $direction = SORT_ASC;
    } else {
        $direction = SORT_DESC;
    }
    $column = array_column($data, $column);
    array_multisort($column, $mode, $direction, $data);

    return $data;

}