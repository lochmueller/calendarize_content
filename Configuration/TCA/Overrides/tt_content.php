<?php

use HDNET\Autoloader\Utility\ArrayUtility;
use HDNET\Autoloader\Utility\ModelUtility;

$GLOBALS['TCA']['tt_content'] = ModelUtility::getTcaOverrideInformation('calendarize_content', 'tt_content');

$custom = [];

$GLOBALS['TCA']['tt_content'] = ArrayUtility::mergeRecursiveDistinct($GLOBALS['TCA']['tt_content'], $custom);
