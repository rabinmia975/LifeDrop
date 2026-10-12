<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin') — LifeDrop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0/dist/css/tabler.min.css">
    <style>
        .navbar-brand img { height: 36px; }
    </style>
</head>
<body class="theme-light">
    <div class="page">
        <!-- Sidebar -->
        <aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark">
                    <a href="{{ route('admin.dashboard') }}">
                        Life<span class="text-danger">Drop</span> Admin
                    </a>
                </h1>
                <div class="navbar-nav flex-row d-lg-none">
                </div>
                <div class="collapse navbar-collapse" id="sidebar-menu">
                    <ul class="navbar-nav pt-lg-3">
                        <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><rect x="4" y="4" width="16" height="16" rx="2"/><rect x="4" y="4" width="16" height="16" rx="2"/><path d="M4 13h3l3 3h4l3 -3h3"/></svg></span>
                                <span class="nav-link-title">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('admin.donors.*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.donors.index') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22a7 7 0 0 0 7-7c0-2-1-3.9-3-5.5s-3.5-4-4-6.5c-.5 2.5-2 4.9-4 6.5C6 11.1 5 13 5 15a7 7 0 0 0 7 7z"/></svg></span>
                                <span class="nav-link-title">Donors</span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('admin.requests.*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.requests.index') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><path d="M8 9h8"/><path d="M8 13h6"/><path d="M18 4l3 3-3 3"/><path d="M18 4H6a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h12a3 3 0 0 0 3-3"/></svg></span>
                                <span class="nav-link-title">Blood Requests</span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.users.index') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><circle cx="12" cy="8" r="4"/><path d="M6 20a6 6 0 0 1 12 0"/></svg></span>
                                <span class="nav-link-title">Users</span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('admin.blood-banks.*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.blood-banks.index') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><path d="M12 21s-7-6.5-7-11a7 7 0 0 1 14 0c0 4.5-7 11-7 11z"/><circle cx="12" cy="10" r="2.5"/></svg></span>
                                <span class="nav-link-title">Blood Banks</span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.settings.edit') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 0 0-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 0 0-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 0 0-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 0 0-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 0 0 1.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><circle cx="12" cy="12" r="3"/></svg></span>
                                <span class="nav-link-title">Settings</span>
                            </a>
                        </li>
                    </ul>
                    <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-md-first">
                        <a class="btn btn-outline-secondary w-100" href="{{ route('home') }}" target="_blank">
                            View Website
                        </a>
                    </div>
                </div>
            </div>
        </aside>

        <div class="page-wrapper">
            <!-- Header -->
            <header class="navbar navbar-expand d-none d-lg-flex d-print-none">
                <div class="container-xl">
                    <div class="navbar-nav flex-row order-md-last">
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown">
                                <span class="avatar avatar-sm bg-red-lt">
                                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                                </span>
                                <div class="d-none d-xl-block ps-2">
                                    <div>{{ auth()->user()->name }}</div>
                                    <div class="mt-1 small text-muted">Administrator</div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <form method="POST" action="{{ route('admin.logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Sign out</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <div>{{ session('success') }}</div>
                            <a class="btn-close" data-bs-dismiss="alert" aria-label="Close"></a>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <div>{{ session('error') }}</div>
                            <a class="btn-close" data-bs-dismiss="alert" aria-label="Close"></a>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0/dist/js/tabler.min.js" defer></script>
</body>
</html>
