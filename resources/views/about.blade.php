@extends('layouts.navigation')

@section('title', 'Home - 3D Store')

@section('content')
<div class="about-wrapper">
    <!-- Hero Section -->
    <div class="about-hero">
        <div id="hero-animation"></div>
        <div class="hero-content">
            <h1>Our Story</h1>
            <p>Revolutionizing online shopping with immersive 3D experiences</p>
        </div>
    </div>

    <!-- Vision Section -->
    <section class="vision-section">
        <div class="container">
            <div class="vision-grid">
                <div class="vision-content">
                    <h2>Our Vision</h2>
                    <p>Leading the future of e-commerce through innovative 3D technology and exceptional customer experiences.</p>
                </div>
                <div class="vision-stats">
                    <div class="stat-card">
                        <h3>10K+</h3>
                        <p>Happy Customers</p>
                    </div>
                    <div class="stat-card">
                        <h3>1000+</h3>
                        <p>Products</p>
                    </div>
                    <div class="stat-card">
                        <h3>24/7</h3>
                        <p>Support</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section">
        <div class="container">
            <h2>Meet Our Team</h2>
            <div class="team-grid">
                <div class="team-card">
                    <div class="member-image">
                        <div class="image-3d"></div>
                    </div>
                    <h3>John Doe</h3>
                    <p>Founder & CEO</p>
                </div>
                <div class="team-card">
                    <div class="member-image">
                        <div class="image-3d"></div>
                    </div>
                    <h3>Jane Smith</h3>
                    <p>Creative Director</p>
                </div>
                <div class="team-card">
                    <div class="member-image">
                        <div class="image-3d"></div>
                    </div>
                    <h3>Mike Johnson</h3>
                    <p>Tech Lead</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="values-section">
        <div class="container">
            <h2>Our Values</h2>
            <div class="values-grid">
                <div class="value-card">
                    <i class="fas fa-innovation"></i>
                    <h3>Innovation</h3>
                    <p>Pushing boundaries in e-commerce technology</p>
                </div>
                <div class="value-card">
                    <i class="fas fa-quality"></i>
                    <h3>Quality</h3>
                    <p>Delivering excellence in every product</p>
                </div>
                <div class="value-card">
                    <i class="fas fa-customer"></i>
                    <h3>Customer First</h3>
                    <p>Your satisfaction is our priority</p>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    .about-wrapper {
        background: var(--dark);
        color: var(--light);
    }

    .about-hero {
        height: 60vh;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    #hero-animation {
        position: absolute;
        width: 100%;
        height: 100%;
    }

    .hero-content {
        text-align: center;
        z-index: 2;
    }

    .hero-content h1 {
        font-size: 4rem;
        margin-bottom: 1rem;
        background: linear-gradient(45deg, var(--primary), var(--secondary));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 4rem 2rem;
    }

    .vision-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
        align-items: center;
    }

    .vision-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
    }

    .stat-card {
        background: rgba(255, 255, 255, 0.1);
        padding: 2rem;
        border-radius: 15px;
        text-align: center;
        transition: transform 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-10px);
    }

    .stat-card h3 {
        font-size: 2.5rem;
        color: var(--secondary);
    }

    .team-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        margin-top: 3rem;
    }

    .team-card {
        text-align: center;
        padding: 2rem;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 15px;
        transition: transform 0.3s ease;
    }

    .team-card:hover {
        transform: translateY(-10px);
    }

    .member-image {
        width: 200px;
        height: 200px;
        margin: 0 auto 1rem;
        border-radius: 50%;
        overflow: hidden;
        background: var(--primary);
    }

    .values-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin-top: 3rem;
    }

    .value-card {
        padding: 2rem;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 15px;
        text-align: center;
        transition: all 0.3s ease;
    }

    .value-card:hover {
        transform: translateY(-10px);
        background: rgba(255, 255, 255, 0.1);
    }

    @media (max-width: 768px) {
        .vision-grid {
            grid-template-columns: 1fr;
        }

        .vision-stats {
            grid-template-columns: 1fr;
        }
    }
</style>

<script>
    // 3D Hero Animation
    const container = document.getElementById('hero-animation');
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
    const renderer = new THREE.WebGLRenderer({ alpha: true });

    renderer.setSize(window.innerWidth, window.innerHeight);
    container.appendChild(renderer.domElement);

    // Create animated background
    const geometry = new THREE.TorusKnotGeometry(10, 3, 100, 16);
    const material = new THREE.MeshPhongMaterial({
        color: 0x2563eb,
        wireframe: true
    });
    const torusKnot = new THREE.Mesh(geometry, material);
    scene.add(torusKnot);

    const light = new THREE.DirectionalLight(0xffffff, 1);
    light.position.set(0, 0, 1);
    scene.add(light);

    camera.position.z = 30;

    function animate() {
        requestAnimationFrame(animate);
        torusKnot.rotation.x += 0.01;
        torusKnot.rotation.y += 0.01;
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
