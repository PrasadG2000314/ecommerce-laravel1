
@extends('layouts.navigation')

@section('title', 'Home - 3D Store')

@section('content')
<div class="categories-wrapper">
    <div class="categories-hero">
        <div id="hero-animation"></div>
        <h1>Shop By Category</h1>
    </div>

    <div class="categories-grid">
        <!-- Electronics Category -->
        <div class="category-card" data-category="electronics">
            <div class="category-content">
                <i class="fas fa-laptop"></i>
                <h2>Electronics</h2>
                <p>Latest gadgets and tech accessories</p>
                <ul class="subcategories">
                    <li>Smartphones</li>
                    <li>Laptops</li>
                    <li>Audio Devices</li>
                    <li>Gaming</li>
                </ul>
                <a href="./category/electronics" class="explore-btn">Explore →</a>
            </div>
            <div class="category-bg"></div>
        </div>

        <!-- Fashion Category -->
        <div class="category-card" data-category="fashion">
            <div class="category-content">
                <i class="fas fa-tshirt"></i>
                <h2>Fashion</h2>
                <p>Trending apparel and accessories</p>
                <ul class="subcategories">
                    <li>Men's Wear</li>
                    <li>Women's Collection</li>
                    <li>Footwear</li>
                    <li>Accessories</li>
                </ul>
                <a href="/category/fashion" class="explore-btn">Explore →</a>
            </div>
            <div class="category-bg"></div>
        </div>

        <!-- Home & Living Category -->
        <div class="category-card" data-category="home">
            <div class="category-content">
                <i class="fas fa-home"></i>
                <h2>Home & Living</h2>
                <p>Modern furniture and decor</p>
                <ul class="subcategories">
                    <li>Furniture</li>
                    <li>Decor</li>
                    <li>Kitchen</li>
                    <li>Lighting</li>
                </ul>
                <a href="/category/home" class="explore-btn">Explore →</a>
            </div>
            <div class="category-bg"></div>
        </div>

        <!-- Sports Category -->
        <div class="category-card" data-category="sports">
            <div class="category-content">
                <i class="fas fa-basketball-ball"></i>
                <h2>Sports & Fitness</h2>
                <p>Equipment and sportswear</p>
                <ul class="subcategories">
                    <li>Exercise Equipment</li>
                    <li>Sports Gear</li>
                    <li>Fitness Wear</li>
                    <li>Accessories</li>
                </ul>
                <a href="/category/sports" class="explore-btn">Explore →</a>
            </div>
            <div class="category-bg"></div>
        </div>

        <!-- Beauty Category -->
        <div class="category-card" data-category="beauty">
            <div class="category-content">
                <i class="fas fa-spa"></i>
                <h2>Beauty & Care</h2>
                <p>Cosmetics and personal care</p>
                <ul class="subcategories">
                    <li>Skincare</li>
                    <li>Makeup</li>
                    <li>Fragrances</li>
                    <li>Hair Care</li>
                </ul>
                <a href="/category/beauty" class="explore-btn">Explore →</a>
            </div>
            <div class="category-bg"></div>
        </div>

        <!-- Books Category -->
        <div class="category-card" data-category="books">
            <div class="category-content">
                <i class="fas fa-book"></i>
                <h2>Books & Media</h2>
                <p>Books, movies, and music</p>
                <ul class="subcategories">
                    <li>Fiction</li>
                    <li>Non-Fiction</li>
                    <li>Digital Content</li>
                    <li>Magazines</li>
                </ul>
                <a href="/category/books" class="explore-btn">Explore →</a>
            </div>
            <div class="category-bg"></div>
        </div>
    </div>
</div>

<style>
    .categories-wrapper {
        min-height: 100vh;
        background: var(--dark);
    }

    .categories-hero {
        height: 30vh;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }

    #hero-animation {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .categories-hero h1 {
        font-size: 3rem;
        color: #fff;
        text-align: center;
        z-index: 2;
        background: linear-gradient(45deg, var(--primary), var(--secondary));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .categories-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 2rem;
        padding: 2rem;
        max-width: 1400px;
        margin: 0 auto;
    }

    .category-card {
        position: relative;
        height: 400px;
        border-radius: 15px;
        overflow: hidden;
        cursor: pointer;
        transition: transform 0.5s ease;
    }

    .category-card:hover {
        transform: translateY(-10px);
    }

    .category-content {
        position: relative;
        z-index: 2;
        padding: 2rem;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        background: rgba(0, 0, 0, 0.7);
        color: #fff;
    }

    .category-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        transition: transform 0.5s ease;
    }

    .category-card:hover .category-bg {
        transform: scale(1.1);
    }

    .category-card i {
        font-size: 3rem;
        margin-bottom: 1rem;
        color: var(--secondary);
    }

    .subcategories {
        list-style: none;
        padding: 0;
        margin: 1rem 0;
    }

    .subcategories li {
        margin: 0.5rem 0;
        font-size: 0.9rem;
        opacity: 0.8;
    }

    .explore-btn {
        display: inline-block;
        padding: 0.8rem 1.5rem;
        background: var(--primary);
        color: #fff;
        text-decoration: none;
        border-radius: 25px;
        transition: all 0.3s ease;
    }

    .explore-btn:hover {
        background: var(--secondary);
        transform: translateX(10px);
    }

    [data-category="electronics"] .category-bg {
        background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('/images/electronics-bg.jpg');
    }

    [data-category="fashion"] .category-bg {
        background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('/images/fashion-bg.jpg');
    }

    [data-category="home"] .category-bg {
        background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('/images/home-bg.jpg');
    }

    [data-category="sports"] .category-bg {
        background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('/images/sports-bg.jpg');
    }

    [data-category="beauty"] .category-bg {
        background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('/images/beauty-bg.jpg');
    }

    [data-category="books"] .category-bg {
        background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('/images/books-bg.jpg');
    }
</style>

<script>
    // Hero Animation
    const container = document.getElementById('hero-animation');
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
    const renderer = new THREE.WebGLRenderer({ alpha: true });

    renderer.setSize(window.innerWidth, window.innerHeight);
    container.appendChild(renderer.domElement);

    // Create animated elements
    const geometry = new THREE.IcosahedronGeometry(1, 0);
    const material = new THREE.MeshPhongMaterial({
        color: 0x2563eb,
        wireframe: true
    });

    const shapes = [];
    for(let i = 0; i < 5; i++) {
        const shape = new THREE.Mesh(geometry, material);
        shape.position.set(
            (Math.random() - 0.5) * 5,
            (Math.random() - 0.5) * 5,
            (Math.random() - 0.5) * 5
        );
        shapes.push(shape);
        scene.add(shape);
    }

    const light = new THREE.DirectionalLight(0xffffff, 1);
    light.position.set(0, 0, 1);
    scene.add(light);

    camera.position.z = 5;

    function animate() {
        requestAnimationFrame(animate);
        shapes.forEach(shape => {
            shape.rotation.x += 0.01;
            shape.rotation.y += 0.01;
        });
        renderer.render(scene, camera);
    }

    animate();

    // Responsive handling
    window.addEventListener('resize', () => {
        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(window.innerWidth, window.innerHeight);
    });
</script>
@endsection
