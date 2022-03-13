<?php

namespace App\Console\Commands;

use App\Mail\DailyReport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
class ReportMailSend extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'report:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'reports sent to daily user';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user= \App\Models\User::find(1);
        \App\Jobs\DailyReportSend::dispatch($user)->delay(now()->addSecond(10));
//        Mail::to('tes2222t@gmail.com')->send(new DailyReport());
        return 0;
    }
}
