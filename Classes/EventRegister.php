<?php
/**
 * Event register
 */
declare(strict_types=1);

namespace HDNET\CalendarizeContent;

use HDNET\CalendarizeContent\Domain\Model\Content;

/**
 * Event register
 */
class EventRegister
{

    public const REGISTER_KEY = 'CalendarizeContent';
    
    /**
     * @return array
     */
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

    public static function getAutoloaderConfiguration():array {
        return [
            'SmartObjects',
        ];
    }
}
