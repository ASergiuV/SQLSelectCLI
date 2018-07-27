<?php
declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: sergiuabrudean
 * Date: 24.07.2018
 * Time: 08:44
 */


/**
 * Read from CSV as array of strings
 *
 * @param string $fileName
 *
 * @return array
 */
function readLinesCSV(string $fileName) : array
{

    $lines  = [];
    $handle = fopen($fileName, "r");

    if ($handle != false) {
        while (($line = fgetcsv($handle)) !== false) {
            array_push($lines, $line);
        }

        fclose($handle);

        return $lines;
    }

    return [];
}

/**
 * Transforms the basic CSV array of strings to array of array
 *
 * @param string $fileName
 *
 * @return array
 */
function readTable(string $fileName) : array
{
    $CSVData   = readLinesCSV($fileName);
    $data      = [];
    $nrColumns = count($CSVData[0]);
    for ($i = 1; $i < count($CSVData); $i++) {
        $dataRow = [];
        if (count($CSVData[$i]) !== $nrColumns) {
            return [];
        }
        foreach ($CSVData[0] as $key => $column) {
            $dataRow[$column] = $CSVData[$i][$key];
        }

        $data[] = $dataRow;

    }

    return $data;
}

/**
 * @param array $options
 *
 * @return array
 */
function readValidatedTable(array $options) : array
{
    $table = readTable($options[FROM]);

    $errors['ParsingErrors'] = validateParsing($options);

    if ([] === $errors) {
        return $table;
    } else {
        printScreen($errors);
    }
    die;
}