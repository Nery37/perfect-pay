<?php

declare(strict_types=1);

namespace App\Presenters;

use App\Presenters\Trait\PresentTrait;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PaymentMethodPresenter.
 */
class PaymentMethodPresenter extends FractalPresenter
{
    use PresentTrait;
}
