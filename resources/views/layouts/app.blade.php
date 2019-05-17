<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Verhuurportaal</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="shortcut icon" type="image/png" href="{{ asset('favicon.ico') }}">
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-lg navbar-dark bg-brown">
                <img src="{{ asset('img/logo.png') }}" width="25" height="25" class="mr-3 rounded shadow-lg d-inline-block align-top" alt="{{ config('app.name', 'Laravel') }}">
                <a class="navbar-brand mr-auto mr-lg-0" href="{{ route('home') }}">
                    {{ config('app.name', 'Laravel') }} - Verhuurportaal
                </a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                    <ul class="navbar-nav mr-auto">
                        &nbsp;
                    </ul>

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <i class="fe fe-inbox"></i>

                                <span style="margin-top: -.25rem;" class="badge ml-1 align-middle badge-pill badge-notifications">
                                    0
                                </span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('notifications.index') }}">
                                <i class="fe fe-bell"></i>

                                <span style="margin-top: -.25rem;" class="badge ml-1 align-middle badge-pill badge-notifications">
                                    {{ $currentUser->unreadNotifications->count() }}
                                </span>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="accountDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ $currentUser->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="accountDropdown">
                                <a class="dropdown-item" href="{{ route('users.account.info', $currentUser) }}">
                                    <i class="fe fe-sliders mr-1 text-secondary"></i> Instellingen
                                </a>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fe text-danger mr-1 fe-power"></i> Afmelden
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf {{-- Form field protection --}}
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="nav-scroller bg-green shadow-sm">
                <nav class="nav nav-underline">
                    <a class="nav-link {{ active('home') }}" href="{{ route('home') }}">
                        <i class="fe fe-home mr-1"></i> Dashboard
                    </a>

                    <a class="nav-link {{ active('users*') }}" href="{{ route('users.index') }}">
                        <i class="fe fe-users mr-1"></i> Logins
                    </a>
                    
                    <a class="nav-link {{ active('lease*') }}" href="{{ route('lease.dashboard') }}">
                        <i class="fe fe-calendar mr-1"></i> Verhuringen
                    </a>

                    <a class="nav-link {{ active(['tenants*', 'tenant*']) }}" href="{{ route('tenants.dashboard') }}">
                        <i class="fe fe-user mr-1"></i> Huurders
                    </a>

                    <a class="nav-link" href="">
                        <i class="fe fe-home mr-1"></i> Lokalen
                    </a> 

                    <a class="nav-link" href="">
                        <i class="fe fe-alert-triangle mr-1"></i> Werkpunten
                    </a>

                    @hasanyrole('webmaster')
                        <a class="nav-link" href="">
                            <i class="fe fe-activity mr-1"></i> Audit
                        </a>
                    @endhasanyrole
                </nav>
            </div>

            <main role="main">
                @yield('content')
            </main>

            <footer class="footer">
                <div class="container-fluid">
                    <span class="copyright">&copy; {{ date('Y') }}, {{ config('app.name') }}</span>

                    <div class="float-right">
                        <span class="copyright">v1.0.0</span>

                        @if (app()->isLocal() && $currentUser->hasRole('webmaster'))
                            <span class="copyright px-2">-</span>
                            <span class="text-danger font-weight-bold">
                                <i class="fe mr-1 fe-alert-triangle"></i> Lokale omgeving
                            </span>
                        @endif
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>