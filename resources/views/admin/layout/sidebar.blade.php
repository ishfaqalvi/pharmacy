<li class="nav-item-header pt-0">
    <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Main</div>
    <i class="ph-dots-three sidebar-resize-show"></i>
</li>
<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : ''}}" href="{{ route('dashboard') }}">
        <i class="ph-house"></i>
        <span>Dashboard</span>
    </a>
</li>
@canany(['brands-list','brands-popularList'])
<li class="nav-item nav-item-submenu {{ request()->is('admin/brands*') ? 'nav-item-open' : ''}}">
    <a href="#" class="nav-link">
        <i class="ph-article"></i>
        <span>Brands</span>
    </a>
    <ul class="nav-group-sub collapse {{ request()->is('admin/brands*') ? 'show' : ''}}">
        @can('brands-list')
            <li class="nav-item">
                <a 
                    href ="{{ route('brands.all.index') }}" 
                    class="nav-link {{ request()->routeIs('brands.all*') ? 'active' : ''}}">
                    Complete List
                </a>
            </li>
        @endcan
        @can('brands-popularList')
            <li class="nav-item">
                <a 
                    href="{{ route('brands.popular.index') }}"
                    class="nav-link {{ request()->routeIs('brands.popular.index*') ? 'active' : ''}}">
                    Popular
                </a>
            </li>
        @endcan
    </ul>
</li>
@endcanany
@canany(['categories-list','categories-subList'])
<li class="nav-item nav-item-submenu {{ request()->is('admin/categories*') ? 'nav-item-open' : ''}}">
    <a href="#" class="nav-link">
        <i class="ph-article"></i>
        <span>Categories</span>
    </a>
    <ul class="nav-group-sub collapse {{ request()->is('admin/categories*') ? 'show' : ''}}">
        @can('categories-list')
            <li class="nav-item">
                <a 
                    href ="{{ route('categories.all.index') }}" 
                    class="nav-link {{ request()->routeIs('categories.all*') ? 'active' : ''}}">
                    Main
                </a>
            </li>
        @endcan
        @can('categories-subList')
            <li class="nav-item">
                <a 
                    href="{{ route('categories.sub.index') }}"
                    class="nav-link {{ request()->routeIs('categories.sub*') ? 'active' : ''}}">
                    Sub
                </a>
            </li>
        @endcan
    </ul>
</li>
@endcanany
@canany(['products-list','products-specialList'])
<li class="nav-item nav-item-submenu {{ request()->is('admin/products*') ? 'nav-item-open' : ''}}">
    <a href="#" class="nav-link">
        <i class="ph-article"></i>
        <span>Products</span>
    </a>
    <ul class="nav-group-sub collapse {{ request()->is('admin/products*') ? 'show' : ''}}">
        @can('products-list')
            <li class="nav-item">
                <a 
                    href ="{{ route('products.all.index') }}" 
                    class="nav-link {{ request()->routeIs('products.all*') ? 'active' : ''}}">
                    Complete List
                </a>
            </li>
        @endcan
        @can('products-specialList')
            <li class="nav-item">
                <a 
                    href="{{ route('products.special.frequently') }}"
                    class="nav-link {{ request()->routeIs('products.special.frequently*') ? 'active' : ''}}">
                    Frequently Orderd
                </a>
            </li>
            <li class="nav-item">
                <a 
                    href="{{ route('products.special.featured') }}"
                    class="nav-link {{ request()->routeIs('products.special.featured*') ? 'active' : ''}}">
                    Featured
                </a>
            </li>
            <li class="nav-item">
                <a 
                    href="{{ route('products.special.wellness') }}"
                    class="nav-link {{ request()->routeIs('products.special.wellness*') ? 'active' : ''}}">
                    Wellness
                </a>
            </li>
            <li class="nav-item">
                <a 
                    href="{{ route('products.special.men&woman') }}"
                    class="nav-link {{ request()->routeIs('products.special.men&woman*') ? 'active' : ''}}">
                    Men & Woman
                </a>
            </li>
        @endcan
    </ul>
</li>
@endcanany
@can('sliders.list')
<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('sliders') ? 'active' : ''}}" href="{{ route('sliders.index') }}">
        <i class="ph-house"></i>
        <span>Sliders</span>
    </a>
</li>
@endcan
@canany(['roles-list', 'users-list'])
<li class="nav-item-header">
    <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Access Management</div>
    <i class="ph-dots-three sidebar-resize-show"></i>
</li>
@endcanany
@can('roles-list')
<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('roles*') ? 'active' : ''}}" href="{{ route('roles.index') }}">
        <i class="ph-atom"></i>
        <span>Roles</span>
    </a>
</li>
@endcan
@can('users-list')
<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('users*') ? 'active' : ''}}" href="{{ route('users.index') }}">
        <i class="ph-users"></i>
        <span>Users</span>
    </a>
</li>
@endcan
@canany(['notifications-list','audits-list', 'logs-list'])
<li class="nav-item-header">
    <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Configuration</div>
    <i class="ph-dots-three sidebar-resize-show"></i>
</li>
@endcanany
@can('audits-list')
<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('notifications*') ? 'active' : ''}}" href="{{ route('notifications.index') }}">
        <i class="ph-bell"></i>
        <span>Notifications</span>
    </a>
</li>
@endcan
@can('audits-list')
<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('audits*') ? 'active' : ''}}" href="{{ route('audits.index') }}">
        <i class="ph-diamonds-four"></i>
        <span>Audit</span>
    </a>
</li>
@endcan
@can('logs-list')
<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('logs*') ? 'active' : ''}}" href="{{ route('logs') }}" target="_blank">
        <i class="ph-bug"></i>
        <span>Errors</span>
    </a>
</li>
@endcan
<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('settings*') ? 'active' : ''}}" href="{{ route('settings.index') }}">
        <i class="ph-gear"></i>
        <span>Settings</span>
    </a>
</li>
