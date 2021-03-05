<!-- page styles -->
<?php
    /* // page styles
    $pagestyle = "";

    // main container class
    $containerclass = "";

    // web title
    $webtitle = ""; */

    switch ($page) {
        case 'home':
            $pagestyle = "styles/home.css";
            $webtitle = "Home";
            break;

        /* case 'gallery':
            $pagestyle = "styles/rama.css";
            $webtitle = "Gallery";
            $containerclass = "page-gallery";
            break; */
        
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
    <link rel="stylesheet" href="css/header-footer.css">

    <!-- Google font -->
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,700&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    
    <!-- Page Styles -->
    <link rel="stylesheet" href="<?php echo $pagestyle; ?>">

    <title><?php echo $webtitle; ?></title>
  </head>

  <body>
    <!-- main container -->
    <div class="container-main <?php echo $containerclass; ?> mx-auto">
    
        <!-- Header -->
        <?php include 'navbar.php'; ?>
        <!-- end of header -->