<?php

namespace App\Console\Commands;

use App\Models\Admin\CurrentYear;
use Carbon\Carbon;
use Illuminate\Console\Command;

class InitNewYear extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'init:year';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update New Year';

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
        $date = Carbon::now();
        $currentYear = CurrentYear::find(1);

        $currentYear->year = $date->year;
        $currentYear->save();

        return 0;
    }
}
