<?php

defined('TYPO3_MODE') || die();

\HDNET\Autoloader\Loader::extTables('HDNET', 'calendarize_content', \HDNET\CalendarizeContent\EventRegister::getAutoloaderConfiguration());
\HDNET\Calendarize\Register::extTables(\HDNET\CalendarizeContent\EventRegister::getConfigurationPages());

$GLOBALS['PAGES_TYPES'][\HDNET\CalendarizeContent\EventRegister::DOKTYPE_EVENT] = [
    'type' => 'web',
    'allowedTables' => '*',
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig('
    options.pageTree.doktypesToShowInNewPageDragArea := addToList(' . \HDNET\CalendarizeContent\EventRegister::DOKTYPE_EVENT . ')
');
