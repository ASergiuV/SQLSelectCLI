<?php
declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: sergiuabrudean
 * Date: 24.07.2018
 * Time: 16:43
 */

/**
 * @param array $data
 * @param string $columnToMap
 * @param string $function
 *
 * @return array
 */
function functionMapping(array $data, string $columnToMap, string $function) : array
{
    require "$function.php";

    return array_map(function (array $row) use ($columnToMap, $function) : array {
        $row[$columnToMap] = $function($row[$columnToMap]);

        return $row;
    }, $data);
}