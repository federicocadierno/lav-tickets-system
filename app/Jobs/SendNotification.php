<?php

namespace App\Jobs;

use App\Models\Tickets;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Log;

class SendNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(private Tickets $ticket)
    {
        
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $user = User::where('email', 'sebas@test.com')->first();

        $user->notify(new \App\Notifications\Tickets(
            $this->ticket,
            ['database']
        ));
    }
}
