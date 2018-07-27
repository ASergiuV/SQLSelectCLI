<?php
declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: sergiuabrudean
 * Date: 26.07.2018
 * Time: 14:09
 */


/**
 * @param array $data
 * @param array $whereOptions
 *
 * @return array
 */
function where(array $data, array $whereOptions) : array
{
    if (count($whereOptions) !== 3) {
        return $data;
    }

    $columnData = array_column($data, $whereOptions['coloana']);

    if ($whereOptions['semn'] === '<>') {
        foreach ($columnData as $key => $value) {
            if (strcmp($value, $whereOptions['valoare']) === 0) {
                unset($data[$key]);
            }

        }
    }
    if ($whereOptions['semn'] === '=') {
        foreach ($columnData as $key => $value) {
            if (strcmp($value, $whereOptions['valoare']) !== 0) {
                unset($data[$key]);
            }

        }
    }
    if ($whereOptions['semn'] === '>') {
        foreach ($columnData as $key => $value) {
            if (strcmp($value, $whereOptions['valoare']) < 0) {
                unset($data[$key]);
            }

        }
    }
    if ($whereOptions['semn'] === '<') {
        foreach ($columnData as $key => $value) {
            if (strcmp($value, $whereOptions['valoare']) > 0) {
                unset($data[$key]);
            }

        }
    }

    return array_values($data);
}