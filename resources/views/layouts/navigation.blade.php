<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Modern 3D Store')</title>
    <style>
        :root {
            --primary: #2563eb;
            --accent: #f97316;
            --bg-dark: #0f172a;
            --text-light: #f8fafc;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-dark);
            color: var(--text-light);
        }

        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(15, 23, 42, 0.9);
            backdrop-filter: blur(10px);
            z-index: 1000;
            padding: 1rem 2rem;
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-brand {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .nav-brand img {
            height: 40px;
        }

        .nav-brand h1 {
            font-size: 1.5rem;
            background: linear-gradient(to right, var(--primary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .nav-link {
            color: var(--text-light);
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            background: var(--primary);
            transform: translateY(-2px);
        }

        .nav-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .cart-icon {
            position: relative;
            padding: 0.5rem;
            cursor: pointer;
        }

        .cart-count {
            position: absolute;
            top: -5px;
            right: -5px;
            background: var(--accent);
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
        }

        .mobile-menu {
            display: none;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .mobile-menu {
                display: block;
            }

            .nav-links.active {
                display: flex;
                flex-direction: column;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: rgba(15, 23, 42, 0.95);
                padding: 1rem;
            }
        }

        .main-content {
            margin-top: 80px;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-brand">
                <img src="/logo.svg" alt="3D Store Logo">
                <h1>3D Store</h1>
            </div>

            <div class="nav-links">
                <a href="/" class="nav-link">Home</a>
                <a href="/products" class="nav-link">Products</a>
                <a href="/categories" class="nav-link">Categories</a>
                <a href="/about" class="nav-link">About</a>
                <a href="/contact" class="nav-link">Contact</a>
            </div>

            <div class="nav-actions">
                <a href="/cartdetails" class="nav-link">🛒</a>
                <div class="cart-icon">

                    <span class="cart-count">0</span>
                </div>


                <a href="/login" class="nav-link">Login</a>
            </div>

            <div class="mobile-menu">☰</div>
        </div>
    </nav>

    <div class="main-content">
        @yield('content')
    </div>

    <script>
        // Mobile menu toggle
        const mobileMenu = document.querySelector('.mobile-menu');
        const navLinks = document.querySelector('.nav-links');

        mobileMenu.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });

        // Cart functionality
        let cartCount = 0;
        const cartCountElement = document.querySelector('.cart-count');

        function updateCart(count) {
            cartCount = count;
            cartCountElement.textContent = cartCount;
        }
    </script>
</body>
</html>
