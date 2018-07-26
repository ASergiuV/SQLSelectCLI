<?php
declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: sergiuabrudean
 * Date: 24.07.2018
 * Time: 13:37
 */


/**
 * @param array $columns
 * @param array $data
 *
 * @return array
 */
function select(array $columns, array $data) : array
{
    if (in_array('*', $columns)) {//if * was an input the user wants to see all the columns
        return $data;
    }
    if (!empty($data[0])) {//take only the columns the user didn't mention
        $columns = array_diff(array_keys($data[0]), $columns);
    }
    foreach ($columns as $column) {//parse columns
        foreach ($data as $key1 => $val) {//parse rows
            foreach ($val as $key => $value) {//parse columns in rows
                if ($key === $column) {
                    unset($data[$key1][$key]);//unset column for each row of data
                }
            }
        }
    }

    return $data;
}