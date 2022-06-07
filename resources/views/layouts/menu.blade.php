<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('api') ? 'active' : '' }}">
        <i class="nav-icon fas fa-code"></i>
        <p>API</p>
    </a>
</li>
