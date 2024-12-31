@extends('admin.layouts.admin')
@section('title', 'Dashboard')

@section('content')
<div class="dashboard-stats">
    <div class="stat-card">
        <h3>Total Sales</h3>
        <p>${{ $totalSales }}</p>
    </div>
    <div class="stat-card">
        <h3>Orders Today</h3>
        <p>{{ $ordersToday }}</p>
    </div>
    <div class="stat-card">
        <h3>Active Users</h3>
        <p>{{ $activeUsers }}</p>
    </div>
    <div class="stat-card">
        <h3>Products</h3>
        <p>{{ $totalProducts }}</p>
    </div>
</div>

<div class="recent-activity">
    <h2>Recent Orders</h2>
    <table class="admin-table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recentOrders as $order)
            <tr>
                <td>#{{ $order->id }}</td>
                <td>{{ $order->user->name }}</td>
                <td>${{ $order->total }}</td>
                <td>{{ $order->status }}</td>
                <td>
                    <a href="{{ route('admin.orders.show', $order->id) }}">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
