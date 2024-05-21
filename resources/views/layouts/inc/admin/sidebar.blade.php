<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/dashboard') }}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin/orders') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/orders') }}">
                <i class="mdi mdi-sale menu-icon"></i>
                <span class="menu-title">Orders</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin/category*') ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" data-bs-target="#category"
                aria-expanded="{{ Request::is('admin/category*') ? 'true' : 'flase' }}">
                <i class=" mdi mdi-view-grid menu-icon"></i>
                <span class="menu-title">Category</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Request::is('admin/category*') ? 'show' : '' }}" id="category">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/category/create') ? 'active' : '' }}"
                            href="{{ url('admin/category/create') }}">Add Category</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/category') || Request::is('admin/category/*/edit') ? 'active' : '' }}"
                            href="{{ url('admin/category/') }}">View Category</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item {{ Request::is('admin/products*') ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" data-bs-target="#products"
                aria-expanded="{{ Request::is('admin/products*') ? 'true' : 'flase' }}">
                <i class=" mdi mdi-cart-plus menu-icon"></i>
                <span class="menu-title">Products</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Request::is('admin/products*') ? 'show' : '' }}" id="products">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item {{ Request::is('admin/products/create') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('admin/products/create') }}">Add Product</a>
                    </li>

                    <li
                        class="nav-item {{ Request::is('admin/products') || Request::is('admin/products/*/edit') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('admin/products') }}">View Product</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item {{ Request::is('admin/brands') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/brands') }}">
                <i class="mdi mdi-view-headline menu-icon"></i>
                <span class="menu-title">Brands</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin/colors') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/colors') }}">
                <i class="mdi mdi-view-headline menu-icon"></i>
                <span class="menu-title">Colors</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin/users*') ? 'active':'' }}">
            <a class="nav-link" data-bs-toggle="collapse" data-bs-target="#users"
                aria-expanded=" {{ Request::is('admin/users*') ? 'true':'false' }}" aria-controls="users">

                <i class="mdi mdi-account menu-icon"></i>
                <span class="menu-title">Users</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Request::is('admin/users*') ? 'show':'' }}" id="users">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/users/create') ? 'active':'' }}"
                            href="{{ url('admin/users/create') }}">
                            Add User </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/users') || Request::is('admin/users/*/edit') ? 'active':'' }}"
                            href="{{ url('admin/users') }}">
                            View Users </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item {{ Request::is('admin/sliders') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/sliders') }}">
                <i class="mdi mdi-view-carousel  menu-icon"></i>
                <span class="menu-title">Home Slider</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin/settings') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/settings') }}">
                <i class="mdi mdi-settings menu-icon"></i>
                <span class="menu-title">Site Setting</span>
            </a>
        </li>

        <li class="nav-item {{ Request::is('admin/attributes*') ? 'active':'' }}">
            <a class="nav-link" data-bs-toggle="collapse" data-bs-target="#attributes"
                aria-expanded=" {{ Request::is('admin/attributes*') ? 'true':'false' }}" aria-controls="attributes">

                <i class="mdi mdi-store menu-icon"></i>
                <span class="menu-title">Attributes</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Request::is('admin/attributes*') ? 'show':'' }}" id="attributes">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/attributes/create') ? 'active':'' }}"
                            href="{{ url('admin/attributes/create') }}">
                            Add Attributes </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/attributes') || Request::is('admin/attributes/*/edit') ? 'active':'' }}"
                            href="{{ url('admin/attributes') }}">
                            View Attributes </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/attributes/create_details') ? 'active':'' }}"
                            href="{{ url('admin/attributes/create_details') }}">
                            Add Attribute_Details </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/attributes_details') || Request::is('admin/attributes/details/*/edit') ? 'active':'' }}"
                            href="{{ url('admin/attributes/details') }}">
                            View Attributes_Details </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
