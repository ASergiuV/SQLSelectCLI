#! /usr/bin/env php
<?php
declare(strict_types = 1);

mb_internal_encoding("UTF-8");

require_once("Imports.php");

function main()
{
    $options = readValidatedOptionsFromTerminal(LONG_OPTS);
    $data    = readTable($options[FROM]);
    validateParsing($options, $data);
    applyNeededFiltersAndPrint($data, $options);
}


main();