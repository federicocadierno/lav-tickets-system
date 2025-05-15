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
    public function __construct(
        private Tickets $ticket, 
        private string $subject,
        private bool $toAgent = false)
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if($this->toAgent) {
            Log::info('after update tickte to agent');
                
            $users = User::where('is_agent', true)->get();
            foreach($users as $user) {
                $user->notify(new \App\Notifications\Tickets(
                    $this->ticket,
                    $this->subject,
                    ['database']
                ));
            }
        } else {
            Log::info('after update tickte to user');

            $user = User::where('id', $this->ticket->user_id)->first();

            
            $user->notify(new \App\Notifications\Tickets(
                $this->ticket,
                $this->subject,
                ['database']
            ));
        }
        
        
    }
}
