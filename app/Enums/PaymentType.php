<?php
declare(strict_types=1);
namespace App\Enums;

use MyCLabs\Enum\Enum;

/**
 * Class DriverStatus
 * @package App\Enum
 *
 * @method static SENT()
 * @method static RECEIVED()
 * @method static WITHDRAW()
 * @method static REWARD()
 * @method static PAYMENT()
 * @method static SPONSOR()
 * @method static GENERATE_POINT()
 */
class PaymentType extends Enum
{
    private const SENT = 'sent';
    private const RECEIVED = 'received';
    private const WITHDRAW = 'withdraw';
    private const REWARD = 'reward';
    private const PAYMENT = 'payment';
    private const SPONSOR = 'sponsor';
    private const GENERATE_POINT = 'generate_point';
}
