
@extends('layouts.navigation')

@section('title', 'Home - 3D Store')

@section('content')

<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- User Profile Summary -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="rounded-full bg-gray-200 p-3">
                            <svg class="h-12 w-12 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold">{{ Auth::user()->name }}</h3>
                            <p class="text-gray-600">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-2">Orders</h3>
                        <p class="text-3xl font-bold text-blue-600">{{ $orderCount ?? 0 }}</p>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-2">Cart Items</h3>
                        <p class="text-3xl font-bold text-green-600">{{ $cartCount ?? 0 }}</p>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-2">Wishlist</h3>
                        <p class="text-3xl font-bold text-purple-600">{{ $wishlistCount ?? 0 }}</p>
                    </div>
                </div>
            </div>

            <!-- Recent Orders -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4">Recent Orders</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($recentOrders ?? [] as $order)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">#{{ $order->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $order->created_at->format('M d, Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">${{ $order->total }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            {{ $order->status }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('orders.show', $order->id) }}" class="text-blue-600 hover:text-blue-900">View Details</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">No orders found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-4">Quick Actions</h3>
                        <div class="space-y-4">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 bg-gray-50 hover:bg-gray-100 rounded-lg">
                                Edit Profile
                            </a>
                            <a href="{{ route('orders.index') }}" class="block px-4 py-2 bg-gray-50 hover:bg-gray-100 rounded-lg">
                                View All Orders
                            </a>
                            <a href="{{ route('cart.index') }}" class="block px-4 py-2 bg-gray-50 hover:bg-gray-100 rounded-lg">
                                View Cart
                            </a>
                        </div>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-4">Account Settings</h3>
                        <div class="space-y-4">
                            <a href="#" class="block px-4 py-2 bg-gray-50 hover:bg-gray-100 rounded-lg">
                                Change Password
                            </a>
                            <a href="#" class="block px-4 py-2 bg-gray-50 hover:bg-gray-100 rounded-lg">
                                Notification Settings
                            </a>
                            <a href="#" class="block px-4 py-2 bg-gray-50 hover:bg-gray-100 rounded-lg">
                                Shipping Addresses
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
