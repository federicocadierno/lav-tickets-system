<x-layout>
    <form method="POST" action="{{ route('tickets.note.store', $ticket->id) }}" >
        @csrf
        <x-form-errors />
        <h1>Claim Documents</h1>
        <label for="note" class="form-label">Name</label>
        <textarea name="note" id="note" placeholder="Add your note" rows="4" cols="50"></textarea>
        
        <button type="submit">Save</button>
    </form>

</x-layout>