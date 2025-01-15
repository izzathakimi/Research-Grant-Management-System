<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Research Grant Management System</title>
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-light bg-light static-top">
            <div class="container">
                <a class="navbar-brand" href="#!">Research Grant Management System</a>
                @if (Route::has('login'))
                    <div>
                        @auth
                        <div class="dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle btn btn-light" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('academicians.index') }}">
                                    <i class="bi bi-people"></i> View Academicians
                                </a>
                                <a class="dropdown-item" href="{{ route('researchgrants.index') }}">
                                    <i class="bi bi-file-text"></i> View Research Grants
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary me-2">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-outline-primary">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </nav>

        <!-- Masthead-->
        <header class="masthead">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="text-center text-white">
                            <h1 class="mb-5">Research Grant Management System</h1>
                            <!-- Buttons styled with Bootstrap -->
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <a href="{{ route('academicians.index') }}" class="btn btn-light btn-lg w-100">
                                        <i class="bi bi-people"></i>
                                        View Academicians
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('researchgrants.index') }}" class="btn btn-light btn-lg w-100">
                                        <i class="bi bi-file-text"></i>
                                        View Research Grants
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
