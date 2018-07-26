<?php
declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: sergiuabrudean
 * Date: 25.07.2018
 * Time: 16:33
 */


/**
 * pass through all filters in static order (the correct application, in my opinion)
 *
 * @param array $data
 * @param array $options
 */
function applyNeededFiltersAndPrint(array $data, array $options)
{
    if (isset($options[WHERE])) {
        $data = where($data, $options[WHERE]);
    }
    if (isset($options[UNIQUE])) {
        $data = unique($data, $options[UNIQUE]);
    }
    if (isset($options[MAP_FUNCTION])) {
        $data = functionMapping($data, $options[MAP_FUNCTION_COLUMN], $options[MAP_FUNCTION]);
    }
    if (isset($options[UPPERCASE_COLUMN])) {
        $data = upperCaseColumn($data, $options[UPPERCASE_COLUMN]);
    }
    if (isset($options[LOWERCASE_COLUMN])) {
        $data = lowerCaseColumn($data, $options[LOWERCASE_COLUMN]);
    }
    if (isset($options[TITLECASE_COLUMN])) {
        $data = titleCaseColumn($data, $options[TITLECASE_COLUMN]);
    }
    if (isset($options[POWER_VALUES])) {
        $data = powerValuesColumn($data, $options[POWER_VALUES]);
    }
    if (isset($options[AGGREGATE_SUM])) {
        $data = aggregateSum($data, $options[AGGREGATE_SUM]);
    }
    if (isset($options[AGGREGATE_PROD])) {
        $data = aggregateProd($data, $options[AGGREGATE_PROD]);
    }
    if (isset($options[AGGREGATE_LIST])) {
        $data = aggregateList($data, $options[AGGREGATE_LIST], $options[AGGREGATE_LIST_GLUE]);
    }
    if (isset($options[SORT_COLUMN])) {
        $data = sortCol($data, $options[SORT_COLUMN], $options[SORT_MODE], $options[SORT_DIRECTION]);
    }
    if (isset($options[MULTI_SORT])) {
        $data = multiSortTabularData($data, $options[MULTI_SORT], $options[MULTI_SORT_DIR]);
    }
    if (isset($options[SELECT])) {
        $data = select($options[SELECT], $data);
    }
    if (isset($options[COLUMN_SORT])) {
        $data = sortColumns($data, $options[COLUMN_SORT]);
    }
    if (isset($options[OUTPUT])) {
        switch ($options[OUTPUT]) {
            case 'csv':
                {
                    printFile($data, $options[OUTPUT_FILE]);
                    break;
                }
            case 'screen':
                {
                    printScreen($data);
                    break;
                }
        }
    }
}