<?php

declare(strict_types=1);

namespace Hyperf\Testing\Concerns;

use Hyperf\Context\ApplicationContext;
use Hyperf\Database\Commands\Migrations\FreshCommand;
use Hyperf\Database\Commands\Seeders\SeedCommand;
use Hyperf\Database\Commands\Migrations\RollbackCommand;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;

trait InteractsWithConsole
{
    public function fresh(): string
    {
        $input = new ArrayInput([]);
        $output = new BufferedOutput();

        ApplicationContext::getContainer()->get(FreshCommand::class)->run($input, $output);

        return $output->fetch();
    }

    public function rollback(): string
    {
        $input = new ArrayInput([]);
        $output = new BufferedOutput();

        ApplicationContext::getContainer()->get(RollbackCommand::class)->run($input, $output);

        return $output->fetch();
    }

    public function seed(): string
    {
        $input = new ArrayInput([]);
        $output = new BufferedOutput();

        ApplicationContext::getContainer()->get(SeedCommand::class)->run($input, $output);

        return $output->fetch();
    }
}
