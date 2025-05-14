<x-layout>

    <form method="POST" action="{{ route('login.attempt') }}">
        @csrf
       <x-form-errors />
        <h1>Login</h1>
        <input type="email" name="email" placeholder="Email" />
        <input type="password" name="password" placeholder="Password" />
        <button type="submit">Login</button>
    </form>

</x-layout>