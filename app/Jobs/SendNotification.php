<?php

namespace App\Jobs;

use App\Models\Tickets;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class SendNotification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(private Tickets $ticket)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $user = User::where('is_agent', '1')
        ->first();

        Log::info('User registration successful', $user->toArray());
        
        $user->notify(new \App\Notifications\Tickets(
            $this->ticket,
            ['database']
        ));
    }
}
