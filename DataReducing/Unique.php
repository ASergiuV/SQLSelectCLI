<?php
declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: sergiuabrudean
 * Date: 24.07.2018
 * Time: 16:39
 */

/**
 * @param array $data
 * @param string $column
 *
 * @return array
 */
function unique(array $data, string $column) : array
{
    $data = array_values($data);
    $tmp  = [];
    foreach ($data as $v) {
        $id = $v[$column] . "|" . $v[$column];
        isset($tmp[$id]) or $tmp[$id] = $v;
    }

    return array_values($tmp);
}