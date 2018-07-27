<?php
declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: sergiuabrudean
 * Date: 26.07.2018
 * Time: 11:33
 */

define("OPTIONS_USING_COLUMNS_VALIDATION", [
    "multi-sort" => "validateColumnsGivenForOptions",
    "map-function-column" => "validateColumnsGivenForOptions",
    "select" => "validateSelect",
    "where" => "validateWhere",
    "power-values" => "validatePowerValue",
    "unique" => "validateColumnsGivenForOptions",
    "aggregate-sum" => "validateColumnsGivenForOptions",
    "aggregate-product" => "validateColumnsGivenForOptions",
    "aggregate-list" => "validateColumnsGivenForOptions",
    "sort-column" => "validateColumnsGivenForOptions",
    "uppercase-column" => "validateColumnsGivenForOptions",
    "lowercase-column" => "validateColumnsGivenForOptions",
    "titlecase-column" => "validateColumnsGivenForOptions"
]);

function validateTable(array $data) : array
{
    if ($data === []) {
        return [["The CSV file does not comply with data columns!"]];
    }
    $nrOfColumns = count(array_keys($data[0]));
    foreach ($data as $rowNr => $row) {
        if (count($row) !== $nrOfColumns) {
            return [["Row $rowNr does not comply with data columns!"]];
        }
    }

    return [];
}

function validateColumnDependentOptions(array $data, array $options) : array
{
    $columns = array_keys($data[0]);
    $errors  = [];
    foreach (OPTIONS_USING_COLUMNS_VALIDATION as $option => $functionToValidate) {//parse all options that need column validation
        if (isset($options[$option]) && !empty($error = call_user_func(OPTIONS_USING_COLUMNS_VALIDATION[$option],
                $options[$option], $columns))) {//if validation returns error append it and go to the next
            array_push($errors, $error);
        }
    }

    return $errors;
}

function validateSelect(array $columnsGiven, array $columns) : array
{
    if (in_array('*', $columnsGiven)) {//if select contains * we dont care about the rest because all will be printed
        return [];
    }

    return validateColumnsGivenForOptions($columnsGiven, $columns);
}

function validateWhere(array $where, array $columns) : array
{
    return validateColumnsGivenForOptions([$where['coloana']], $columns);
}

function validatePowerValue(array $coloanaSiPutereArray, array $columns) : array
{
    return validateColumnsGivenForOptions([$coloanaSiPutereArray['coloana']], $columns);
}

function validateColumnsGivenForOptions($columnsGiven, array $columns)
{
    $columnsGiven = flattenArray([$columnsGiven]);//whatever is given make it an array
    $errors       = [];
    foreach ($columnsGiven as $columnName) {//$columnsGiven = columns to check for
        if (!in_array($columnName, $columns)) {
            array_push($errors, "Column name '$columnName' given does not exist in table!");
        }
    }

    return $errors;
}