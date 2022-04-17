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
    protected $signature = 'inisev-onboarding:seed {x} {y*}';

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
        $x = $this->argument('x');
        $y = $this->argument('y');

        // $bar = $this->output->createProgressBar(50);
        // $bar->start();
        // $bar->advance();
        // $bar->finish();

        //if($this->confirm("Do you want to refresh migrations?")){
            //$this->call('migrate:reset', []);
        //}
        $this->comment("Resetting migrations");
        $this->call('migrate:reset', []);
        $this->comment("Running migrations");
        $this->call('migrate', []);
        $this->comment("Seeding database tables");
        $this->call('db:seed');
        $this->info('Onboarding seed ran successfully');
        //$this->error('Something went wrong!');

    }
}
