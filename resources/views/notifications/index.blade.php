<x-layout>

    <div class="container">
        <h1>Notifications</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Notification Subject</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($notifications as $notification)
                    <tr>
                        <td>{{ $notification->data['subject'] }}</td>
                        <td><a href="{{ action([\App\Http\Controllers\NotificationsController::class, 'notification'], $notification) }}"
                            class="mr-3">
                             <button class="btn btn-info btn-sm" type="button">Ver</button>
                         </a></td>
                       
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-layout>