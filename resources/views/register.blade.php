<x-layout>

    <form method="POST" action="{{ route('register.store') }}">
        @csrf
        <x-form-errors />
        <h1>Register</h1>
        <input type="text" name="name" placeholder="Name" />
        <input type="email" name="email" placeholder="Email" />
        <input type="password" name="password" placeholder="Password" />
        <label for="is_agent">Is agent?</label> 
        <input type="checkbox" name="is_agent"  />
        <button type="submit">Sign Up</button>
    </form>

</x-layout>