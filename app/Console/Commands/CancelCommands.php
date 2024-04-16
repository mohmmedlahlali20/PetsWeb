<?php

use Illuminate\Console\Command;
use App\Models\Commends;
use Carbon\Carbon;

class CancelCommands extends Command
{
    protected $signature = 'commands:cancel';

    protected $description = 'Cancel commands older than 5 minutes';

    public function handle()
    {
        $commands = Commends::where('created_at', '<', Carbon::now()->subMinutes(1))
            ->where('status', 'valide')
            ->get();

        foreach ($commands as $command) {
            $command->status = 'invalid';
            $command->save();
        }

        $this->info('Cancelled ' . $commands->count() . ' commands older than 5 minutes.');
    }
}
