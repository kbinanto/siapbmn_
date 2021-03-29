<?php

namespace App\Console;

use App\Models\RekonsiliasiInternal_tmp;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {
            DB::query()->update("INSERT INTO rekonsiliasi_internal_tmp SELECT * FROM `rekonsiliasi_internal` ");
        })->everyMinute();

        //  return Sp2d53::query()->select('id', 'kode_satker', 'nama_satker', 'akun', 'no_dokumen', 'tgl_dokumen', 'rph_saiba', 'rph_simak', 'rph_selisih', 'penjelasan');
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
