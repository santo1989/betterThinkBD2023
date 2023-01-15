<?php
declare(strict_types=1);
namespace App\Enums;

use MyCLabs\Enum\Enum;

/**
 * Class DriverStatus
 * @package App\Enum
 *
 * @method static READ()
 * @method static UNREAD()
 */
class NotificationStatus extends Enum
{
    private const READ = 'read';
    private const UNREAD = 'unread';
}
