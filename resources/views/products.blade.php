@extends('layouts.navigation')

@section('title', 'Product Details - 3D Store')

@section('content')
<div class="page-wrapper">
    <!-- Animated Banner -->
    <div class="banner">
        <div id="banner-animation"></div>
        <div class="banner-content">
            <h1>Featured Products</h1>
            <p>Discover our exclusive collection</p>
        </div>
    </div>

    <!-- Product Grid -->
    <div class="products-container">
        <div class="filter-bar">
            <button class="filter-btn active" data-category="all">All</button>
            <button class="filter-btn" data-category="electronics">Electronics</button>
            <button class="filter-btn" data-category="fashion">Fashion</button>
            <button class="filter-btn" data-category="home">Home</button>
        </div>

        <div class="product-grid" id="product-grid">
            <!-- Products will be dynamically loaded here -->
        </div>
    </div>
</div>

<style>
    .page-wrapper {
        min-height: 100vh;
        background: var(--dark);
    }

    .banner {
        height: 40vh;
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #banner-animation {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
    }

    .banner-content {
        position: relative;
        z-index: 2;
        text-align: center;
        color: #fff;
    }

    .banner-content h1 {
        font-size: 3rem;
        margin-bottom: 1rem;
        background: linear-gradient(45deg, var(--primary), var(--secondary));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: slideIn 1s ease-out;
    }

    .filter-bar {
        display: flex;
        justify-content: center;
        gap: 1rem;
        padding: 2rem;
        flex-wrap: wrap;
    }

    .filter-btn {
        padding: 0.8rem 1.5rem;
        border: none;
        border-radius: 25px;
        background: rgba(255, 255, 255, 0.1);
        color: #fff;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .filter-btn.active {
        background: var(--primary);
    }

    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 2rem;
        padding: 2rem;
    }

    .product-card {
        position: relative;
        height: 400px;
        perspective: 1000px;
        cursor: pointer;
    }

    .card-inner {
        position: relative;
        width: 100%;
        height: 100%;
        transform-style: preserve-3d;
        transition: transform 0.8s;
    }

    .product-card:hover .card-inner {
        transform: rotateY(180deg);
    }

    .card-front, .card-back {
        position: absolute;
        width: 100%;
        height: 100%;
        backface-visibility: hidden;
        border-radius: 15px;
        overflow: hidden;
    }

    .card-front {
        background: rgba(255, 255, 255, 0.1);
    }

    .card-back {
        background: rgba(255, 255, 255, 0.15);
        transform: rotateY(180deg);
        padding: 2rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .product-image {
        height: 60%;
        overflow: hidden;
    }

    .product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .product-info {
        padding: 1.5rem;
        background: rgba(0, 0, 0, 0.5);
    }

    .product-title {
        font-size: 1.2rem;
        color: #fff;
        margin-bottom: 0.5rem;
    }

    .product-price {
        color: var(--secondary);
        font-size: 1.5rem;
        font-weight: bold;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(-30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<script>
    // Sample product data
    const products = [
        {
            id: 1,
            name: "Premium Headphones",
            price: "$299",
            category: "electronics",
            image: "headphones.jpg",
            description: "High-quality wireless headphones with noise cancellation"
        },
        {
            id: 2,
            name: "Smart Watch",
            price: "$199",
            category: "electronics",
            image: "watch.jpg",
            description: "Advanced smartwatch with health monitoring"
        },
        {
            id: 3,
            name: "Designer Backpack",
            price: "$89",
            category: "fashion",
            image: "backpack.jpg",
            description: "Stylish and functional backpack for everyday use"
        },
        {
            id: 4,
            name: "Designer Backpack",
            price: "$89",
            category: "fashion",
            image: "backpack.jpg",
            description: "Stylish and functional backpack for everyday use"
        }
        // A
        // Add more products as needed
    ];

    // Initialize product grid
    const productGrid = document.getElementById('product-grid');

    function createProductCard(product) {
        return `
            <div class="product-card" data-category="${product.category}">
                <div class="card-inner">
                    <div class="card-front">
                        <div class="product-image">
                            <img src="${product.image}" alt="${product.name}">
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">${product.name}</h3>
                            <div class="product-price">${product.price}</div>
                        </div>
                    </div>
                    <div class="card-back">
                        <h3>${product.name}</h3>
                        <p>${product.description}</p>
                        <button class="add-to-cart">Add to Cart</button>
                    </div>
                </div>
            </div>
        `;
    }

    // Load products
    products.forEach(product => {
        productGrid.innerHTML += createProductCard(product);
    });

    // Filter functionality
    const filterButtons = document.querySelectorAll('.filter-btn');
    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            const category = button.dataset.category;

            filterButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');

            document.querySelectorAll('.product-card').forEach(card => {
                if (category === 'all' || card.dataset.category === category) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });

    // Banner Animation
    const bannerContainer = document.getElementById('banner-animation');
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
    const renderer = new THREE.WebGLRenderer({ alpha: true });

    renderer.setSize(window.innerWidth, window.innerHeight);
    bannerContainer.appendChild(renderer.domElement);

    // Create animated background elements
    const geometry = new THREE.TorusGeometry(1, 0.3, 16, 100);
    const material = new THREE.MeshPhongMaterial({
        color: 0x2563eb,
        wireframe: true
    });
    const torus = new THREE.Mesh(geometry, material);
    scene.add(torus);

    const light = new THREE.DirectionalLight(0xffffff, 1);
    light.position.set(0, 0, 1);
    scene.add(light);

    camera.position.z = 5;

    function animate() {
        requestAnimationFrame(animate);
        torus.rotation.x += 0.01;
        torus.rotation.y += 0.005;
        renderer.render(scene, camera);
    }

    animate();
</script>
@endsection
