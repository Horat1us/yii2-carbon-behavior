<?php

declare(strict_types=1);

namespace Horat1us\Yii;

use Carbon\Carbon;
use yii\behaviors;

/**
 * Class CarbonBehavior
 * @package Horat1us\Yii
 */
class CarbonBehavior extends behaviors\TimestampBehavior
{
    protected function getValue($event)
    {
        if (is_null($this->value)) {
            return Carbon::now()->toDateTimeString();
        }

        return parent::getValue($event);
    }
}
