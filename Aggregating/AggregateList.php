<?php
declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: sergiuabrudean
 * Date: 24.07.2018
 * Time: 18:15
 */

/**
 * @param array $data
 * @param string $column
 *
 * @param string $glue
 *
 * @return array
 */
function aggregateList(array $data, string $column, string $glue) : array
{
    $data[0]['concat'] = rtrim(array_reduce(array_column($data, $column), function ($accumulator, $value) use ($glue) {
        return $accumulator . $value . $glue;
    }, ''), $glue);
    array_splice($data, 1);

    return $data;
}