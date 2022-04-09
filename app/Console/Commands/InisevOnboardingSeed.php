<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InisevOnboardingSeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inisev-onboarding:seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to seed all needed data into database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->call('migrate:reset', []);
        $this->call('migrate', []);
        $this->call('db:seed');
        $this->comment('Onboarding seed ran successfully');
    }
}
