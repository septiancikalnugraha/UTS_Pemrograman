<?php
// Start session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page
    header("Location: login.php");
    exit();
}
?>
<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan - HP SmartCare</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Add Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #0069d9;
            --secondary-color: #0056b3;
            --accent-color: #17a2b8;
            --light-color: #f8f9fa;
            --dark-color: #343a40;
            --text-color: #495057;
            --border-radius: 8px;
            --box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-color);
            line-height: 1.6;
            background-color: #f8f9fa;
        }
        
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }
        
        /* Updated Navbar Styles to match image */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }
        
        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .logo {
            display: flex;
            align-items: center;
            font-weight: 600;
            color: var(--primary-color);
            text-decoration: none;
            font-size: 1.2rem;
        }
        
        .logo i {
            margin-right: 8px;
        }
        
        .brand-text {
            color: var(--primary-color);
            font-weight: 600;
            text-decoration: none;
        }
        
        .nav-menu {
            display: flex;
            list-style: none;
            margin-left: 20px;
        }
        
        .nav-menu li {
            margin-left: 20px;
        }
        
        .nav-menu a {
            color: var(--dark-color);
            text-decoration: none;
            font-weight: 500;
            padding: 8px 12px;
            position: relative;
            transition: var(--transition);
        }
        
        /* Style for active menu item with underline */
        .nav-menu a.active {
            color: var(--primary-color);
            font-weight: 600;
        }
        
        .nav-menu a.active::after {
            content: "";
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            height: 3px;
            background-color: var(--primary-color);
            border-radius: 2px;
        }
        
        .nav-menu a:hover {
            color: var(--primary-color);
        }
        
        /* Logout button style */
        .logout-btn {
            background-color: #fff;
            color: #dc3545 !important;
            border: 1px solid #dc3545;
            border-radius: 20px;
            padding: 8px 20px !important;
            transition: var(--transition);
            display: flex;
            align-items: center;
        }
        
        .logout-btn i {
            margin-right: 5px;
        }
        
        .logout-btn:hover {
            background-color: #dc3545;
            color: white !important;
        }
        
        /* Hero Section */
        .hero-section {
            padding: 120px 0 60px;
            text-align: center;
            background: linear-gradient(to right, #0069d9, #0056b3);
            color: white;
        }
        
        .hero-title {
            font-size: 2.5rem;
            margin-bottom: 15px;
            font-weight: 700;
        }
        
        .hero-subtitle {
            font-size: 1.2rem;
            max-width: 800px;
            margin: 0 auto 30px;
            opacity: 0.9;
        }
        
        /* Features Section */
        .features-section {
            padding: 80px 0;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }
        
        .section-title h2 {
            font-size: 2rem;
            color: var(--dark-color);
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
        }
        
        .section-title h2::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: -10px;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background-color: var(--primary-color);
            border-radius: 2px;
        }
        
        .section-title p {
            max-width: 700px;
            margin: 0 auto;
            font-size: 1.1rem;
            color: #6c757d;
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }
        
        .feature-box {
            background-color: white;
            border-radius: var(--border-radius);
            padding: 30px;
            box-shadow: var(--box-shadow);
            transition: var(--transition);
            height: 100%;
        }
        
        .feature-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }
        
        .feature-box h3 {
            display: flex;
            align-items: center;
            color: var(--primary-color);
            margin-bottom: 15px;
            font-size: 1.3rem;
        }
        
        .feature-box h3 i {
            margin-right: 10px;
            background-color: rgba(0, 105, 217, 0.1);
            color: var(--primary-color);
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }
        
        .feature-box p {
            margin-bottom: 20px;
            color: #6c757d;
        }
        
        .feature-box ul {
            list-style: none;
        }
        
        .feature-box ul li {
            padding: 8px 0;
            display: flex;
            align-items: center;
        }
        
        .feature-box ul li::before {
            content: "✓";
            color: var(--accent-color);
            font-weight: bold;
            margin-right: 10px;
        }
        
        /* Footer */
        .footer {
            background-color: var(--dark-color);
            color: white;
            padding: 50px 0 20px;
        }
        
        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }
        
        .footer-column h3 {
            font-size: 1.2rem;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }
        
        .footer-column h3::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            width: 40px;
            height: 3px;
            background-color: var(--accent-color);
        }
        
        .footer-column ul {
            list-style: none;
        }
        
        .footer-column ul li {
            margin-bottom: 10px;
        }
        
        .footer-column a {
            color: #b3b3b3;
            text-decoration: none;
            transition: var(--transition);
        }
        
        .footer-column a:hover {
            color: white;
            padding-left: 5px;
        }
        
        .footer-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .copyright {
            font-size: 0.9rem;
            color: #b3b3b3;
        }
        
        .social-icons a {
            color: white;
            background-color: rgba(255, 255, 255, 0.1);
            width: 36px;
            height: 36px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin-left: 10px;
            transition: var(--transition);
        }
        
        .social-icons a:hover {
            background-color: var(--accent-color);
            transform: translateY(-3px);
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
                padding: 15px;
            }
            
            .logo {
                margin-bottom: 15px;
            }
            
            .nav-menu {
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .nav-menu li {
                margin: 5px;
            }
            
            .hero-title {
                font-size: 2rem;
            }
            
            .footer-content {
                grid-template-columns: 1fr;
            }
            
            .footer-bottom {
                flex-direction: column;
                text-align: center;
            }
            
            .social-icons {
                margin-top: 15px;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo">
                <i class="fas fa-mobile-alt"></i>
                HP SmartCare
            </div>
            <ul class="nav-menu">
                <li><a href="homepage.php">Home</a></li>
                <li><a href="layanan.php" class="active">Layanan</a></li>
                <li><a href="topup.php">Top Up</a></li>
                <li><a href="hubungi.php" class="contact-btn">Hubungi Kami</a></li>
                <li><a href="logout.php" class="logout-btn">Logout</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1 class="hero-title">Layanan Kami</h1>
            <p class="hero-subtitle">Kami menyediakan layanan perbaikan berkualitas untuk berbagai masalah smartphone, baik software maupun hardware.</p>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <div class="features-grid">
                <div class="feature-box">
                    <h3><i class="fas fa-code"></i> Software</h3>
                    <p>Mengatasi berbagai masalah perangkat lunak pada smartphone Anda dengan solusi profesional dan efektif.</p>
                    <ul>
                        <li>Lupa Pola/Pin</li>
                        <li>Lupa akun Google</li>
                        <li>Bootloop</li>
                        <li>Update OS & Firmware</li>
                        <li>Pemulihan Data</li>
                    </ul>
                </div>
                
                <div class="feature-box">
                    <h3><i class="fas fa-microchip"></i> Hardware</h3>
                    <p>Perbaikan fisik dan komponen dengan teknisi berpengalaman dan spare part berkualitas tinggi.</p>
                    <ul>
                        <li>ACP (Audio, Camera, Power)</li>
                        <li>Ganti LCD</li>
                        <li>Ganti Battery</li>
                        <li>Tombol on/off</li>
                        <li>Connector Charge</li>
                        <li>DLL</li>
                    </ul>
                </div>
                
                <div class="feature-box">
                    <h3><i class="fas fa-shield-alt"></i> Keunggulan Kami</h3>
                    <p>Kenapa memilih HP SmartCare untuk kebutuhan perbaikan smartphone Anda?</p>
                    <ul>
                        <li>Teknisi profesional berpengalaman</li>
                        <li>Garansi layanan</li>
                        <li>Spare part original</li>
                        <li>Bisa ditunggu</li>
                        <li>Harga transparan dan bersaing</li>
                        <li>Konsultasi gratis</li>
                    </ul>
                </div>
                
                <div class="feature-box">
                    <h3><i class="fas fa-mobile-alt"></i> Perangkat yang Kami Tangani</h3>
                    <p>Kami menangani berbagai merek dan tipe smartphone populer di Indonesia.</p>
                    <ul>
                        <li>iPhone (iOS)</li>
                        <li>Samsung</li>
                        <li>Xiaomi</li>
                        <li>Oppo</li>
                        <li>Vivo</li>
                        <li>Dan merek Android lainnya</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-bottom">
                <div class="copyright">
                    &copy; 2025 HP SmartCare. All Rights Reserved.
                </div>
        <div class="social-icons">
            <a href="#"><i class="fab fa-tiktok"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-whatsapp"></i></a>
        </div>
            </div>
        </div>
    </footer>
</body>
</html>