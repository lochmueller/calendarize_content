<?php

defined('TYPO3_MODE') || die();

\HDNET\Autoloader\Loader::extTables('HDNET', 'calendarize_content', \HDNET\CalendarizeContent\EventRegister::getAutoloaderConfiguration());
\HDNET\Calendarize\Register::extTables(\HDNET\CalendarizeContent\EventRegister::getConfigurationPages());
