<?php

namespace Genesizadmin\GenesizCore\Commands;

use Illuminate\Console\Command;

class GenesizCoreCommand extends Command
{
    public $signature = 'genesiz-core';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
