<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Resto Isro</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">RI</a>
        </div>
        <ul class="sidebar-menu">
            {{-- <li class="menu-header">Dashboard</li> --}}
            <li class="{{ Route::is('home') ? 'active' : '' }}">
                <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-fire"></i>Dashboard</a>
            </li>
            
            {{-- Menu User --}}
            <li class="{{ Route::is('users.*') ? 'active' : '' }}">
                <a href="{{ route('users.index') }}" class="nav-link"><i class="fas fa-users"></i>Users</a>
            </li>

            {{-- Menu Catgory --}}
            <li class="{{ Route::is('categories.*') ? 'active' : '' }}">
                <a href="{{ route('categories.index') }}" class="nav-link"><i class="fas fa-chart-pie"></i>Category</a>
            </li>

            {{-- Menu Product --}}
            <li class="{{ Route::is('products.*') ? 'active' : '' }}">
                <a href="{{ route('products.index') }}" class="nav-link"><i class="fas fa-utensils"></i>Products</a>
            </li>
        </ul>

        <div class="hide-sidebar-mini mt-4 mb-4 p-3">
            <a href="https://getstisla.com/docs"
                class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div>
    </aside>
</div>
