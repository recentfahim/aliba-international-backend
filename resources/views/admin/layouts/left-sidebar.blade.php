<div class="scrollbar-sidebar">
    <div class="app-sidebar__inner">
        <ul class="vertical-nav-menu">
            <li class="app-sidebar__heading">Settings</li>
            <li>
                <a href="{{ route('admin.currency') }}">
                    <i class="metismenu-icon pe-7s-graph2">
                    </i>Currency Conversion
                </a>
            </li>
            <li>
                <a href="{{ route('admin.location') }}">
                    <i class="metismenu-icon pe-7s-graph2">
                    </i>Location
                </a>
            </li>
            <li class="app-sidebar__heading">Orders</li>
            <li>
                <a href="{{ route('admin.order') }}">
                    <i class="metismenu-icon pe-7s-display2"></i>
                    Orders
                </a>
            </li>
            <li>
                <a href="{{ route('admin.order_payment') }}">
                    <i class="metismenu-icon pe-7s-display2"></i>
                    Order Payments
                </a>
            </li>
            <li>
                <a href="{{ route('admin.order_product') }}">
                    <i class="metismenu-icon pe-7s-display2"></i>
                    Order Products
                </a>
            </li>
            <li>
                <a href="{{ route('admin.payment_history') }}">
                    <i class="metismenu-icon pe-7s-display2"></i>
                    Payment History
                </a>
            </li>
            <li>
                <a href="dashboard-boxes.html">
                    <i class="metismenu-icon pe-7s-display2"></i>
                    Order Status
                </a>
            </li>
            <li class="app-sidebar__heading">Users</li>
            <li>
                <a href="{{ route('admin.user') }}">
                    <i class="metismenu-icon pe-7s-mouse">
                    </i>Users
                </a>
            </li>
            <li>
                <a href="{{ route('admin.user_address') }}">
                    <i class="metismenu-icon pe-7s-eyedropper">
                    </i>Address
                </a>
            </li>
        </ul>
    </div>
</div>
