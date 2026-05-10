<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('app:cleanup-active-entries')]
#[Description('Command description')]
class CleanupActiveEntries extends Command
{
    protected $signature = 'active-entries:cleanup';
    protected $description = 'Delete active entries older than 24 hours';
    
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $count = ActiveEntry::where(
            'created_at',
            '<',
            now()->subHours(24)
        )->delete();

        $this->info("Deleted {$count} old entries.");

        return Command::SUCCESS;
    }
}
