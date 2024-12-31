@extends('layouts.navigation')

@section('title', 'Home - 3D Store')

@section('content')
<div class="checkout-wrapper">
    <!-- Progress Bar -->
    <div class="checkout-progress">
        <div class="progress-step active">
            <i class="fas fa-shopping-cart"></i>
            <span>Cart</span>
        </div>
        <div class="progress-line active"></div>
        <div class="progress-step active">
            <i class="fas fa-address-card"></i>
            <span>Details</span>
        </div>
        <div class="progress-line"></div>
        <div class="progress-step">
            <i class="fas fa-check-circle"></i>
            <span>Complete</span>
        </div>
    </div>

    <div class="checkout-container">
        <!-- Order Summary -->
        <div class="order-summary">
            <h2>Order Summary</h2>
            <div class="product-list">
                <div class="product-item">
                    <div class="product-image">
                        <div id="product-3d-view"></div>
                    </div>
                    <div class="product-details">
                        <h3>Premium Wireless Headphones</h3>
                        <p>Color: Matte Black</p>
                        <p>Quantity: 1</p>
                        <span class="price">$299.99</span>
                    </div>
                </div>
            </div>
            <div class="price-breakdown">
                <div class="price-row">
                    <span>Subtotal</span>
                    <span>$299.99</span>
                </div>
                <div class="price-row">
                    <span>Shipping</span>
                    <span>$9.99</span>
                </div>
                <div class="price-row">
                    <span>Tax</span>
                    <span>$30.00</span>
                </div>
                <div class="price-row total">
                    <span>Total</span>
                    <span>$339.98</span>
                </div>
            </div>
        </div>

        <!-- Payment Form -->
        <div class="payment-form">
            <h2>Payment Details</h2>
            <form id="paymentForm" onsubmit="processPayment(event)">
                <div class="form-group">
                    <label>Card Holder Name</label>
                    <input type="text" required>
                </div>
                <div class="form-group">
                    <label>Card Number</label>
                    <div class="card-input">
                        <input type="text" pattern="\d*" maxlength="16" required>
                        <i class="fab fa-cc-visa"></i>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Expiry Date</label>
                        <input type="text" placeholder="MM/YY" required>
                    </div>
                    <div class="form-group">
                        <label>CVV</label>
                        <input type="text" pattern="\d*" maxlength="3" required>
                    </div>
                </div>
                <button type="submit" class="pay-now-btn">Pay Now</button>
            </form>
        </div>
    </div>
</div>

<!-- Success Modal -->
<div class="success-modal" id="successModal">
    <div class="modal-content">
        <div class="success-animation">
            <div class="checkmark">
                <i class="fas fa-check"></i>
            </div>
        </div>
        <h2>Payment Successful!</h2>
        <p>Your order has been placed successfully.</p>
        <p>Order ID: #ORD123456</p>
        <button onclick="window.location.href='/'" class="continue-btn">Continue Shopping</button>
    </div>
</div>

<style>
    .checkout-wrapper {
        min-height: 100vh;
        background: var(--dark);
        padding: 2rem;
        color: var(--light);
    }

    .checkout-progress {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 3rem;
    }

    .progress-step {
        display: flex;
        flex-direction: column;
        align-items: center;
        color: #666;
    }

    .progress-step.active {
        color: var(--primary);
    }

    .progress-line {
        width: 100px;
        height: 2px;
        background: #666;
        margin: 0 1rem;
    }

    .progress-line.active {
        background: var(--primary);
    }

    .checkout-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2rem;
        max-width: 1200px;
        margin: 0 auto;
    }

    .order-summary, .payment-form {
        background: rgba(255, 255, 255, 0.05);
        padding: 2rem;
        border-radius: 15px;
    }

    .product-item {
        display: flex;
        gap: 1rem;
        margin-bottom: 1rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .product-image {
        width: 150px;
        height: 150px;
    }

    .price-breakdown {
        margin-top: 2rem;
    }

    .price-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 0.5rem;
    }

    .price-row.total {
        font-size: 1.2rem;
        font-weight: bold;
        margin-top: 1rem;
        padding-top: 1rem;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
    }

    .form-group input {
        width: 100%;
        padding: 0.8rem;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 8px;
        color: var(--light);
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }

    .pay-now-btn {
        width: 100%;
        padding: 1rem;
        background: var(--primary);
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .success-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        z-index: 1000;
        align-items: center;
        justify-content: center;
    }

    .success-animation {
        margin-bottom: 2rem;
    }

    .checkmark {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: var(--primary);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
    }

    .checkmark i {
        font-size: 40px;
        color: white;
    }

    @media (max-width: 768px) {
        .checkout-container {
            grid-template-columns: 1fr;
        }
    }
</style>

<script>
    function processPayment(event) {
        event.preventDefault();

        // Show loading state
        const button = event.target.querySelector('button');
        button.innerHTML = 'Processing...';

        // Simulate payment processing
        setTimeout(() => {
            // Show success modal
            document.getElementById('successModal').style.display = 'flex';

            // Reset form
            event.target.reset();
            button.innerHTML = 'Pay Now';
        }, 2000);
    }

    // 3D Product View
    const container = document.getElementById('product-3d-view');
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(75, container.clientWidth / container.clientHeight, 0.1, 1000);
    const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });

    renderer.setSize(container.clientWidth, container.clientHeight);
    container.appendChild(renderer.domElement);

    // Create product model
    const geometry = new THREE.BoxGeometry(2, 2, 2);
    const material = new THREE.MeshPhongMaterial({
        color: 0x000000,
        metalness: 0.5,
        roughness: 0.5,
    });
    const product = new THREE.Mesh(geometry, material);
    scene.add(product);

    // Lighting
    const ambientLight = new THREE.AmbientLight(0xffffff, 0.5);
    const pointLight = new THREE.PointLight(0xffffff, 1);
    pointLight.position.set(5, 5, 5);
    scene.add(ambientLight, pointLight);

    camera.position.z = 5;

    function animate() {
        requestAnimationFrame(animate);
        product.rotation.y += 0.005;
        renderer.render(scene, camera);
    }

    animate();
</script>
@endsection
