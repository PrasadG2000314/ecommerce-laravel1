
@extends('layouts.navigation')

@section('title', 'Home - 3D Store')

@section('content')
<div class="electronics-wrapper">
    <!-- Category Hero -->
    <div class="category-hero">
        <div id="hero-animation"></div>
        <div class="hero-content">
            <h1>Electronics & Tech</h1>
            <p>Discover the latest innovations in technology</p>
        </div>
    </div>

    <!-- Category Navigation -->
    <div class="category-nav">
        <button class="cat-btn active" data-filter="all">All Products</button>
        <button class="cat-btn" data-filter="smartphones">Smartphones</button>
        <button class="cat-btn" data-filter="laptops">Laptops</button>
        <button class="cat-btn" data-filter="audio">Audio</button>
        <button class="cat-btn" data-filter="gaming">Gaming</button>
    </div>

    <!-- Products Grid -->
    <div class="products-grid">
        <!-- Smartphones -->
        <div class="product-card" data-category="smartphones">
            <div class="product-3d">
                <div class="product-rotate">
                    <img src="/images/iphone-13.png" alt="iPhone 13">
                </div>
            </div>
            <div class="product-info">
                <h3>iPhone 13 Pro</h3>
                <p>Latest Apple flagship with Pro camera system</p>
                <div class="product-price">$999</div>
                <button class="add-to-cart">Add to Cart</button>
            </div>
        </div>

        <!-- Laptops -->
        <div class="product-card" data-category="laptops">
            <div class="product-3d">
                <div class="product-rotate">
                    <img src="/images/macbook-pro.png" alt="MacBook Pro">
                </div>
            </div>
            <div class="product-info">
                <h3>MacBook Pro M1</h3>
                <p>Powerful performance with M1 chip</p>
                <div class="product-price">$1299</div>
                <button class="add-to-cart">Add to Cart</button>
            </div>
        </div>

        <!-- Audio Devices -->
        <div class="product-card" data-category="audio">
            <div class="product-3d">
                <div class="product-rotate">
                    <img src="/images/airpods-pro.png" alt="AirPods Pro">
                </div>
            </div>
            <div class="product-info">
                <h3>AirPods Pro</h3>
                <p>Active noise cancellation & spatial audio</p>
                <div class="product-price">$249</div>
                <button class="add-to-cart">Add to Cart</button>
            </div>
        </div>

        <!-- Gaming -->
        <div class="product-card" data-category="gaming">
            <div class="product-3d">
                <div class="product-rotate">
                    <img src="/images/ps5.png" alt="PlayStation 5">
                </div>
            </div>
            <div class="product-info">
                <h3>PlayStation 5</h3>
                <p>Next-gen gaming console</p>
                <div class="product-price">$499</div>
                <button class="add-to-cart">Add to Cart</button>
            </div>
        </div>
    </div>
</div>

<style>
    .electronics-wrapper {
        min-height: 100vh;
        background: var(--dark);
        padding-bottom: 4rem;
    }

    .category-hero {
        height: 40vh;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .hero-content {
        text-align: center;
        color: #fff;
        z-index: 2;
    }

    .hero-content h1 {
        font-size: 3.5rem;
        margin-bottom: 1rem;
        background: linear-gradient(45deg, #00f2fe, #4facfe);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .category-nav {
        display: flex;
        justify-content: center;
        gap: 1rem;
        padding: 2rem;
        flex-wrap: wrap;
    }

    .cat-btn {
        padding: 0.8rem 1.5rem;
        border: none;
        border-radius: 25px;
        background: rgba(255, 255, 255, 0.1);
        color: #fff;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .cat-btn.active {
        background: #4facfe;
    }

    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 2rem;
        padding: 2rem;
        max-width: 1400px;
        margin: 0 auto;
    }

    .product-card {
        background: rgba(255, 255, 255, 0.05);
        border-radius: 15px;
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .product-card:hover {
        transform: translateY(-10px);
    }

    .product-3d {
        height: 300px;
        position: relative;
        overflow: hidden;
    }

    .product-rotate {
        position: absolute;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: transform 0.5s ease;
    }

    .product-rotate img {
        max-width: 80%;
        max-height: 80%;
        object-fit: contain;
    }

    .product-info {
        padding: 2rem;
        color: #fff;
    }

    .product-price {
        font-size: 1.5rem;
        color: #4facfe;
        margin: 1rem 0;
    }

    .add-to-cart {
        width: 100%;
        padding: 1rem;
        border: none;
        border-radius: 8px;
        background: #4facfe;
        color: #fff;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .add-to-cart:hover {
        background: #00f2fe;
    }
</style>

<script>
    // Category filtering
    const filterButtons = document.querySelectorAll('.cat-btn');
    const products = document.querySelectorAll('.product-card');

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            const filter = button.dataset.filter;

            filterButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');

            products.forEach(product => {
                if (filter === 'all' || product.dataset.category === filter) {
                    product.style.display = 'block';
                } else {
                    product.style.display = 'none';
                }
            });
        });
    });

    // 3D Product Rotation
    const productRotates = document.querySelectorAll('.product-rotate');

    productRotates.forEach(product => {
        product.addEventListener('mousemove', (e) => {
            const rect = product.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const rotateY = (x / rect.width - 0.5) * 30;

            product.style.transform = `rotateY(${rotateY}deg)`;
        });

        product.addEventListener('mouseleave', () => {
            product.style.transform = 'rotateY(0deg)';
        });
    });
</script>
@endsection
