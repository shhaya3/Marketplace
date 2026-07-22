<nav class="navbar">
    <div class="navbar-inner">
        <a href="{{ route('home') }}" class="brand">
            <div class="brand-mark">🏪</div>
            Biz<span class="brand-accent">Market</span>
        </a>
        <ul class="nav-links">
            <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ route('templates.index') }}" class="{{ request()->routeIs('templates*') ? 'active' : '' }}">Templates</a></li>
            <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>
            <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
        </ul>
        <div class="nav-right">
            @auth
                <a href="{{ route('admin.dashboard') }}" class="btn btn-ghost btn-sm">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-sm">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-ghost btn-sm">Admin Login</a>
                <a href="{{ route('contact') }}" class="btn btn-primary btn-sm">Get in touch</a>
            @endauth
        </div>
    </div>
</nav>