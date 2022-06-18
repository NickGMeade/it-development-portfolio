<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li><li class="nav-item">
    <a href="{{ route('api.index') }}" class="nav-link {{ Request::is('api') ? 'active' : '' }}">
        <i class="nav-icon fas fa-code"></i>
        <p>API</p>
    </a>
</li><li class="nav-item">
    </a>    <a href="{{ route('hourlyReports.index') }}" class="nav-link {{ Request::is('api') ? 'active' : '' }}">
        <i class="nav-icon fas fa-clipboard-check"></i>
        <p>Hourly Reports</p>
    </a>
</li>
