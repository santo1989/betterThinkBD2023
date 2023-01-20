<?php
declare(strict_types=1);
namespace App\Enums;

use MyCLabs\Enum\Enum;

/**
 * Class DriverStatus
 * @package App\Enum
 *
 * @method static BANK()
 * @method static MOBILE()
 */
class PaymentMethod extends Enum
{
    private const BANK = 'bank';
    private const MOBILE = 'mobile';
}
