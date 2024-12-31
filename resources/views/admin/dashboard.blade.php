@extends('layouts.admin')

@section('title', 'Admin Dashboard - 3D Store')

@section('content')
<div class="admin-wrapper">
    <!-- Sidebar Navigation -->
    <nav class="admin-sidebar">
        <div class="admin-brand">
            <i class="fas fa-cube"></i>
            <h2>3D Store Admin</h2>
        </div>

        <ul class="nav-links">
            <li class="active">
                <a href="#dashboard"><i class="fas fa-home"></i>Dashboard</a>
            </li>
            <li>
                <a href="#products"><i class="fas fa-box"></i>Products</a>
            </li>
            <li>
                <a href="#categories"><i class="fas fa-tags"></i>Categories</a>
            </li>
            <li>
                <a href="#orders"><i class="fas fa-shopping-cart"></i>Orders</a>
            </li>
            <li>
                <a href="#customers"><i class="fas fa-users"></i>Customers</a>
            </li>
            <li>
                <a href="#analytics"><i class="fas fa-chart-bar"></i>Analytics</a>
            </li>
            <li>
                <a href="#settings"><i class="fas fa-cog"></i>Settings</a>
            </li>
        </ul>
    </nav>

    <!-- Main Content Area -->
    <main class="admin-main">
        <!-- Top Bar -->
        <div class="top-bar">
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search...">
            </div>
            <div class="admin-profile">
                <div class="notifications">
                    <i class="fas fa-bell"></i>
                    <span class="badge">3</span>
                </div>
                <img src="/admin-avatar.jpg" alt="Admin" class="avatar">
                <span>Admin Name</span>
            </div>
        </div>

        <!-- Dashboard Overview -->
        <div class="dashboard-stats">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-shopping-bag"></i>
                </div>
                <div class="stat-info">
                    <h3>Total Sales</h3>
                    <p>$24,500</p>
                    <span class="trend up">+15%</span>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-info">
                    <h3>Customers</h3>
                    <p>1,250</p>
                    <span class="trend up">+8%</span>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-box"></i>
                </div>
                <div class="stat-info">
                    <h3>Products</h3>
                    <p>384</p>
                    <span class="trend up">+12%</span>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="stat-info">
                    <h3>Revenue</h3>
                    <p>$18,300</p>
                    <span class="trend up">+20%</span>
                </div>
            </div>
        </div>

        <!-- Product Management -->
        <div class="content-section">
            <div class="section-header">
                <h2>Product Management</h2>
                <button class="add-new-btn" onclick="showAddProductModal()">
                    <i class="fas fa-plus"></i> Add New Product
                </button>
            </div>

            <div class="product-table">
                <table>
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Product rows will be dynamically populated -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Order Management -->
        <div class="content-section">
            <div class="section-header">
                <h2>Recent Orders</h2>
                <button class="view-all-btn">View All</button>
            </div>

            <div class="order-table">
                <table>
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Products</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Order rows will be dynamically populated -->
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>

<!-- Add/Edit Product Modal -->
<div class="modal" id="productModal">
    <div class="modal-content">
        <h2>Add New Product</h2>
        <form id="productForm">
            <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="name" required>
            </div>
            <div class="form-group">
                <label>Category</label>
                <select name="category" required>
                    <option value="">Select Category</option>
                    <option value="electronics">Electronics</option>
                    <option value="fashion">Fashion</option>
                    <option value="home">Home & Living</option>
                </select>
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="number" name="price" step="0.01" required>
            </div>
            <div class="form-group">
                <label>Stock</label>
                <input type="number" name="stock" required>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" rows="4"></textarea>
            </div>
            <div class="form-group">
                <label>Product Images</label>
                <input type="file" name="images" multiple accept="image/*">
            </div>
            <div class="form-actions">
                <button type="submit" class="save-btn">Save Product</button>
                <button type="button" class="cancel-btn" onclick="closeModal()">Cancel</button>
            </div>
        </form>
    </div>
</div>

<style>
    .admin-wrapper {
        display: flex;
        min-height: 100vh;
        background: var(--dark);
    }

    .admin-sidebar {
        width: 250px;
        background: rgba(255, 255, 255, 0.05);
        padding: 2rem;
    }

    .admin-main {
        flex: 1;
        padding: 2rem;
    }

    .top-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .dashboard-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: rgba(255, 255, 255, 0.1);
        padding: 1.5rem;
        border-radius: 15px;
        display: flex;
        align-items: center;
    }

    .content-section {
        background: rgba(255, 255, 255, 0.05);
        border-radius: 15px;
        padding: 1.5rem;
        margin-bottom: 2rem;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        color: var(--light);
    }

    th, td {
        padding: 1rem;
        text-align: left;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        z-index: 1000;
    }

    .modal-content {
        background: var(--dark);
        padding: 2rem;
        border-radius: 15px;
        max-width: 600px;
        margin: 2rem auto;
    }
</style>

<script>
    // Product Management
    function showAddProductModal() {
        document.getElementById('productModal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('productModal').style.display = 'none';
    }

    // Form Submission
    document.getElementById('productForm').addEventListener('submit', function(e) {
        e.preventDefault();
        // Add your form submission logic here
        closeModal();
    });

    // Dynamic Table Population
    function populateProductTable() {
        const products = [
            { id: 1, name: 'Wireless Headphones', category: 'Electronics', price: 199.99, stock: 50, status: 'Active' },
            // Add more products
        ];

        const tbody = document.querySelector('.product-table tbody');
        tbody.innerHTML = products.map(product => `
            <tr>
                <td>${product.name}</td>
                <td>${product.category}</td>
                <td>$${product.price}</td>
                <td>${product.stock}</td>
                <td>${product.status}</td>
                <td>
                    <button onclick="editProduct(${product.id})">Edit</button>
                    <button onclick="deleteProduct(${product.id})">Delete</button>
                </td>
            </tr>
        `).join('');
    }

    // Initialize tables
    populateProductTable();
</script>
@endsection
