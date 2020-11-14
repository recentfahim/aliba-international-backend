<div class="scrollbar-sidebar">
    <div class="app-sidebar__inner">
        <ul class="vertical-nav-menu">
            <li class="app-sidebar__heading">Settings</li>
            <li>
                <a href="{{ route('currency.index') }}">
                    <i class="metismenu-icon fas fa-yen-sign"></i>
                    </i>Currency Conversion
                </a>
            </li>
            <li>
                <a href="{{ route('location.index') }}">
                    <i class="metismenu-icon fas fa-map-marker-alt"></i>
                    </i>Location
                </a>
            </li>
            <li class="app-sidebar__heading">Orders</li>
            <li>
                <a href="{{ route('admin.order') }}">
                    <i class="metismenu-icon fas fa-list-ol"></i>
                    Orders
                </a>
            </li>
            <li>
                <a href="{{ route('admin.order_payment') }}">
                    <i class="metismenu-icon far fa-credit-card"></i>
                    Order Payments
                </a>
            </li>
            <li>
                <a href="{{ route('admin.order_product') }}">
                    <i class="metismenu-icon fab fa-product-hunt"></i>
                    Order Products
                </a>
            </li>
            <li>
                <a href="{{ route('admin.payment_history') }}">
                    <i class="metismenu-icon fas fa-history"></i>
                    Payment History
                </a>
            </li>
            <li class="app-sidebar__heading">Users</li>
            <li>
                <a href="{{ route('admin.user') }}">
                    <i class="metismenu-icon far fa-user-circle"></i>
                    Users
                </a>
            </li>
            <li>
                <a href="{{ route('admin.user_address') }}">
                    <i class="metismenu-icon far fa-address-book"></i>
                    Address
                </a>
            </li>
        </ul>
    </div>
</div>
