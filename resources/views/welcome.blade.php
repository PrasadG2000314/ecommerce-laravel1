@extends('layouts.navigation')

@section('title', 'Home - 3D Store')

@section('content')
<div class="waterfall-container">
    <div class="hero-section">
        <div id="particles-bg"></div>
        <div class="hero-content">
            <h1>Discover the Flow</h1>
            <p>Explore our cascading collection</p>
        </div>
    </div>

    <div class="waterfall-grid" id="product-waterfall">
        <!-- Products will be dynamically loaded here -->
    </div>
</div>

<style>
    .waterfall-container {
        min-height: 100vh;
        overflow: hidden;
    }

    .hero-section {
        height: 100vh;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(45deg, #1a237e, #0d47a1);
    }

    #particles-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .hero-content {
        text-align: center;
        z-index: 2;
        color: #fff;
        animation: fadeInUp 1s ease-out;
    }

    .hero-content h1 {
        font-size: 4rem;
        margin-bottom: 1rem;
        background: linear-gradient(to right, #fff, #64b5f6);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .waterfall-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
        padding: 20px;
        background: var(--dark);
    }

    .product-card {
        background: rgba(255, 255, 255, 0.05);
        border-radius: 15px;
        overflow: hidden;
        transform: translateY(50px);
        opacity: 0;
        transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .product-card.visible {
        transform: translateY(0);
        opacity: 1;
    }

    .product-image {
        position: relative;
        padding-top: 100%;
        overflow: hidden;
    }

    .product-image img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .product-card:hover .product-image img {
        transform: scale(1.1);
    }

    .product-info {
        padding: 20px;
        background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
    }

    .product-title {
        font-size: 1.2rem;
        color: #fff;
        margin-bottom: 10px;
    }

    .product-price {
        color: var(--secondary);
        font-size: 1.5rem;
        font-weight: bold;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
    }

    .floating {
        animation: float 3s ease-in-out infinite;
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/0.158.1/three.min.js"></script>
<script>
    // Particle Background
    const container = document.getElementById('particles-bg');
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
    const renderer = new THREE.WebGLRenderer({ alpha: true });

    renderer.setSize(window.innerWidth, window.innerHeight);
    container.appendChild(renderer.domElement);

    // Create falling particles
    const particlesCount = 1000;
    const positions = new Float32Array(particlesCount * 3);
    const speeds = new Float32Array(particlesCount);

    for(let i = 0; i < particlesCount; i++) {
        positions[i * 3] = (Math.random() - 0.5) * 20;
        positions[i * 3 + 1] = Math.random() * 20;
        positions[i * 3 + 2] = (Math.random() - 0.5) * 20;
        speeds[i] = Math.random() * 0.1 + 0.05;
    }

    const geometry = new THREE.BufferGeometry();
    geometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));

    const material = new THREE.PointsMaterial({
        color: 0x64b5f6,
        size: 0.05,
        transparent: true
    });

    const particles = new THREE.Points(geometry, material);
    scene.add(particles);

    camera.position.z = 5;

    // Animation
    function animate() {
        requestAnimationFrame(animate);

        const positions = particles.geometry.attributes.position.array;

        for(let i = 0; i < particlesCount; i++) {
            positions[i * 3 + 1] -= speeds[i];

            if(positions[i * 3 + 1] < -10) {
                positions[i * 3 + 1] = 10;
            }
        }

        particles.geometry.attributes.position.needsUpdate = true;
        renderer.render(scene, camera);
    }

    animate();

    // Product Waterfall Effect
    const products = [
        { id: 1, title: "Premium Headphones", price: "$299", image: "headphones.jpg" },
        { id: 2, title: "Smart Watch", price: "$199", image: "watch.jpg" },
        // Add more products
    ];

    const productWaterfall = document.getElementById('product-waterfall');

    function createProductCard(product) {
        const card = document.createElement('div');
        card.className = 'product-card';
        card.innerHTML = `
            <div class="product-image">
                <img src="${product.image}" alt="${product.title}">
            </div>
            <div class="product-info">
                <h3 class="product-title">${product.title}</h3>
                <div class="product-price">${product.price}</div>
            </div>
        `;
        return card;
    }

    // Intersection Observer for scroll animation
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, { threshold: 0.1 });

    // Load products with delay
    products.forEach((product, index) => {
        setTimeout(() => {
            const card = createProductCard(product);
            productWaterfall.appendChild(card);
            observer.observe(card);
        }, index * 200);
    });

    // Responsive handling
    window.addEventListener('resize', () => {
        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(window.innerWidth, window.innerHeight);
    });
</script>
@endsection
