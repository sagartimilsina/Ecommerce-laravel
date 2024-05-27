<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('admin_dashboard') }}" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bolder ms-2 text-capitalize">E-Site</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item {{ request()->routeIs('admin_dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin_dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        {{-- <li class="menu-item {{ request()->routeIs('users*') ? 'active' : '' }}">
            <a href="{{ route('users.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Manage User</div>
            </a>
        </li> --}}
        <li class="menu-item {{ request()->routeIs('categories*') ? 'active' : '' }}">
            <a href="{{ route('categories.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Manage Category</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('products*') ? 'active' : '' }}">
            <a href="{{ route('products.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Manage Products</div>
            </a>
        </li>

        <li
            class="menu-item {{ request()->routeIs('pending_order*') || request()->routeIs('delivered_order*') || request()->routeIs('cancel_order*') ? 'active' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Manage Orders</div>
            </a>
            <ul class="menu-sub"
                style="display: {{ request()->routeIs('pending_order*') || request()->routeIs('delivered_order*') || request()->routeIs('cancel_order*') ? 'block' : 'none' }};">
                <li class="menu-item {{ request()->routeIs('pending_order*') ? 'active' : '' }}">
                    <a href="{{ route('pending_order') }}" class="menu-link">
                        <div data-i18n="Without menu">Pending Order Lists</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('delivered_order*') ? 'active' : '' }}">
                    <a href="{{ route('delivered_order') }}" class="menu-link">
                        <div data-i18n="Without menu">Delivered Order Lists</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('cancel_order*') ? 'active' : '' }}">
                    <a href="{{ route('cancel_order') }}" class="menu-link">
                        <div data-i18n="Without menu">Cancel Order Lists</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const menuItems = document.querySelectorAll(".menu-item");
        const menuSubs = document.querySelectorAll(".menu-sub");

        menuItems.forEach(function(menuItem, index) {
            menuItem.addEventListener("click", function(event) {
                event.stopPropagation();
                const submenu = menuItem.querySelector(".menu-sub");

                if (submenu) {
                    if (menuItem.classList.contains("active")) {
                        submenu.style.display = "none";
                        menuItem.classList.remove("active");
                    } else {
                        menuSubs.forEach(sub => sub.style.display = "none");
                        menuItems.forEach(item => item.classList.remove("active"));

                        submenu.style.display = "block";
                        menuItem.classList.add("active");
                    }
                } else {
                    menuItems.forEach(item => item.classList.remove("active"));
                    menuItem.classList.add("active");
                }
            });
        });

        document.querySelectorAll(".menu-sub .menu-item").forEach(function(subItem) {
            subItem.addEventListener("click", function(event) {
                event.stopPropagation();
                document.querySelectorAll(".menu-sub .menu-item").forEach(item => item.classList
                    .remove("active"));
                subItem.classList.add("active");
            });
        });
    });
</script>
