<?php

declare(strict_types=1);

namespace Horat1us\Yii\Tests;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Horat1us\Yii\CarbonBehavior;
use yii\db;

class CarbonBehaviorTest extends TestCase
{
    public const TEST_TIME = '2019-03-19 02:10:21';

    public function testSetMockValues(): void
    {
        $record = new class extends db\ActiveRecord {
            public ?string $created_at = null;

            public ?string $updated_at = null;
        };

        $behavior = new CarbonBehavior();
        $behavior->attach($record);

        Carbon::setTestNow(Carbon::parse(static::TEST_TIME));
        $record->trigger(db\ActiveRecord::EVENT_BEFORE_INSERT);

        $this->assertEquals(static::TEST_TIME, $record->created_at);
        $this->assertEquals(static::TEST_TIME, $record->updated_at);

        Carbon::setTestNow();
    }

    public function testSetValueFromProperty(): void
    {
        $record = new class extends db\ActiveRecord {
            public ?string $created_at = null;

            public ?string $updated_at = null;
        };

        $behavior = new CarbonBehavior([
            'value' => static::TEST_TIME,
        ]);
        $behavior->attach($record);

        $record->trigger(db\ActiveRecord::EVENT_BEFORE_INSERT);

        $this->assertEquals(static::TEST_TIME, $record->created_at);
        $this->assertEquals(static::TEST_TIME, $record->updated_at);
    }
}
