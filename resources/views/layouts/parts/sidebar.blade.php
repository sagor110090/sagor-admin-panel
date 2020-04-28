<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html"> <img alt="image" src="{{ asset('assets') }}/img/logo.png" class="header-logo" /> <span
                class="logo-name">Otika</span>
        </a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Main</li>
        <li class="dropdown active">
            <a href="index.html" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
        </li>
        <li class="menu-header">Administration</li>
        <li class="dropdown {{ Request::is('admin/user*') ? 'active':''}}">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>User
                    Management</span></a>
            <ul class="dropdown-menu">
                <li class="{{ Request::is('admin/user/create*') ? 'active':''}}"><a class="nav-link"
                        href="{{ url('admin/user/create') }}">New User</a></li>
                <li class="{{ Request::is('admin/user') ? 'active':''}}"><a class="nav-link"
                        href="{{ url('admin/user') }}">User List</a></li>
            </ul>
        </li>
        <li class="dropdown {{ Request::is('admin/role*') ? 'active':''}}">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>Role
                    Management</span></a>
            <ul class="dropdown-menu">
                <li class="{{ Request::is('admin/role/create*') ? 'active':''}}"><a class="nav-link"
                        href="{{ url('admin/role/create') }}">New Role</a></li>
                <li class="{{ Request::is('admin/role') ? 'active':''}}"><a class="nav-link"
                        href="{{ url('admin/role') }}">Role List</a></li>
            </ul>
        </li>
        <li class="dropdown {{ Request::is('admin/email*') ? 'active':''}}">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>Email Management</span></a>
            <ul class="dropdown-menu">
                <li class="{{ Request::is('admin/email/send*') ? 'active':''}}"><a class="nav-link"
                        href="{{ url('admin/email/send') }}">Send Email</a></li>
                <li class="{{ Request::is('admin/email/mailbox') ? 'active':''}}"><a class="nav-link"
                        href="{{ url('admin/email/mailbox') }}">Email List</a></li>
            </ul>
        </li>

    </ul>
</aside>