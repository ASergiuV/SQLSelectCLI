<?php
declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: sergiuabrudean
 * Date: 24.07.2018
 * Time: 09:35
 */


/**
 * @param array $toPrint
 * @param string $fileName
 */
function printFile(array $toPrint, string $fileName)
{
    $outStream = fopen($fileName, "a");
    if (count($toPrint)) {
        fputcsv($outStream, array_keys($toPrint[0]));
        foreach ($toPrint as $row) {
            fputcsv($outStream, $row);
        }
    }
    fclose($outStream);
}