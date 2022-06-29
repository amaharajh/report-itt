<?php

namespace App\Console\Commands;

use App\Jobs\SendFortnightlyReports;
use App\Models\Organisation;
use Illuminate\Console\Command;

class SendFortnightlyReportsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fortnightlyreport:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends fornightly reports to the emails of the organisations.
                              The reports contain exported excel files with their respective data.';

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
    public function handle(){
//Query for all organisations. For each org not belonging to 5.
    $organisations = Organisation::where('id','!=',5)->get();

    foreach ($organisations as $organisation) {
    SendFortnightlyReports::dispatch($organisation->id);
 

    }
}
}