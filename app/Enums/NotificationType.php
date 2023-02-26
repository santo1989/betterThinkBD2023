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
 * @method static WITHDRAW()
 * @method static USERWITHDRAW()
 * @method static HITTENREFERRAL()
 */
class NotificationType extends Enum
{
    private const SPONSOR = 'sponsor';
    private const PAYMENT = 'payment';
    private const WITHDRAW = 'withdraw';
    private const USERWITHDRAW = 'userwithdraw';
    private const HITTENREFERRAL = 'hittenreferral';
}
