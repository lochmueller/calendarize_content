<?php

/**
 * $EM_CONF.
 */
$EM_CONF[$_EXTKEY] = [
    'title' => 'Calendarize - Content',
    'description' => 'Add content to EXT:calendarize',
    'category' => 'fe',
    'version' => '1.0.1',
    'state' => 'beta',
    'author' => 'Tim Lochmüller',
    'author_email' => 'tim@fruit-lab.de',
    'constraints' => [
        'depends' => [
            'typo3' => '12.4.0-13.4.99',
            'php' => '8.1.0-8.4.99',
            'calendarize' => '13.0.0-14.99.99',
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'HDNET\\CalendarizeContent\\' => 'Classes/'
        ],
    ],
];
