<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff2f2;
            margin: 0;
            padding: 32px;
            min-height: 254px;
            display: flex;
            flex-direction: column;
        }
        main {
            width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: center;
        }
        form {
            display: flex;
            flex-direction: column;
            width: 60%;
        }
    </style> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tickets</title>
    
</head>
<body>
    <main>
        <nav>
            @if(Auth::check())
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item">
                        <i class="fa fa-sign-out-alt"></i>
                        Logout
                    </button>
                    <a href="{{ route('tickets.create') }}">Create a Ticket</a>

                </form>
            @else
                <a href="{{ route('login') }}">Login</a>
            @endif
            <a href="{{ route('register') }}">Register</a>
        </nav>
        {{ $slot }}
    </main>
    
</body>
</html>