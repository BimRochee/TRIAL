<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/transaction.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="header-left">
                <h1>TRACO</h1>
            </div>
            <div class="header-right">
                <img src="{{ asset('icons/notifications.svg') }}" alt="Notification Icon" class="notification-icon">
                <img src="{{ asset('icons/menu.svg') }}" alt="Menu" class="menu">
                <img src="{{ asset('icons/profile-pic.png') }}" alt="Profile Picture" class="profile-pic">
            </div>
        </div>
        <div class="content-container">
            <div class="sidebar">
                <nav>
                    <ul>
                        <li class="account-pages">Main Menu</li>
                        <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('/farmer/dashboard') }}" class="active">
                                <img src="{{ asset('icons/dashboard.svg') }}" alt="Dashboard Icon"> Dashboard
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('transactions') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('/farmer/transactions') }}">
                                <img src="{{ asset('icons/transaction.svg') }}" alt="Transaction Icon"> Transaction
                            </a>
                        </li>
                        <li>
                            <a href="#"><img src="{{ asset('icons/search.svg') }}" alt="Search Icon"> Search Batch</a>
                        </li>
                        <li class="account-pages">Account Pages</li>
<<<<<<< HEAD
                        <li><a href="#"><img src="{{ asset('icons/profile.svg') }}" alt="Profile Icon"> Profile</a></li>
                        <li><a href="#"><img src="{{ asset('icons/settings.svg') }}" alt="Settings Icon"> Settings</a></li>
                        <li><a href="#"><img src="{{ asset('icons/faqs.svg') }}" alt="FAQs Icon"> FAQs</a></li>
                        <li><a class="nav-link text-dark" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                 <span class="icon">
                                    <ion-icon name="log-out-outline"></ion-icon>
                                 </span>
                                <span class="title">{{ __('Logout') }}</span>
                          </a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                          </form></li>
=======
                        <li class="nav-item {{ Request::is('farmer/profile') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('farmer.profile') }}">
                                <img src="{{ asset('icons/profile.svg') }}" alt="Profile Icon"> Profile
                            </a>
                        </li>
                        
                        <li>
                            <a href="#"><img src="{{ asset('icons/settings.svg') }}" alt="Settings Icon"> Settings</a>
                        </li>
                        <li>
                            <a href="#"><img src="{{ asset('icons/faqs.svg') }}" alt="FAQs Icon"> FAQs</a>
                        </li>
>>>>>>> 8a4c06032ad47da2c06ad5b3f0d60fc0e533d0d5
                    </ul>
                </nav>
            </div>
            <div class="main-content">
                <main class="py-4">
                    <div class="container transaction-page">
                        <div class="row">
                            <div class="col-md-12">
                                <h1>@yield('content-header', 'Dashboard')</h1>
                            </div>
                        </div>
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>
    </div>
</body>
</html>
