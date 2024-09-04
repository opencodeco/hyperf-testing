<?php

declare(strict_types=1);

namespace Hyperf\Testing;

use Hyperf\Context\ApplicationContext;
use Hyperf\Contract\ConfigInterface;

trait DatabaseMigrations
{
    protected array $database = [
        'driver' => 'sqlite',
        'database' => ':memory:',
    ];

    public function setUpDatabaseMigrations(): void
    {
        ApplicationContext::getContainer()->get(ConfigInterface::class)->set('databases.default', $this->database);

        $this->fresh();
        $this->seed();
    }

    public function tearDownDatabaseMigrations(): void
    {
        $this->rollback();
    }
}
