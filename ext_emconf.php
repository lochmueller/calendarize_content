<?php

/**
 * $EM_CONF.
 */
$EM_CONF[$_EXTKEY] = [
    'title' => 'Calendarize - Content',
    'description' => 'Add content to EXT:calendarize',
    'category' => 'fe',
    'version' => '0.1.0',
    'state' => 'beta',
    'clearcacheonload' => 1,
    'author' => 'Tim Lochmüller',
    'author_email' => 'tim@fruit-lab.de',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.6-11.5.99',
            'php' => '7.3.0-8.0.99',
            'calendarize' => '10.0.0-12.99.99',
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'HDNET\\CalendarizeContent\\' => 'Classes/'
        ],
    ],
];
