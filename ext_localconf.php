<?php

defined('TYPO3') || die();

\HDNET\Calendarize\Register::extLocalconf(\HDNET\CalendarizeContent\EventRegister::getConfigurationPages());

$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
$iconRegistry->registerIcon('calendarize-content-extension', \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class, ['source' => 'EXT:calendarize_content/Resources/Public/Icons/Extension.svg']);
