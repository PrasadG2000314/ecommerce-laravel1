@extends('layouts.layout')

@section('title', 'Your Bill - 3D Store')

@section('content')
<div class="bill-wrapper">
    <!-- Bill Header -->
    <div class="bill-header">
        <div class="store-info">
            <h1>3D Store</h1>
            <p>Invoice #: INV-{{time()}}</p>
            <p>Date: {{date('Y-m-d')}}</p>
        </div>
        <div class="customer-info">
            <h2>Customer Details</h2>
            <div id="customerDetails">
                <!-- Dynamically filled -->
            </div>
        </div>
    </div>

    <!-- Cart Items -->
    <div class="cart-items">
        <table class="items-table">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody id="cartItemsList">
                <!-- Dynamically filled -->
            </tbody>
        </table>
    </div>

    <!-- Bill Summary -->
    <div class="bill-summary">
        <div class="summary-row">
            <span>Subtotal:</span>
            <span id="subtotal">$0.00</span>
        </div>
        <div class="summary-row">
            <span>Tax (10%):</span>
            <span id="tax">$0.00</span>
        </div>
        <div class="summary-row total">
            <span>Total:</span>
            <span id="total">$0.00</span>
        </div>
    </div>

    <!-- Actions -->
    <div class="bill-actions">
        <button onclick="generatePDF()" class="action-btn">Download PDF</button>
        <button onclick="emailBill()" class="action-btn">Email Bill</button>
        <button onclick="printBill()" class="action-btn">Print</button>
    </div>
</div>

<style>
    .bill-wrapper {
        max-width: 800px;
        margin: 2rem auto;
        padding: 2rem;
        background: var(--dark);
        color: var(--light);
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    }

    .bill-header {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2rem;
        margin-bottom: 3rem;
        padding-bottom: 2rem;
        border-bottom: 1px solid rgba(255,255,255,0.1);
    }

    .store-info h1 {
        color: var(--primary);
        margin-bottom: 1rem;
    }

    .items-table {
        width: 100%;
        border-collapse: collapse;
        margin: 2rem 0;
    }

    .items-table th,
    .items-table td {
        padding: 1rem;
        text-align: left;
        border-bottom: 1px solid rgba(255,255,255,0.1);
    }

    .items-table th {
        background: rgba(255,255,255,0.05);
        color: var(--primary);
    }

    .bill-summary {
        margin: 2rem 0;
        padding: 2rem;
        background: rgba(255,255,255,0.05);
        border-radius: 10px;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        padding: 0.5rem 0;
    }

    .summary-row.total {
        margin-top: 1rem;
        padding-top: 1rem;
        border-top: 2px solid var(--primary);
        font-size: 1.25rem;
        font-weight: bold;
    }

    .bill-actions {
        display: flex;
        gap: 1rem;
        justify-content: flex-end;
        margin-top: 2rem;
    }

    .action-btn {
        padding: 0.8rem 1.5rem;
        border: none;
        border-radius: 8px;
        background: var(--primary);
        color: white;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .action-btn:hover {
        background: var(--secondary);
        transform: translateY(-2px);
    }

    @media print {
        .bill-actions {
            display: none;
        }
    }
</style>

<script>
    // Sample cart data
    const cart = {
        items: [
            {
                id: 1,
                name: "Premium Headphones",
                price: 299.99,
                quantity: 2
            },
            {
                id: 2,
                name: "Wireless Mouse",
                price: 49.99,
                quantity: 1
            }
        ],
        customer: {
            name: "John Doe",
            email: "john@example.com",
            address: "123 Tech Street"
        }
    };

    // Initialize bill
    function initializeBill() {
        // Populate customer details
        const customerDetails = document.getElementById('customerDetails');
        customerDetails.innerHTML = `
            <p>Name: ${cart.customer.name}</p>
            <p>Email: ${cart.customer.email}</p>
            <p>Address: ${cart.customer.address}</p>
        `;

        // Populate cart items
        const cartItemsList = document.getElementById('cartItemsList');
        cart.items.forEach(item => {
            const total = item.price * item.quantity;
            cartItemsList.innerHTML += `
                <tr>
                    <td>${item.name}</td>
                    <td>${item.quantity}</td>
                    <td>$${item.price.toFixed(2)}</td>
                    <td>$${total.toFixed(2)}</td>
                </tr>
            `;
        });

        // Calculate totals
        calculateTotals();
    }

    function calculateTotals() {
        const subtotal = cart.items.reduce((sum, item) => sum + (item.price * item.quantity), 0);
        const tax = subtotal * 0.1;
        const total = subtotal + tax;

        document.getElementById('subtotal').textContent = `$${subtotal.toFixed(2)}`;
        document.getElementById('tax').textContent = `$${tax.toFixed(2)}`;
        document.getElementById('total').textContent = `$${total.toFixed(2)}`;
    }

    function generatePDF() {
        // Implement PDF generation logic
        html2pdf()
            .from(document.querySelector('.bill-wrapper'))
            .save(`invoice-${Date.now()}.pdf`);
    }

    function emailBill() {
        // Implement email sending logic
        alert('Bill will be sent to ' + cart.customer.email);
    }

    function printBill() {
        window.print();
    }

    // Initialize on load
    window.onload = initializeBill;
</script>
@endsection
