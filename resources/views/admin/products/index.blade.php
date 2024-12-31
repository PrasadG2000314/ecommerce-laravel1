@extends('admin.layouts.admin')
@section('title', 'Products Management')

@section('content')
<div class="products-header">
    <h2>Products Management</h2>
    <a href="{{ route('admin.products.create') }}" class="btn-add">Add New Product</a>
</div>

<div class="products-filters">
    <input type="text" placeholder="Search products...">
    <select>
        <option>Filter by Category</option>
    </select>
</div>

<table class="admin-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td><img src="{{ $product->image }}" width="50"></td>
            <td>{{ $product->name }}</td>
            <td>${{ $product->price }}</td>
            <td>{{ $product->stock }}</td>
            <td>{{ $product->status }}</td>
            <td>
                <a href="{{ route('admin.products.edit', $product->id) }}">Edit</a>
                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
