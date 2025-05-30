<div class="sidebar">
    <ul class="ps-0">
        <li class="sidebar-item {{ $type_menu == 'account' ? 'active' : '' }}">
            <a href="{{ route ('profile')}}" class='sidebar-link'>
                <i class="fas fa-user-alt"></i>
                <span>Profile</span>
            </a>
        </li>
        <li class="sidebar-item {{ $type_menu == 'cart' ? 'active' : '' }}">
            <a href="{{ route ('cart')}}" class='sidebar-link'>
                <i class="fas fa-shopping-cart"></i>
                <span>My Cart</span>
            </a>
        </li>
        <li class="sidebar-item {{ $type_menu == 'history' ? 'active' : '' }}">
            <a href="{{ route ('history')}}" class='sidebar-link'>
                <i class="fas fa-shopping-bag"></i>
                <span>Transaction History</span>
            </a>
        </li>
        <li class="sidebar-item ">
            <a href="" class='sidebar-link' onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
                <form id="logout-form"
                    action="{{ route('logout') }}"
                    method="POST"
                    style="display: none">
                    @csrf
                </form>
            </a>
        </li>
    </ul>
</div>
