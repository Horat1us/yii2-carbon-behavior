# Yii2 Carbon Behavior

[![codecov](https://codecov.io/gh/Horat1us/yii2-carbon-behavior/branch/master/graph/badge.svg)](https://codecov.io/gh/Horat1us/yii2-carbon-behavior)

Behavior to generate timestamps (created_at, updated_at etc.) using 
[Carbon instance](https://github.com/briannesbitt/Carbon).

Main purpose of using Carbon (instead of native `time()` function, implemented in `\yii\behaviors\TimestampBehavior`)
is ability to mock this values without tricks (using `Carbon::setTestNow()`).

Used in real projects with MySQL and PostgreSQL.

## Installation
Using [packagist.org](https://packagist.org/packages/horat1us/yii2-carbon-behavior):
```bash
composer require horat1usyii2-carbon-behavior:^1.0
```

## Usage
To generate timestamps using Carbon
```php
<?php

namespace App;

use Horat1us\Yii\CarbonBehavior;
use yii\db;

/**
* Class Record
 * @package App
 * 
 * @property string $created_at [timestamp]
 * @property string $updated_at [timestamp]
 */
class Record extends db\ActiveRecord
{
    public function behaviors(): array {
        return [
            'uuid' => [
                'class' => CarbonBehavior::class,    
            ],    
        ];
    }
}
```
in followed example created_at and updated_at attributes will be filled with date and time generated using Carbon class.

## License
[MIT](./LICENSE)
