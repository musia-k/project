<!-- page styles -->
<?php
    // page styles
    $pagestyle = "";

    // main container class
    $containerclass = "";

    // web title
    $webtitle = "";

    switch ($page) {
        case 'home':
            $pagestyle = "styles/home.css";
            $webtitle = "Home";
            break;

        case 'gallery':
            $pagestyle = "styles/rama.css";
            $webtitle = "Gallery";
            $containerclass = "page-gallery";
            break;
        
        case 'about-us':
            $pagestyle = "styles/about_us.css";
            $webtitle = "About Us";
            break;
        
        case 'faq':
            $pagestyle = "styles/rama.css";
            $webtitle = "Frequently Asked Question";
            $containerclass = "page-faq";
            break;

        case 'rules':
            $pagestyle = "styles/rules-styles.css";
            $webtitle = "Rules";
            break;

        default:
            # code...
            break;
    }
?>
<!-- main container class -->

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="header-footer.css">
    
    <!-- Page Styles -->
    <link rel="stylesheet" href="<?php echo $pagestyle; ?>">
    

    <title><?php echo $webtitle; ?></title>
  </head>

  <body>
    <!-- main container -->
    <div class="container-main <?php echo $containerclass; ?> mx-auto">
    
        <!-- Header -->
        <header class="custom-header mx-auto">
            <nav>
                <div class="row align-items-center mx-auto text-center">
                    <div class="col">
                        <a href="home.php" class="text-nav"><img src="src/logo/logo-nav-header.png" alt="rmr" class="header-image" style="margin-left: -2rem;"></a>
                    </div>
                    <div class="col">
                        <a href="home.php" class="text-nav"><?php if ($page == "home"){echo '<span class="active"> HOME </span>';} else {echo "HOME";} ?></a>
                    </div>
                    <div class="col">
                        <a href="gallery.php" class="text-nav"><?php if ($page == "gallery"){echo '<span class="active"> GALLERY </span>';} else {echo "GALLERY";} ?></a>
                    </div>
                    <div class="col">
                        <a href="about-us.php" class="text-nav"><?php if ($page == "about-us"){echo '<span class="active">ABOUT US</span>';} else {echo "ABOUT US";} ?></a>
                    </div>
                    <div class="col-3 col-md mobile-nav-margin-left mobile-nav-margin-top">
                        <a href="faq.php" class="text-nav"><?php if ($page == "faq"){echo '<span class="active">FAQ</span>';} else {echo "FAQ";} ?></a>
                    </div>
                    <div class="col-3 col-md mobile-nav-margin-top">
                        <a href="rules.php" class="text-nav"><?php if ($page == "rules"){echo '<span class="active">RULES</span>';} else {echo "RULES";} ?></a>
                    </div>
                </div>
            </nav>
        </header> <!-- end of header -->