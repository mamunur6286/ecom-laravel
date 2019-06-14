<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="sidebar-menu">
        <li class="header">MAIN MENU</li>
        <li class="treeview">
            <a href="{{ url('/home') }}">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
        <li><a href="{{ route('admin-categories.index') }}"><i class="fa fa-product-hunt"></i>Category</a></li>
        <li><a href="{{ route('admin-products.index') }}"><i class="fa fa-product-hunt"></i>Products</a></li>
        <li><a href="{{ route('admin-user.index') }}"><i class="fa fa-product-hunt"></i>User</a></li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Transactions </span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('admin-transaction.index') }}"><i class="fa fa-angle-right"></i> Pending Transactions</a></li>
                <li><a href="{{ route('admin-transaction.create') }}"><i class="fa fa-angle-right"></i>Success Transactions</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Orders</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('admin-order.index') }}"><i class="fa fa-angle-right"></i> Pending Order</a></li>
                <li><a href="{{ route('admin-order.create') }}"><i class="fa fa-angle-right"></i>Success Order</a></li>
            </ul>
        </li>
        <li><a href="{{ route('admin-contact.index') }}"><i class="fa fa-product-hunt"></i>Contact</a></li>
        <li><a href="{{ route('user-messages.index') }}"><i class="fa fa-product-hunt"></i>User Messages</a></li>

        <li><a href="{{ route('sliders.index') }}"><i class="fa fa-product-hunt"></i>Slider</a></li>
        <li><a href="{{ route('setting.create') }}"><i class="fa fa-product-hunt"></i>Setting</a></li>

        <li>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out"></i>Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>
</div>