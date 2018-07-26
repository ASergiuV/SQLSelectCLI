<?php
declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: sergiuabrudean
 * Date: 24.07.2018
 * Time: 08:46
 */

require_once("OptionValidation.php");
require_once("ParsingValidation.php");

/**
 * @param array $options
 *
 * @param array $data
 *
 * @return void
 */
function validateParsing(array $options, array $data) : void
{
    $errors = [];

    $errors['TableErrors'] = validateTable($data);
    if (empty($errors['TableErrors'])) {
        $errors['ColumnErrors'] = validateColumnDependentOptions($data, $options);
    }

    $errors = removeNullOrEmpty($errors);

    if ([] === $errors) {
        return;
    } else {
        printScreen($errors);
    }
    die;
}

/**
 * @param array $options
 *
 * @return array
 */
function validateTerminalOptions(array $options) : array
{
    $errors = [];
    echo "Current Process: " . getmypid() . PHP_EOL;
    if (isset($options["help"])) {
        return [];
    }
    //from validation
    if (isset($options[FROM])) {
        $errors[] = validateFrom($options[FROM]);
    } else {
        $errors[] = ["--from is mandatory"];
    }
    if (!isset($options[SELECT])) {
        $errors[] = ["--select is mandatory"];
    }
    if ($options[OUTPUT] !== 'csv' && $options[OUTPUT] !== 'screen') {
        $errors[] = ["--output was improperly set"];
    }
    if (isset($options[MULTI_SORT]) && isset($options[MULTI_SORT_DIR])) {
        $errors[] = validateMultiSort($options[MULTI_SORT], $options[MULTI_SORT_DIR]);
    }
    $errors['optionValues']         = validateOptionValues($options);
    $errors['emptyOptions']         = validateForEmptyOptions($options);
    $errors['complementaryOptions'] = validateComplementaryOptionsExistance($options);

    $errors = removeNullOrEmpty($errors);

    return $errors;
}