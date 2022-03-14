<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link  {{ request()->is('admin') ? 'active' : '' }}" aria-current="page" href="/admin">
                    <i class="fa fa-home"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/elections/*') || request()->is('admin/elections') || request()->is('admin/election/*')? 'active': '' }} "
                    aria-current="page" href="{{ url('/admin/elections') }}">
                    <i class="fa fa-archive "></i>
                    Elections
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/candidates/*') ||request()->is('admin/candidates') ||request()->is('admin/candidate/*')? 'active': '' }}"
                    aria-current="page" href="{{ url('/admin/candidates') }}">
                    <i class="fa fa-users"></i>
                    Candidates
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/positions/*') || request()->is('admin/positions') || request()->is('admin/position/*')? 'active': '' }}"
                    aria-current="page" href="{{ url('/admin/positions') }}">
                    <i class="fa fa-id-badge"></i>
                    Postions
                </a>
            </li>

        </ul>

    </div>
</nav>
