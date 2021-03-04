<header>
    <div class="custom-header">
        <a href="home.php" class="logo"><img src="src/logo/logo-nav-header.png" alt="rmr" class="header-image"></a>
        <a href="#" id="toggle-nav">
            <i class="fas fa-bars"></i>
        </a>
        <nav class="custom-navbar">
            <div class="link"><a href="home.php" <?php if ($page == "home"){echo 'class="active"';} ?>>HOME</a></div>
            <div class="link"><a href="gallery.php" <?php if ($page == "gallery"){echo 'class="active"';} ?>>GALLERY</a></div>
            <div class="link"><a href="about-us.php" <?php if ($page == "about-us"){echo 'class="active"';} ?>>ABOUT US</a></div>
            <div class="link"><a href="faq.php" <?php if ($page == "faq"){echo 'class="active"';} ?>>FAQ</a></div>
            <div class="link"><a href="rules.php" <?php if ($page == "rules"){echo 'class="active"';} ?>>RULES</a></div>
        </nav>
    </div>
</header>