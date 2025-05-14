<x-layout>

    <form method="POST" action="{{ route('tickets.store') }}" enctype="multipart/form-data" >
        @csrf
       <x-form-errors />
        <h1>Create a Ticket</h1>
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" placeholder="Name" />
        <label for="type" class="form-label">Type</label>
        <input type="number" name="type" placeholder="Type" />
        <label for="mode_of_transport" class="form-label">Modo of Transport</label>
        <select name="mode_of_transport">
            <option value="air">Air</option>
            <option value="land">Land</option>
            <option value="sea">Sea</option>
        </select>
        <label for="product_to_import_export" class="form-label">Product</label>
        <input type="text" name="product_to_import_export" placeholder="Product" />
        <label for="country_of_origin_destination" class="form-label">Country</label>
        <input type="text" name="country_of_origin_destination" placeholder="Country" />
        <label for="imagen" class="form-label">Document</label>
        <input class="form-control" type="file" name="document[]" multiple />
        <button type="submit">Create</button>
    </form>

</x-layout>