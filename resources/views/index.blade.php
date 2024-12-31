<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3D Store - Categories & Products</title>
    <style>
        :root {
            --primary: #2563eb;
            --accent: #f97316;
            --bg: #0f172a;
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            color: #fff;
        }

        .banner {
            height: 60vh;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(45deg, #1a237e, #0d47a1);
        }

        .banner-content {
            text-align: center;
            z-index: 2;
        }

        .banner h1 {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            background: linear-gradient(to right, #fff, var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .categories {
            padding: 2rem;
            display: flex;
            gap: 1rem;
            overflow-x: auto;
            background: rgba(255, 255, 255, 0.05);
        }

        .category-btn {
            padding: 0.8rem 1.5rem;
            background: rgba(255, 255, 255, 0.1);
            border: none;
            color: white;
            border-radius: 2rem;
            cursor: pointer;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .category-btn:hover {
            background: var(--primary);
            transform: translateY(-2px);
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            padding: 2rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        .product-card {
            position: relative;
            height: 400px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 1rem;
            overflow: hidden;
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
        }

        .product-card:hover {
            transform: translateY(-10px) rotateY(10deg);
        }

        .product-image {
            height: 60%;
            position: relative;
        }

        .product-details {
            padding: 1.5rem;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(10px);
        }

        .product-title {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
        }

        .product-price {
            color: var(--accent);
            font-size: 1.5rem;
            font-weight: bold;
        }

        .product-rating {
            display: flex;
            gap: 0.5rem;
            margin: 1rem 0;
        }

        .star {
            color: gold;
        }

        @media (max-width: 768px) {
            .banner h1 {
                font-size: 2rem;
            }

            .products-grid {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Banner Section -->
    <div class="banner">
        <div class="banner-content">
            <h1>Discover Amazing Products</h1>
            <p>Explore our collection in stunning 3D</p>
        </div>
    </div>

    <!-- Categories Section -->
    <div class="categories">
        <button class="category-btn">All Products</button>
        <button class="category-btn">Electronics</button>
        <button class="category-btn">Fashion</button>
        <button class="category-btn">Home & Living</button>
        <button class="category-btn">Sports</button>
        <button class="category-btn">Books</button>
    </div>

    <!-- Products Grid -->
    <div class="products-grid" id="products-container">
        <!-- Product cards will be dynamically generated here -->
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/0.158.1/three.min.js"></script>
    <script>
        // Sample product data
        const products = [
            { id: 1, name: "Premium Headphones", price: 199.99, rating: 4.5, image: "headphones.jpg" },
            { id: 2, name: "Smart Watch", price: 299.99, rating: 4.8, image: "watch.jpg" },
            { id: 3, name: "Gaming Console", price: 499.99, rating: 4.9, image: "console.jpg" },
            // Add more products as needed
        ];

        // Generate product cards
        const productsContainer = document.getElementById('products-container');

        products.forEach(product => {
            const card = document.createElement('div');
            card.className = 'product-card';

            card.innerHTML = `
                <div class="product-image" id="product-3d-${product.id}"></div>
                <div class="product-details">
                    <h3 class="product-title">${product.name}</h3>
                    <div class="product-price">$${product.price}</div>
                    <div class="product-rating">
                        ${'★'.repeat(Math.floor(product.rating))}
                        ${'☆'.repeat(5 - Math.floor(product.rating))}
                        <span>${product.rating}</span>
                    </div>
                </div>
            `;

            // Add click event to view product details
            card.addEventListener('click', () => {
                window.location.href = `/product/${product.id}`;
            });

            productsContainer.appendChild(card);

            // Initialize 3D product preview for each card
            initProduct3D(product.id);
        });

        function initProduct3D(productId) {
            const container = document.getElementById(`product-3d-${productId}`);
            const scene = new THREE.Scene();
            const camera = new THREE.PerspectiveCamera(75, container.clientWidth / container.clientHeight, 0.1, 1000);
            const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });

            renderer.setSize(container.clientWidth, container.clientHeight);
            container.appendChild(renderer.domElement);

            // Create a simple 3D object (customize based on product)
            const geometry = new THREE.BoxGeometry(1, 1, 1);
            const material = new THREE.MeshPhysicalMaterial({
                color: 0xffffff,
                metalness: 0.8,
                roughness: 0.2,
            });
            const product = new THREE.Mesh(geometry, material);
            scene.add(product);

            // Add lights
            const ambientLight = new THREE.AmbientLight(0xffffff, 0.5);
            const pointLight = new THREE.PointLight(0xffffff, 1);
            pointLight.position.set(5, 5, 5);
            scene.add(ambientLight, pointLight);

            camera.position.z = 2;

            function animate() {
                requestAnimationFrame(animate);
                product.rotation.y += 0.01;
                renderer.render(scene, camera);
            }

            animate();
        }
    </script>
</body>
</html>
