<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
          
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
            @can('time_manage')
                <li class="nav-item nav-dropdown">
                    <a href="{{ route('admin.time.index') }}" class="nav-link {{ request()->is('admin/time') || request()->is('admin/time/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-users nav-icon">

                        </i>
                        {{ trans('cruds.time.title') }}
                    </a>
                    
                </li>
            @endcan
            @can('post_manage')
                <li class="nav-item nav-dropdown">
                    <a href="{{ route('admin.post.index') }}" class="nav-link {{ request()->is('admin/post') || request()->is('admin/post/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-users nav-icon">

                        </i>
                        {{ trans('cruds.post.title') }}
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
            @can('payment_manage')
                <li class="nav-item nav-dropdown">
                    <a href="{{ route('admin.payment.index') }}" class="nav-link {{ request()->is('admin/payment') || request()->is('admin/payment/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-users nav-icon">

                        </i>
                        {{ trans('cruds.payment.title') }}
                    </a>
                    
                </li>
            @endcan
            @can('orders_manage')
                <li class="nav-item nav-dropdown">
                    <a href="{{ route('admin.orders.index') }}" class="nav-link {{ request()->is('admin/orders') || request()->is('admin/orders/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-users nav-icon">

                        </i>
                        {{ trans('cruds.order.title') }}
                    </a>
                </li>
            @endcan
            @can('member_manage')
                <li class="nav-item nav-dropdown">
                    <a href="{{ route('admin.member.index') }}" class="nav-link {{ request()->is('admin/member') || request()->is('admin/member/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-users nav-icon">

                        </i>
                        {{ trans('cruds.member.title') }}
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
            @can('setting_manage')
                <li class="nav-item nav-dropdown">
                    <a href="{{ route('admin.setting.index') }}" class="nav-link {{ request()->is('admin/setting') || request()->is('admin/setting/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-users nav-icon">

                        </i>
                        {{ trans('cruds.setting.title') }}
                    </a>
                </li>
            @endcan
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