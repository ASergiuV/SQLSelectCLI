<?php
declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: sergiuabrudean
 * Date: 24.07.2018
 * Time: 17:17
 */


/**
 * @param array $data
 * @param array $columnNames
 * @param array $columnSortDirs
 *
 * @return array
 */
function multiSortTabularData(array $data, array $columnNames, array $columnSortDirs)
{
    $multiSortParams = array();
    foreach ($columnNames as $i => $columnName) {
        $multiSortParams[] = array_column($data, $columnName);

        if (isset($columnSortDirs[$i]) && $columnSortDirs[$i] == 'desc') {
            $multiSortParams[] = SORT_DESC;
        } else {
            $multiSortParams[] = SORT_ASC;
        }
    }

    $multiSortParams[] = &$data;

    call_user_func_array('array_multisort', $multiSortParams);

    return $data;
}