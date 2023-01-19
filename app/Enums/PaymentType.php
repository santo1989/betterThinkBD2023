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
 */
class PaymentType extends Enum
{
    private const SENT = 'sent';
    private const RECEIVED = 'received';
}
