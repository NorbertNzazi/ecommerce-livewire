<div class="hero__categories">
    <div class="hero__categories__all">
        <i class="fa fa-bars"></i>
        <span>Administrator</span>
    </div>
    <ul>
        <li wire:click="goto('admin-users')">Users</li>
        <li wire:click="goto('admin-products')">Products</li>
        <li wire:click="goto('admin-orders')">Orders</li>
        <li wire:click="goto('admin-categories')">Categories</li>
        <li wire:click="goto('admin-payments')">Payments</li>
    </ul>
</div>
