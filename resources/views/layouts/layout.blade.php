<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Modern 3D Shopping Experience')">
    <title>@yield('title', '3D Store') | Modern Shopping</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #2563eb;
            --secondary: #f97316;
            --accent: #8b5cf6;
            --dark: #0f172a;
            --light: #f8fafc;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--dark);
            color: var(--light);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Header Styles */
        .header {
            background: rgba(15, 23, 42, 0.9);
            backdrop-filter: blur(10px);
            position: fixed;
            width: 100%;
            z-index: 1000;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .nav-menu {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .nav-link {
            color: var(--light);
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            background: var(--primary);
            transform: translateY(-2px);
        }

        /* Main Content */
        .main-content {
            margin-top: 80px;
            flex: 1;
            padding: 2rem;
        }

        /* Footer */
        .footer {
            background: rgba(15, 23, 42, 0.95);
            padding: 4rem 2rem;
            margin-top: auto;
        }

        .footer-content {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
        }

        .footer-section h3 {
            color: var(--secondary);
            margin-bottom: 1.5rem;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.8rem;
        }

        .footer-links a {
            color: var(--light);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: var(--primary);
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-links a {
            color: var(--light);
            font-size: 1.5rem;
            transition: transform 0.3s ease;
        }

        .social-links a:hover {
            transform: translateY(-3px);
            color: var(--primary);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-menu {
                display: none;
            }

            .nav-menu.active {
                display: flex;
                flex-direction: column;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: rgba(15, 23, 42, 0.95);
                padding: 1rem;
            }

            .mobile-menu-btn {
                display: block;
                font-size: 1.5rem;
                color: var(--light);
                cursor: pointer;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <nav class="nav-container">
            <a href="/" class="logo">3D Store</a>

            <div class="nav-menu">
                <a href="/" class="nav-link">Home</a>
                <a href="/shop" class="nav-link">Shop</a>
                <a href="/categories" class="nav-link">Categories</a>
                <a href="/about" class="nav-link">About</a>
                <a href="/contact" class="nav-link">Contact</a>
                <a href="/cart" class="nav-link">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="cart-count">0</span>
                </a>
            </div>

            <div class="mobile-menu-btn">☰</div>
        </nav>
    </header>

    <main class="main-content">
        @yield('content')
    </main>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3>About Us</h3>
                <p>Experience the future of shopping with our innovative 3D product visualization technology.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul class="footer-links">
                    <li><a href="/shop">Shop</a></li>
                    <li><a href="/categories">Categories</a></li>
                    <li><a href="/about">About Us</a></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h3>Customer Service</h3>
                <ul class="footer-links">
                    <li><a href="/shipping">Shipping Info</a></li>
                    <li><a href="/returns">Returns</a></li>
                    <li><a href="/faq">FAQ</a></li>
                    <li><a href="/support">Support</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h3>Newsletter</h3>
                <p>Subscribe to receive updates about new products and special offers.</p>
                <form class="newsletter-form">
                    <input type="email" placeholder="Enter your email">
                    <button type="submit">Subscribe</button>
                </form>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
        const navMenu = document.querySelector('.nav-menu');

        mobileMenuBtn.addEventListener('click', () => {
            navMenu.classList.toggle('active');
        });

        // Cart functionality
        let cartCount = 0;
        const cartCountElement = document.querySelector('.cart-count');

        function updateCart(count) {
            cartCount = count;
            cartCountElement.textContent = cartCount;
        }
    </script>

    @yield('scripts')
</body>
</html>

@extends('layouts.layout')
@section('content')
    // Your page content here
@endsection
