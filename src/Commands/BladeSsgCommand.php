<?php

namespace Hasnayeen\BladeSsg\Commands;

use Illuminate\Console\Command;

class BladeSsgCommand extends Command
{
    public $signature = 'bladessg';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
