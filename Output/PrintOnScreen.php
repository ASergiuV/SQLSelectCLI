<?php
declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: sergiuabrudean
 * Date: 24.07.2018
 * Time: 08:47
 */


/**
 * @param array $toPrint
 */
function printScreen(array $toPrint)
{
    echo json_encode($toPrint, JSON_PRETTY_PRINT) . PHP_EOL;
}