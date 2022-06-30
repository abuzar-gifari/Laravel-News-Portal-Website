<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('author_home') }}">Author Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="{{ Request::is('author/home') ? 'active' : '' }}"><a class="nav-link" href="{{ route('author_home') }}"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a></li>

        </ul>
    </aside>
</div>