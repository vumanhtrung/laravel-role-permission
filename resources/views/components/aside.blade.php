<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
        <img src="https://adminlte.io/themes/v3/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminCpanel</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="https://adminlte.io/themes/v3/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->is("*/dashboard") ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{ __('Dashboard') }}
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                <li class="nav-item  {{ request()->is("*/permissions*") || request()->is("*/roles*") || request()->is("*/users*") ? 'menu-open' : '' }}">
                    <a href="javascript:;" class="nav-link {{ request()->is("*/permissions*") || request()->is("*/roles*") || request()->is("*/users*") ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            {{ __('User Management') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('permission_access')
                        <li class="nav-item">
                            <a href="{{ route('admin.permissions.index') }}" class="nav-link {{ request()->is("*/permissions*") ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Permissions') }}</p>
                            </a>
                        </li>
                        @endcan
                        @can('role_access')
                        <li class="nav-item">
                            <a href="{{ route('admin.roles.index') }}" class="nav-link {{ request()->is("*/roles*") ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Roles') }}</p>
                            </a>
                        </li>
                        @endcan
                        @can('user_access')
                        <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->is("*/users*") ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Users') }}</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan
                @can('post_access')
                <li class="nav-item">
                    <a href="{{ route('admin.posts.index') }}" class="nav-link {{ request()->is("*/posts*") ? 'active' : '' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            {{ __('Posts') }}
                        </p>
                    </a>
                </li>
                @endcan
                <li class="nav-item">
                    <form id="logout" method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <a href="javascript:;" class="nav-link" onclick="document.getElementById('logout').submit();">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>{{ __('Logout') }}</p>
                        </a>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>
