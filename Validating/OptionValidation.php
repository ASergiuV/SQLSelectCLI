<?php
declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: sergiuabrudean
 * Date: 24.07.2018
 * Time: 11:34
 */


const COMPLEMENTARY_OPTIONS_ARRAY = [
    "aggregate-list" => ["aggregate-list-glue"],
    "multi-sort" => ["multi-sort-dir"],
    "sort-column" => ["sort-mode", "sort-direction"],
    "map-function" => ["map-function-column"]
];

const OPTION_VALUE_VALIDATION_ARRAY = [
    "sort-mode" => "/^natural|alphabetic|numeric$/",
    "sort-direction" => "/^asc|desc$/",
    "column-sort" => "/^asc|desc$/",
    "multi-sort-dir" => "/(asc|desc)(,asc|desc)*/",
    "where" => "/^([^<>=]*)((?:(?:<>){1})|(?:<|>|=)){1}([^<>=]*)$/"
];

/**
 * @param array $options
 * @param array $validData
 *
 * @return array
 */
function validateComplementaryOptionsExistance(array $options, array $validData = COMPLEMENTARY_OPTIONS_ARRAY) : array
{
    $errors = [];
    foreach ($validData as $option => $needles) {
        foreach ($needles as $needle) {
            if (isset($options[$option]) && !isset($options[$needle])) {
                array_push($errors, ["--$needle option missing (must be set if --$option is set)!"]);
            }
        }
    }
    if ($options[OUTPUT] === 'csv' && !isset($options[OUTPUT_FILE])) {
        array_push($errors, ["--output-file option missing (must be set if --output is set to csv)!"]);
    }

    return $errors;
}

function validateOptionValues(array $options, array $validData = OPTION_VALUE_VALIDATION_ARRAY) : array
{
    $errors = [];
    foreach ($validData as $option => $regexForOptionValue) {
        if (isset($options[$option]) && !preg_match($regexForOptionValue, $options[$option])) {
            array_push($errors, ["Invalid or missing argument for --$option ($options[$option])!"]);
        }
    }

    return $errors;
}

function validateForEmptyOptions(array $options) : array
{
    $errors = [];
    foreach ($options as $option => $value) {
        if (empty($value)) {
            array_push($errors, ["--$option is empty!"]);
        }
    }

    return $errors;
}

function validateMultiSort(string $columns, string $directions) : array
{
    if (count(explode(',', $columns)) !== count(explode(',', $directions))) {
        return [
            "At the --multi-sort option there are distinct counts for directions and column names!",
            "if --multi-sort is set --multi-sort-dir must also be set"
        ];
    }

    return [];
}

function validateFrom(string $file) : array
{
    if (!file_exists($file)) {
        return ["File set for --from option does not exist!"];
    }

    return [];
}

function validateFunctionMapping(string $file) : array
{
    if (!file_exists($file)) {
        return ["File set for --map-function option does not exist!"];
    }

    return [];
}