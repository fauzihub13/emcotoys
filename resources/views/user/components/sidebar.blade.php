<div class="sidebar">
    <ul class="ps-0">
        <li class="sidebar-item {{ $type_menu == 'account' ? 'active' : '' }}">
            <a href="" class='sidebar-link'>
                <i class="fas fa-user-alt"></i>
                <span>Profile</span>
            </a>
        </li>
        <li class="sidebar-item {{ $type_menu == 'cart' ? 'active' : '' }}">
            <a href="" class='sidebar-link'>
                <i class="fas fa-shopping-cart"></i>
                <span>My Cart</span>
            </a>
        </li>
        <li class="sidebar-item {{ $type_menu == 'history' ? 'active' : '' }}">
            <a href="" class='sidebar-link'>
                <i class="fas fa-shopping-bag"></i>
                <span>Transaction History</span>
            </a>
        </li>
        <li class="sidebar-item ">
            <a href="" class='sidebar-link'>
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </li>
    </ul>
</div>
