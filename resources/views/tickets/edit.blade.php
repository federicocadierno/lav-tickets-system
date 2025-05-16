<x-layout>
    <form method="POST" action="{{ route('tickets.update', $ticket->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
       <x-form-errors />
        <h1>Update a Ticket</h1>
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" placeholder="Name" value="{{ $ticket->name }}" />
        <label for="type" class="form-label">Type</label>
        <input type="number" name="type" placeholder="Type" value="{{ $ticket->type }}" />
        <label for="mode_of_transport" class="form-label">Modo of Transport</label>
        <select name="mode_of_transport">
            <option value="air">Air</option>
            <option value="land">Land</option>
            <option value="sea">Sea</option>
        </select>
        <label for="product_to_import_export" class="form-label">Product</label>
        <input type="text" name="product_to_import_export" placeholder="Product" value="{{ $ticket->product_to_import_export }}" />
        <label for="country_of_origin_destination" class="form-label">Country</label>
        <input type="text" name="country_of_origin_destination" placeholder="Country" value="{{ $ticket->country_of_origin_destination }}" />
        <label for="status" class="form-label">Status</label>
        <select name="status">            
            <option value="new" @selected(old('status') ?? $ticket->status == 'new')>New</option>
            <option value="in_progress"  @selected(old('status') ?? $ticket->status == 'in_progress')>In Progress</option>
            <option value="completed"  @selected(old('status') ?? $ticket->status == 'completed')>Completed</option>
        </select>
        <label class="form-label">Notes</label>
        <ul>
        @foreach ($ticket->notes as $note) 
            <li>
                {{ $note->note }}
            </li>
        @endforeach
        </ul>
        <label for="imagen" class="form-label">Document</label>
        <input class="form-control" type="file" name="document[]" multiple />
        <a href="{{ route('tickets.claim-documents', $ticket->id) }}" class="btn btn-warning">Claim Documents</a>
        <button type="submit">Save</button>
    </form>

</x-layout>