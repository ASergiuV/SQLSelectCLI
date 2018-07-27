<?php
declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: sergiuabrudean
 * Date: 25.07.2018
 * Time: 11:26
 */


require_once("./Output/PrintOnScreen.php");
require_once("./Output/PrintInFile.php");
require_once("./Input/TerminalOptions.php");
require_once("./Util/CONSTANTS.php");
require_once("./Validating/TerminalValidations.php");
require_once("./Parsing/CSV.php");
require_once("./DataReducing/Unique.php");
require_once("./DataReducing/Where2.php");
require_once("./DataTransformation/FunctionMapping.php");
require_once("./Sorting/MultiSort.php");
require_once("./DataTransformation/CaseTransformation.php");
require_once("./OutputPreparators/Select.php");
require_once("./Sorting/Sort.php");
require_once("./Aggregating/AggregateNumeric.php");
require_once("./Aggregating/AggregateList.php");
require_once("./OutputPreparators/ColumnSort.php");
require_once("Util/PuttingEverythingTogether.php");
require_once("Util/ArrayFunctions.php");