<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>XYZ PHARMACEUTICALS - Home</title>
    <!-- Link to the main stylesheet -->
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<header>
    <nav class="navbar">
        <div class="branding">
            <h2><a href="../index.php" class="branding-logo">XYZ</a></h2>
        </div>
        <label for="input-hamburgr" class="hamburger"></label>
        <ul class="menu">
            <li>
                <a href="index.php" class="menu-link">
                    <input id="input-hamburger" type="checkbox" hidden="true"/>
                    Home
                </a>
            <li><a href="pages/about_us.php" class="menu-link">About Us</a></li>
            <li><a href="pages/products.php" class="menu-link">Products</a></li>
            <li><a href="pages/contact_us.php" class="menu-link">Contact Us</a></li>
            <li><a href="pages/candidate_login.php" class="menu-link">Careers</a></li>
            <li><a href="pages/quote_us.php" class="menu-link">Quote Us</a></li>
            <li><a href="pages/admin_login.php" class="menu-link">Admin Login</a></li>
        </ul>
    </nav>
</header>


<div id="container">
    <section class="hero-section">
        <div class="hero-content">
            <h1>Welcome to XYZ Pharmaceuticals</h1>
            <p>Revolutionizing Healthcare with Innovative Solutions</p>
            <a href="pages/about_us.php" class="btn btn-primary">Learn More</a>
        </div>
    </section>

    <section class="testimonial-section">
        <div class="testimonial-wrapper">
            <div class="testimonial-item">
                <div class="testimonial-content">
                    <p>"XYZ Pharmaceuticals has transformed the way we approach healthcare. Their products have made a
                        significant impact on patient outcomes."</p>
                </div>
                <div class="testimonial-author">
                    <img src="images/man.png" alt="User 1">
                    <p>John Doe</p>
                </div>
            </div>
            <div class="testimonial-item">
                <div class="testimonial-content">
                    <p>"I have been using XYZ Pharmaceuticals' products for years, and I am impressed with their quality
                        and effectiveness. Highly recommended!"</p>
                </div>
                <div class="testimonial-author">
                    <img src="images/woman.png" alt="User 2">
                    <p>Jane Smith</p>
                </div>
            </div>
        </div>
    </section>

    <section class="infographic-section">
        <div class="infographic-content">
            <div class="infographic-item">
                <img src="images/advanced_formulations2.jpg" alt="Infographic 1">
                <h3>Advanced Formulations</h3>
                <p>Our products are developed using state-of-the-art technology and innovative formulations.</p>
            </div>
            <div class="infographic-item">
                <img src="images/quality_assurance.jpg" alt="Infographic 2">
                <h3>Quality Assurance</h3>
                <p>We prioritize quality and adhere to strict quality control measures to ensure the safety and efficacy
                    of our products.</p>
            </div>
            <div class="infographic-item">
                <img src="images/global_reach2.jpg" alt="Infographic 3">
                <h3>Global Reach</h3>
                <p>With a strong global presence, we cater to healthcare needs worldwide, delivering our products to
                    various markets.</p>
            </div>
        </div>
    </section>



    <footer class="links">
        <a href="pages/site_map.php">Sitemap</a><br/>
        <a href="pages/about_us.php">About Us</a><br/>
        <a href="pages/contact_us.php">Contact Us</a><br/>
    </footer>
    <footer class="page-footer">All right reserved. Terms and conditions apply<br/>
        <small>Copyright &copy; XYZ 2023 - <?php
            /*Update the yeat automatically*/
            echo date("Y");?> <br/>
        </small>
    </footer>
</div>
</body>
</html>

</div>
</body>
</html>
