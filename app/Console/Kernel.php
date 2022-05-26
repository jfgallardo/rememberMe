<?php

namespace App\Console;

use App\Jobs\ProcessMail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Date;
use App\Models\Notification;


class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            date_default_timezone_set('America/Maceio');
            $today = date("Y-m-j");
            foreach (Notification::where('warning_date', $today)->get() as $noti) {
                ProcessMail::dispatch($noti->name_user, $noti->title, $noti->email_user);
            }
        })->timezone('America/Maceio')->dailyAt('00:30');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
