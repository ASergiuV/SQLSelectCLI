<?php
declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: sergiuabrudean
 * Date: 24.07.2018
 * Time: 08:33
 */


/**
 * @param array $longOpts
 *
 * @return array
 */
function readOptionsFromTerminal(array $longOpts) : array
{
    $options1 = getopt("", $longOpts, $optind);
    $options  = [];
    foreach ($longOpts as $key => $val) {
        $options[rtrim($val, ":")] = null;
    }
    $options[OUTPUT] = 'screen';

    return $options1 + $options;
}

/**
 * This function takes the input strings and converts them to array if necessary, so that the logic functions don't need
 * to modify the input data
 *
 * @param array $options
 *
 * @return array
 */
function processOptions(array $options) : array
{
    foreach ($options as $optionKey => $option) {

        if ($optionKey === WHERE && $option !== null) {
            preg_match('/(([A-Za-z0-9]*)(<>|<|>|=){1}([A-Za-z0-9]*))/', $option, $matches, PREG_OFFSET_CAPTURE, 0);
            $whereData           = [
                "coloana" => $matches[2][0],
                "semn" => $matches[3][0],
                "valoare" => $matches[4][0]
            ];
            $options[$optionKey] = $whereData;
        }

        if ($optionKey === SELECT) {
            $options[$optionKey] = explode(",", $option);
        }
        if ($optionKey === MULTI_SORT) {
            $options[$optionKey] = explode(",", $option);
        }
        if ($optionKey === MULTI_SORT_DIR) {
            $options[$optionKey] = explode(",", $option);
        }
        if ($optionKey === POWER_VALUES && $option !== null) {
            $exploded            = explode(" ", $option);
            $options[$optionKey] = [
                "coloana" => $exploded[0],
                "puterea" => $exploded[1]
            ];
        }

    }
    if (isset($options[MULTI_SORT_DIR])) {
        foreach ($options[MULTI_SORT_DIR] as $key => $direction) {
            if ($direction === 'asc') {
                $options[MULTI_SORT_DIR][$key] = SORT_ASC;
            }
            if ($direction === 'desc') {
                $options[MULTI_SORT_DIR][$key] = SORT_DESC;
            }
        }
    }

    return $options;
}

function removeNullOrEmpty(array $options) : array
{
    foreach ($options as $optionKey => $option) {
        if ($option === null || empty($option)) {
            unset($options[$optionKey]);
        }
    }

    return $options;
}

/**
 * @param array $longOpts
 *
 * @return array
 */
function readValidatedOptionsFromTerminal(array $longOpts) : array
{
    $options = readOptionsFromTerminal($longOpts);

    if ($options[HELP] === false) {
        $json = file_get_contents("help.json");

        printScreen(json_decode($json));
        exec('xdg-open help2.jpg > /dev/null &');
        die;
    }
    unset($options[HELP]);
    $options = removeNullOrEmpty($options);

    $errors['TerminalErrors'] = validateTerminalOptions($options);
    $errors                   = removeNullOrEmpty($errors);
    if ([] === $errors) {
        $options = processOptions($options);

        return $options;
    } else {
        printScreen($errors);
    }
    die;
}