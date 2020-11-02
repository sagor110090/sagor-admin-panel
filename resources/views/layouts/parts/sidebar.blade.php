<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="{{ url('/dashboard') }}"> <img  src=""
                class="header-logo" /> <span class="logo-name">{{ config('app.name') }}</span>
        </a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Main</li>
        <li class="dropdown {{ Request::is('dashboard') ? 'active':''}}">
            <a href="{{ url('/dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
        </li>
        <li class="menu-header">Administration</li>
        @if (Auth::user()->role == 'Super Admin')
        <li class="dropdown {{ Request::is('admin/user*') ? 'active':''}}">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="user"></i><span>User
                    Management</span></a>
            <ul class="dropdown-menu">
                <li class="{{ Request::is('admin/user/create*') ? 'active':''}}"><a class="nav-link"
                        href="{{ url('admin/user/create') }}">New User</a></li>
                <li class="{{ Request::is('admin/user') ? 'active':''}}"><a class="nav-link"
                        href="{{ url('admin/user') }}">User List</a></li>
            </ul>
        </li>
        <li class="dropdown {{ Request::is('admin/role*') ? 'active':''}}">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="user-check"></i><span>Role
                    Management</span></a>
            <ul class="dropdown-menu">
                <li class="{{ Request::is('admin/role/create*') ? 'active':''}}"><a class="nav-link"
                        href="{{ url('admin/role/create') }}">New Role</a></li>
                <li class="{{ Request::is('admin/role') ? 'active':''}}"><a class="nav-link"
                        href="{{ url('admin/role') }}">Role List</a></li>
            </ul>
        </li>
        {{-- <li class="dropdown {{ Request::is('admin/activities*') ? 'active':''}}">
            <a href="{{ url('admin/activities') }}" class="nav-link"><i data-feather="mail"></i><span>Activities
                </span></a>
        </li>
        <li class="dropdown {{ Request::is('admin/email*') ? 'active':''}}">
            <a href="{{ url('admin/email/send') }}" class="nav-link"><i data-feather="mail"></i><span>Email
                    Management</span></a>
        </li> --}}
        @endif
        <li class="menu-header">System</li>


                {{-- <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
        href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-television-guide"></i><span
            class="hide-menu">Test</span></a>
    <ul aria-expanded="false" class="collapse  first-level">
        @if (Helpers::isAdmin())
        <li class="sidebar-item"><a href="{{ url("admin/test/create") }}" class="sidebar-link"><i
                    class="mdi mdi-note-outline"></i><span class="hide-menu">New Test
                </span></a></li>
        @endif
        <li class="sidebar-item"><a href="{{ url("admin/test") }}" class="sidebar-link"><i
                    class="mdi mdi-note-plus"></i><span class="hide-menu">Test List
                </span></a></li>
    </ul>
</li> --}}
@if(Helper::authCheck("test1-show") || Helper::authCheck("test1-create")) <li class="dropdown {{ Request::is("admin/test1*") ? "active":""}}"> <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>Test1 </span></a><ul class="dropdown-menu"> @if(Helper::authCheck("test1-create"))<li class="{{ Request::is("admin/test1/create*") ? "active":""}}"><a class="nav-link" href="{{ url("admin/test1/create") }}">New Test1</a></li> @endif  @if(Helper::authCheck("test1-show")) <li class="{{ Request::is("admin/test1") ? "active":""}}"><a class="nav-link" href="{{ url("admin/test1") }}">Test1 List</a></li> @endif </ul></li> @endif