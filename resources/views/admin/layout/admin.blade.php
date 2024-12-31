<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
    <div class="admin-container">
        <nav class="admin-sidebar">
            <div class="admin-brand">
                <h2>Admin Panel</h2>
            </div>
            <ul class="nav-links">
                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('admin.products.index') }}">Products</a></li>
                <li><a href="{{ route('admin.orders.index') }}">Orders</a></li>
                <li><a href="{{ route('admin.users.index') }}">Users</a></li>
                <li><a href="{{ route('admin.reports') }}">Reports</a></li>
                <li><a href="{{ route('admin.settings') }}">Settings</a></li>
            </ul>
        </nav>

        <main class="admin-main">
            <header class="admin-header">
                <div class="user-info">
                    <span>Welcome, {{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </div>
            </header>

            <div class="admin-content">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
