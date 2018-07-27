<?php
declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: sergiuabrudean
 * Date: 24.07.2018
 * Time: 18:09
 */

/**
 * @param array $data
 *
 * @param string $column
 *
 * @return array
 */
function aggregateSum(array $data, string $column) : array
{
    $data[0]['sum'] = array_reduce(array_column($data, $column), function ($accumulator, $value) {
        return $accumulator + $value;
    }, 0);
    array_splice($data, 1);

    return $data;
}

/**
 * @param array $data
 *
 * @param string $column
 *
 * @return array
 */
function aggregateProd(array $data, string $column) : array
{
    $data[0]['prod'] = array_reduce(array_column($data, $column), function ($accumulator, $value) {
        return $accumulator * $value;
    }, 1);
    array_splice($data, 1);

    return $data;
}