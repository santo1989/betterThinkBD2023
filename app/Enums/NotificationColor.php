<?php
declare(strict_types=1);
namespace App\Enums;

use MyCLabs\Enum\Enum;

/**
 * Class DriverStatus
 * @package App\Enum
 *
 * @method static RED()
 * @method static GREEN()
 */
class NotificationColor extends Enum
{
    private const RED = 'red';
    private const GREEN = 'green';
}
