<x-layout>

        <div class="container">
            <h1>Tickets</h1>
            <a href="{{ route('tickets.create') }}" class="btn btn-primary">Create Ticket</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>User</th>
                        <th>Type</th>
                        <th>Product</th>
                        <th>Country</th>
                        <th>Documents</th>
                        <th>Notes</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tickets as $ticket)
                        <tr>
                            <td>{{ $ticket->id }}</td>
                            <td>{{ $ticket->name }}</td>
                            <td>{{ $ticket->user->name }}</td>
                            <td>{{ $ticket->type }}</td>
                            <td>{{ $ticket->product_to_import_export }}</td>
                            <td>{{ $ticket->country_of_origin_destination }}</td>
                            <td>
                                <ul>
                                @foreach ($ticket->documents as $document) 
                                    <li>
                                        <a href="{{ route('tickets.download', $document->id) }}" class="btn btn-warning">Download</a>
                                    </li>
                                @endforeach
                                </ul>
                            </td> 
                            <td>
                                <ul>
                                @foreach ($ticket->notes as $note) 
                                    <li>
                                        {{ $note->note }}
                                    </li>
                                @endforeach
                                </ul>
                            </td> 
                            <td>{{ $ticket->status}}</td>
                            <td>
                                <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-warning">Edit</a>
                                @if(auth()->user()->is_agent == 1)
                                    <a href="{{ route('tickets.note', $ticket->id) }}" class="btn btn-warning">Claim Documents</a>                               
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

</x-layout>