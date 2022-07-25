<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ScrapeSushi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:sushi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scrape Sushi';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        echo 1 + 3 . PHP_EOL;
        return 0;
    }
}
