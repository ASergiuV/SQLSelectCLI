<?php
declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: sergiuabrudean
 * Date: 24.07.2018
 * Time: 13:43
 */


/**
 * @param array $data
 * @param string $direction
 *
 * @return array
 */
function sortColumns(array $data, string $direction) : array
{
    if ($direction === DIRECTION_ASC) {
        foreach ($data as $key => $dataRow) {
            ksort($dataRow);
            $data[$key] = $dataRow;
        }
    } else {
        foreach ($data as $key => $dataRow) {
            krsort($dataRow);
            $data[$key] = $dataRow;
        }
    }

    return $data;
}