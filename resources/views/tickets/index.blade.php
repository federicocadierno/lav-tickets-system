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
                            <td>{{ $ticket->status}}</td>
                            <td>
                                <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-warning">Edit</a>

                                <form action="{{ route('tickets.delete', $ticket) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

</x-layout>