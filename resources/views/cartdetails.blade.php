@extends('layouts.navigation')

@section('title', 'Home - 3D Store')

@section('content')
<div class="cart-modal" id="cartModal">
    <div class="cart-content">
        <!-- Product Preview -->
        <div class="product-preview">
            <div id="product-3d-view"></div>
            <div class="product-images">
                <img src="/images/product-1.jpg" alt="Product View 1" class="thumbnail active">
                <img src="/images/product-2.jpg" alt="Product View 2" class="thumbnail">
                <img src="/images/product-3.jpg" alt="Product View 3" class="thumbnail">
            </div>
        </div>

        <!-- Product Details -->
        <div class="product-details">
            <h2 class="product-title">Premium Wireless Headphones</h2>
            <div class="product-price">$299.99</div>

            <!-- Color Selection -->
            <div class="color-options">
                <h3>Select Color</h3>
                <div class="color-circles">
                    <div class="color-circle active" data-color="#000000" style="background: #000000;"></div>
                    <div class="color-circle" data-color="#FFFFFF" style="background: #FFFFFF;"></div>
                    <div class="color-circle" data-color="#C0C0C0" style="background: #C0C0C0;"></div>
                </div>
            </div>

            <!-- Quantity Selection -->
            <div class="quantity-selector">
                <h3>Quantity</h3>
                <div class="quantity-controls">
                    <button class="qty-btn" onclick="updateQuantity(-1)">-</button>
                    <input type="number" id="quantity" value="1" min="1" max="10">
                    <button class="qty-btn" onclick="updateQuantity(1)">+</button>
                </div>
            </div>

            <!-- Total Price -->
            <div class="total-price">
                <h3>Total</h3>
                <span id="total-amount">$299.99</span>
            </div>

            <!-- Action Buttons -->
            <div class="action-buttons">
                <button class="add-to-cart-btn">Add to Cart</button>
                <a href="./buy-now "><button class="buy-now-btn">Buy Now</button></a>
            </div>
        </div>
    </div>
</div>

<style>
    .cart-modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1000;
    }

    .cart-content {
        background: var(--dark);
        border-radius: 20px;
        width: 90%;
        max-width: 1200px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2rem;
        padding: 2rem;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
    }

    .product-preview {
        height: 500px;
        position: relative;
    }

    #product-3d-view {
        height: 80%;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 15px;
    }

    .product-images {
        display: flex;
        gap: 1rem;
        margin-top: 1rem;
    }

    .thumbnail {
        width: 80px;
        height: 80px;
        border-radius: 10px;
        cursor: pointer;
        transition: transform 0.3s ease;
    }

    .thumbnail.active {
        border: 2px solid var(--primary);
        transform: scale(1.1);
    }

    .product-details {
        color: var(--light);
        padding: 1rem;
    }

    .product-title {
        font-size: 2rem;
        margin-bottom: 1rem;
    }

    .product-price {
        font-size: 2.5rem;
        color: var(--primary);
        margin-bottom: 2rem;
    }

    .color-options, .quantity-selector {
        margin-bottom: 2rem;
    }

    .color-circles {
        display: flex;
        gap: 1rem;
        margin-top: 1rem;
    }

    .color-circle {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        cursor: pointer;
        transition: transform 0.3s ease;
    }

    .color-circle.active {
        transform: scale(1.2);
        border: 2px solid var(--primary);
    }

    .quantity-controls {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-top: 1rem;
    }

    .qty-btn {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: none;
        background: var(--primary);
        color: white;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .qty-btn:hover {
        background: var(--secondary);
    }

    #quantity {
        width: 60px;
        text-align: center;
        background: rgba(255, 255, 255, 0.1);
        border: none;
        color: white;
        padding: 0.5rem;
        border-radius: 5px;
    }

    .total-price {
        font-size: 1.5rem;
        margin-bottom: 2rem;
    }

    .action-buttons {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }

    .add-to-cart-btn, .buy-now-btn {
        padding: 1rem;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 1.1rem;
    }

    .add-to-cart-btn {
        background: var(--primary);
        color: white;
    }

    .buy-now-btn {
        background: var(--secondary);
        color: white;
    }

    @media (max-width: 768px) {
        .cart-content {
            grid-template-columns: 1fr;
        }
    }
</style>

<script>
    // 3D Product View
    const container = document.getElementById('product-3d-view');
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(75, container.clientWidth / container.clientHeight, 0.1, 1000);
    const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });

    renderer.setSize(container.clientWidth, container.clientHeight);
    container.appendChild(renderer.domElement);

    // Create product model (example using a box)
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

    // Quantity Update
    function updateQuantity(change) {
        const quantityInput = document.getElementById('quantity');
        let newValue = parseInt(quantityInput.value) + change;
        newValue = Math.max(1, Math.min(10, newValue));
        quantityInput.value = newValue;
        updateTotal();
    }

    // Update Total Price
    function updateTotal() {
        const quantity = parseInt(document.getElementById('quantity').value);
        const basePrice = 299.99;
        const total = (basePrice * quantity).toFixed(2);
        document.getElementById('total-amount').textContent = `$${total}`;
    }

    // Color Selection
    document.querySelectorAll('.color-circle').forEach(circle => {
        circle.addEventListener('click', () => {
            document.querySelectorAll('.color-circle').forEach(c => c.classList.remove('active'));
            circle.classList.add('active');
            product.material.color.setStyle(circle.dataset.color);
        });
    });
</script>
@endsection
