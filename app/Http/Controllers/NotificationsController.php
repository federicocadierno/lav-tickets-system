<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\Tickets;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Redirect;

class NotificationsController extends Controller
{
    public function notifications() {

        $user = Auth::user();
        $notifications = $user->unreadNotifications;

        
        return view('notifications.index', compact('notifications'));
    }

    public function notification(DatabaseNotification $databaseNotification) {


        $databaseNotification->markAsRead();

        if($databaseNotification->type === Tickets::class) {
            return Redirect::action([TicketsController::class, 'edit'], $databaseNotification->data['ticket_id']);
        }
    }
}
