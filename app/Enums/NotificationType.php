<?php
declare(strict_types=1);
namespace App\Enums;

use MyCLabs\Enum\Enum;

/**
 * Class DriverStatus
 * @package App\Enum
 *
 * @method static SPONSOR()
 * @method static PAYMENT()
 */
class NotificationType extends Enum
{
    private const SPONSOR = 'sponsor';
    private const PAYMENT = 'payment';
}
