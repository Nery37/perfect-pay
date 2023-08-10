<?php

declare(strict_types=1);

namespace App\Enums;

enum PaymentMethodEnum: int
{
    case TICKET = 1;
    case PIX = 2;
    case CREDIT_CARD = 3;
}
