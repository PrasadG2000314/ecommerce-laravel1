@extends('layouts.navigation')

@section('title', 'Home - 3D Store')

@section('content')
<div class="contact-wrapper">
    <!-- Animated Hero -->
    <div class="contact-hero">
        <div id="hero-animation"></div>
        <h1>Get In Touch</h1>
    </div>

    <div class="contact-container">
        <!-- Contact Information -->
        <div class="contact-info">
            <div class="info-card">
                <i class="fas fa-map-marker-alt"></i>
                <h3>Visit Us</h3>
                <p>123 Innovation Street</p>
                <p>Tech Valley, CA 94025</p>
            </div>

            <div class="info-card">
                <i class="fas fa-phone"></i>
                <h3>Call Us</h3>
                <p>+1 (555) 123-4567</p>
                <p>Mon - Fri: 9AM - 6PM</p>
            </div>

            <div class="info-card">
                <i class="fas fa-envelope"></i>
                <h3>Email Us</h3>
                <p>support@3dstore.com</p>
                <p>sales@3dstore.com</p>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="contact-form-container">
            <form class="contact-form" id="contactForm">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="subject">Subject</label>
                    <select id="subject" name="subject">
                        <option value="general">General Inquiry</option>
                        <option value="support">Technical Support</option>
                        <option value="sales">Sales</option>
                        <option value="feedback">Feedback</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>

                <button type="submit" class="submit-btn">Send Message</button>
            </form>
        </div>
    </div>

    <!-- Map Section -->
    <div class="map-section">
        <div id="map"></div>
    </div>
</div>

<style>
    .contact-wrapper {
        min-height: 100vh;
        background: var(--dark);
        color: var(--light);
    }

    .contact-hero {
        height: 40vh;
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

    .contact-hero h1 {
        font-size: 3.5rem;
        z-index: 2;
        background: linear-gradient(45deg, var(--primary), var(--secondary));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .contact-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 4rem 2rem;
        display: grid;
        grid-template-columns: 1fr 2fr;
        gap: 4rem;
    }

    .contact-info {
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    .info-card {
        background: rgba(255, 255, 255, 0.05);
        padding: 2rem;
        border-radius: 15px;
        transition: transform 0.3s ease;
    }

    .info-card:hover {
        transform: translateY(-10px);
        background: rgba(255, 255, 255, 0.1);
    }

    .info-card i {
        font-size: 2rem;
        color: var(--secondary);
        margin-bottom: 1rem;
    }

    .contact-form-container {
        background: rgba(255, 255, 255, 0.05);
        padding: 3rem;
        border-radius: 15px;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        color: var(--light);
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 1rem;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 8px;
        color: var(--light);
        transition: all 0.3s ease;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: var(--primary);
        background: rgba(255, 255, 255, 0.15);
    }

    .submit-btn {
        width: 100%;
        padding: 1rem;
        background: var(--primary);
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .submit-btn:hover {
        background: var(--secondary);
        transform: translateY(-2px);
    }

    .map-section {
        height: 400px;
        margin-top: 4rem;
    }

    #map {
        width: 100%;
        height: 100%;
        border-radius: 15px;
        overflow: hidden;
    }

    @media (max-width: 768px) {
        .contact-container {
            grid-template-columns: 1fr;
        }

        .contact-hero h1 {
            font-size: 2.5rem;
        }
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
    const geometry = new THREE.SphereGeometry(1, 32, 32);
    const material = new THREE.MeshPhongMaterial({
        color: 0x2563eb,
        wireframe: true
    });

    const spheres = [];
    for(let i = 0; i < 3; i++) {
        const sphere = new THREE.Mesh(geometry, material);
        sphere.position.set(
            (Math.random() - 0.5) * 5,
            (Math.random() - 0.5) * 5,
            (Math.random() - 0.5) * 5
        );
        spheres.push(sphere);
        scene.add(sphere);
    }

    const light = new THREE.DirectionalLight(0xffffff, 1);
    light.position.set(0, 0, 1);
    scene.add(light);

    camera.position.z = 5;

    function animate() {
        requestAnimationFrame(animate);
        spheres.forEach(sphere => {
            sphere.rotation.x += 0.01;
            sphere.rotation.y += 0.01;
        });
        renderer.render(scene, camera);
    }

    animate();

    // Form Handling
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        // Add your form submission logic here

        // Success animation example
        this.querySelector('.submit-btn').textContent = 'Message Sent ✓';
        setTimeout(() => {
            this.querySelector('.submit-btn').textContent = 'Send Message';
        }, 3000);
    });

    // Responsive handling
    window.addEventListener('resize', () => {
        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(window.innerWidth, window.innerHeight);
    });
</script>
@endsection
