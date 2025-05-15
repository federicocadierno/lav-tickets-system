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
            width: 1200px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            flex-direction: column
        }
        form {
            display: flex;
            flex-direction: column;
            width: 60%;
        }
        .menu {
            display: flex;
            justify-content: space-between;
            list-style: none;
            padding: 0;
            margin: 0;
            gap: 0 20px
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
                <ul class="menu">
                    <li>
                        {{ Auth::user()->name }}
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="fa fa-sign-out-alt"></i>
                                Logout
                            </button>                    
                        </form>
                    </li>
                    <li>
                        <a href="{{ route('tickets.create') }}">Create a Ticket</a>
                    </li>
                    <li>
                        <a href="{{ route('tickets.index') }}">List of Ticket</a>        
                    </li>
                
                    <li class="nav-item d-md-down-none">
                        <a class="nav-link"
                        href="{{ action([\App\Http\Controllers\NotificationsController::class, 'notifications']) }}">
                            <i class="icon-bell"></i>
                            <span class="badge badge-pill badge-danger">{{ count($_notifications) }}</span>
                        </a>
                    </li>

            @else
                <a href="{{ route('login') }}">Login</a>
            @endif
            <a href="{{ route('register') }}">Register</a>
        </nav>
        {{ $slot }}
    </main>
    
</body>
</html>