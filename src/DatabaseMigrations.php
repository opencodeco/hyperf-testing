<?php

declare(strict_types=1);

namespace Hyperf\Testing;

trait DatabaseMigrations
{
    public function setUpDatabaseMigrations(): void
    {
        $this->fresh();
        $this->seed();
    }

    public function tearDownDatabaseMigrations(): void
    {
        $this->rollback();
    }
}
