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

    public const DOKTYPE_EVENT = 132;

    public const REGISTER_KEY = 'CalendarizeContent';
    
    /**
     * @return array
     */
    public static function getConfigurationContent(): array
    {
        return [
            'uniqueRegisterKey' => self::REGISTER_KEY,
            'title' => 'Calendarize Page',
            'modelName' => Content::class,
            'partialIdentifier' => 'CalendarizeContent',
            'tableName' => 'pages',
            'required' => false,
        ];
    }

    public static function getAutoloaderConfiguration():array {
        return [
            'SmartObjects',
        ];
    }
}
