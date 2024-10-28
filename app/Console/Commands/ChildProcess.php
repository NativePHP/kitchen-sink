<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ChildProcess extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:child-process';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        stream_set_blocking(STDIN, false);

        $start = time();

        while (true) {
            if (time() - $start >= 5) {
                $start = time();

                fwrite(STDOUT, date('H:i:s'));
            }

            if (mt_rand(1, 1_000) === 5) {
                error_log('A wild error appeared!');
                exit(1);
            }

            $input = fgets(STDIN);

            if ($input !== false) {
                $message = trim($input);
                fwrite(STDOUT, "Message received: {$message}");
                unset($message);
            }

            usleep(100_000);
        }
    }
}
