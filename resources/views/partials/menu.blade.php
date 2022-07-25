<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route('admin.home') }}" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('users_manage')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-users nav-icon">

                        </i>
                        {{ trans('cruds.userManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a href="{{ route('admin.permissions.index') }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-unlock-alt nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.roles.index') }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-briefcase nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-user nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    </ul>
                </li>
            @endcan
            @can('category_manage')
                <li class="nav-item nav-dropdown">
                    <a href="{{ route('admin.category.index') }}" class="nav-link {{ request()->is('admin/category') || request()->is('admin/category/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-users nav-icon">

                        </i>
                        {{ trans('cruds.category.title') }}
                    </a>
                    
                </li>
            @endcan
            @can('blog_manage')
                <li class="nav-item nav-dropdown">
                    <a href="{{ route('admin.blog.index') }}" class="nav-link {{ request()->is('admin/blog') || request()->is('admin/blog/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-users nav-icon">

                        </i>
                        {{ trans('cruds.blog.title') }}
                    </a>
                    
                </li>
            @endcan
            @can('services_manage')
                <li class="nav-item nav-dropdown">
                    <a href="{{ route('admin.services.index') }}" class="nav-link {{ request()->is('admin/services') || request()->is('admin/services/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-users nav-icon">

                        </i>
                        {{ trans('cruds.service.title') }}
                    </a>
                    
                </li>
            @endcan
            @can('server_manage')
                <li class="nav-item nav-dropdown">
                    <a href="{{ route('admin.server.index') }}" class="nav-link {{ request()->is('admin/server') || request()->is('admin/server/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-users nav-icon">

                        </i>
                        {{ trans('cruds.server.title') }}
                    </a>
                    
                </li>
            @endcan
            @can('country_manage')
                <li class="nav-item nav-dropdown">
                    <a href="{{ route('admin.country.index') }}" class="nav-link {{ request()->is('admin/county') || request()->is('admin/country/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-users nav-icon">

                        </i>
                        {{ trans('cruds.country.title') }}
                    </a>
                    
                </li>
            @endcan
            @can('coupon_manage')
                <li class="nav-item nav-dropdown">
                    <a href="{{ route('admin.coupon.index') }}" class="nav-link {{ request()->is('admin/coupon') || request()->is('admin/coupon/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-users nav-icon">

                        </i>
                        {{ trans('cruds.coupon.title') }}
                    </a>
                    
                </li>
            @endcan
            @can('ip_manage')
                <li class="nav-item nav-dropdown">
                    <a href="{{ route('admin.ipaddress.index') }}" class="nav-link {{ request()->is('admin/ipaddress') || request()->is('admin/ipaddress/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-users nav-icon">

                        </i>
                        {{ trans('cruds.ipaddress.title') }}
                    </a>
                    
                </li>
            @endcan
            <li class="nav-item">
                <a href="{{ route('auth.change_password') }}" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-key">

                    </i>
                    Change password
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>