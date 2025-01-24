<?php

declare(strict_types=1);

namespace HDNET\CalendarizeContent;

use HDNET\CalendarizeContent\Domain\Model\Content;

class EventRegister
{
    public const REGISTER_KEY = 'CalendarizeContent';


    public static function getConfigurationContent(): array
    {
        return [
            'uniqueRegisterKey' => self::REGISTER_KEY,
            'title' => 'Calendarize Content',
            'modelName' => Content::class,
            'partialIdentifier' => 'CalendarizeContent',
            'tableName' => 'tt_content',
            'required' => false,
        ];
    }
}
