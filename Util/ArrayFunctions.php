<?php
declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: sergiuabrudean
 * Date: 24.07.2018
 * Time: 08:42
 */


/**
 * Returns a one-dimensional array from an array of any depth
 *
 * @param $tokens
 *
 * @return array
 */
function flattenArray($tokens)
{
    $flattenedToken = [];
    $count          = 0;
    $it             = new RecursiveIteratorIterator(new RecursiveArrayIterator($tokens));

    foreach ($it as $v) {
        $flattenedToken[$count] = $v;
        $count++;
        $tokens = $flattenedToken;
    }

    return $tokens;
}

/**
 * Removes lines which only contain \n and leaves the indexes unchanged
 *
 * @param array $fileArray
 *
 * @return array
 *
 */
function removeEmptyLines(array $fileArray) : array
{
    foreach ($fileArray as $key => $line) {
        if ($line === PHP_EOL) {
            unset($fileArray[$key]);
        }
    }

    return $fileArray;
}