<?php

use HDNET\Autoloader\Utility\ArrayUtility;
use HDNET\Autoloader\Utility\ModelUtility;
use HDNET\CalendarizeContent\EventRegister;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

$GLOBALS['TCA']['tt_content'] = ModelUtility::getTcaOverrideInformation('calendarize_content', 'tt_content');

$custom = [];

$GLOBALS['TCA']['tt_content'] = ArrayUtility::mergeRecursiveDistinct($GLOBALS['TCA']['tt_content'], $custom);


ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'doktype',
    [
        'Event',
        (string) EventRegister::DOKTYPE_EVENT,
        'calendarize-tt_content-extension',
    ],
    '1',
    'after'
);

\TYPO3\CMS\Core\Utility\ArrayUtility::mergeRecursiveWithOverrule(
    $GLOBALS['TCA']['tt_content'],
    [
        'ctrl' => [
            'typeicon_classes' => [
                (string) EventRegister::DOKTYPE_EVENT => 'calendarize-tt_content-extension',
            ],
        ],
        'types' => [
            (string) EventRegister::DOKTYPE_EVENT => $GLOBALS['TCA']['tt_content']['types'][\TYPO3\CMS\Core\Domain\Repository\PageRepository::DOKTYPE_DEFAULT],
        ],
    ]
);

$GLOBALS['TCA']['tt_content']['types'][(string) EventRegister::DOKTYPE_EVENT]['columnsOverrides'] = [
    'calendarize' => [
        'config' => [
            'minitems' => 1,
        ],
    ],
];
