<?php
declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: sergiuabrudean
 * Date: 24.07.2018
 * Time: 09:20
 */


const DIRECTION_ASC  = 'asc';
const DIRECTION_DESC = 'desc';

const HELP = 'help';

const FROM = 'from';

const WHERE  = 'where';
const UNIQUE = 'unique';

const OUTPUT      = 'output';
const OUTPUT_FILE = 'output-file';

const SORT_COLUMN    = 'sort-column';
const SORT_MODE      = 'sort-mode';
const SORT_DIRECTION = 'sort-direction';

const MULTI_SORT     = 'multi-sort';
const MULTI_SORT_DIR = 'multi-sort-dir';

const AGGREGATE_SUM       = 'aggregate-sum';
const AGGREGATE_PROD      = 'aggregate-product';
const AGGREGATE_LIST      = 'aggregate-list';
const AGGREGATE_LIST_GLUE = 'aggregate-list-glue';

const UPPERCASE_COLUMN = 'uppercase-column';
const LOWERCASE_COLUMN = 'lowercase-column';
const TITLECASE_COLUMN = 'titlecase-column';
const POWER_VALUES     = 'power-values';

const MAP_FUNCTION        = 'map-function';
const MAP_FUNCTION_COLUMN = 'map-function-column';

const COLUMN_SORT = 'column-sort';
const SELECT      = 'select';

//Used to validate columns for options that contain columns in call
const COLUMN_OPTIONS = [
    "sort-column:",
    "multi-sort:",
    "unique:",
    "where:",
    "aggregate-sum:",
    "aggregate-product:",
    "aggregate-list",
    "map-function-column:",
    "column-sort:",
    "select:",
    "uppercase-column:",
    "lowercase-column:",
    "titlecase-column:",
    "power-values:",
];

const LONG_OPTS = [
    "help::",
    "from:",
    "output:",
    "output-file:",
    "sort-column:",
    "sort-mode:",
    "sort-direction:",
    "multi-sort:",
    "multi-sort-dir:",
    "unique:",
    "where:",
    "aggregate-sum:",
    "aggregate-product:",
    "aggregate-list:",
    "aggregate-list-glue:",
    "uppercase-column:",
    "lowercase-column:",
    "titlecase-column:",
    "power-values:",
    "map-function:",
    "map-function-column:",
    "column-sort:",
    "select:",
];

const OPTIONS_ORDERED = [
    "from",
    "output",
    "output-file",
    "sort-column",
    "sort-mode",
    "sort-direction",
    "multi-sort",
    "multi-sort-dir",
    "unique",
    "where",
    "aggregate-sum",
    "aggregate-product",
    "aggregate-list",
    "aggregate-list-glue",
    "uppercase-column",
    "lowercase-column",
    "titlecase-column",
    "power-values",
    "map-function",
    "map-function-column",
    "column-sort",
    "select",
];