<?php
declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: sergiuabrudean
 * Date: 24.07.2018
 * Time: 17:37
 */


/**
 * @param array $data
 * @param string $column
 *
 * @return array
 */
function upperCaseColumn(array $data, string $column) : array
{
    return array_map(function (array $row) use ($column) : array {
        $row[$column] = strtoupper($row[$column]);

        return $row;
    }, $data);
}

/**
 * @param array $data
 * @param string $column
 *
 * @return array
 */
function lowerCaseColumn(array $data, string $column) : array
{
    return array_map(function (array $row) use ($column) : array {
        $row[$column] = strtolower($row[$column]);

        return $row;
    }, $data);
}

/**
 * @param array $data
 * @param string $column
 *
 * @return array
 */
function titleCaseColumn(array $data, string $column) : array
{
    return array_map(function (array $row) use ($column) : array {
        $row[$column] = ucwords($row[$column]);

        return $row;
    }, $data);
}

/**
 * Raise each column to the given power
 *
 * @param array $data
 * @param array $option
 *
 * @return array
 */
function powerValuesColumn(array $data, array $option) : array
{
    return array_map(function (array $row) use ($option) : array {
        $row[$option['coloana']] = pow($row[$option['coloana']], $option['puterea']);

        return $row;
    }, $data);
}