<div class="card card-body" style="border: none; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <div class="list-group">
        <a href="{{ route('customer.dashboard') }}" class="list-group-item list-group-item-action active"
           style="background-color: #007bff; color: #fff;">
            <i class="fas fa-tachometer-alt"></i> My Dashboard
        </a>
        <a href="{{ route('customer.profile') }}" class="list-group-item list-group-item-action"
           style="background-color: #f8f9fa; color: #333;"
           onMouseOver="this.style.backgroundColor='#e2e6ea'"
           onMouseOut="this.style.backgroundColor='#f8f9fa'">
            <i class="fas fa-user"></i> My Profile
        </a>
        <a href="{{ route('customer.order') }}" class="list-group-item list-group-item-action"
           style="background-color: #f8f9fa; color: #333;"
           onMouseOver="this.style.backgroundColor='#d0d6db'"
           onMouseOut="this.style.backgroundColor='#f8f9fa'">
            <i class="fas fa-shopping-basket"></i> My Order
        </a>
        <a href="{{ route('customer.change-password') }}" class="list-group-item list-group-item-action"
           style="background-color: #f8f9fa; color: #333;"
           onMouseOver="this.style.backgroundColor='#d0d6db'"
           onMouseOut="this.style.backgroundColor='#f8f9fa'">
            <i class="fas fa-lock"></i> Change Password
        </a>
        <a href="{{ route('customer.logout') }}" class="list-group-item list-group-item-action"
           style="background-color: #f8f9fa; color: #333;"
           onMouseOver="this.style.backgroundColor='#d0d6db'"
           onMouseOut="this.style.backgroundColor='#f8f9fa'">
            <i class="fas fa-sign-out"></i> Logout
        </a>
    </div>
</div>
