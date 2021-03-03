<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Filtering test</title>
    <meta name="description" content="Feature of filtering" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,700&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/header-footer.css">
    <link href="css/main.css" rel="stylesheet" type="text/css">
    
</head>
<body data-page="catalog">
<?php include 'navbar.php'; ?>
    <div class="container">
        
        <h1>Catalogue</h1>
        <ul class="nav nav-pills">
            <li class="active"><a href="gallery.php">Catalogue</a></li>
            <li><a href="catalog.php">Catalogue with filters</a></li>
            <li><a href="catalog-pag.php">Catalogue with pag</a></li>
            <li id="compare-tab"><a href="compare.php">Comparison of goods<span class="badge"></span></a></li>
            <li><a href="cart.php">Chart<span id="total-cart-count" class="badge"></span></a></li>
            <li><a href="order.php">Order</a></li>
        </ul>
        <br />
        <ul id="goods" class="list-unstyled">
            <img src="img/loading.gif" alt="" />
        </ul>
    </div>

    <script id="catalog-template" type="text/template">
        <% _.each(goods, function(good) { %>
            <li class="good-item row">
                <div class="col-md-4">
                    <img class="good-item__img" src="<%- good.img %>" />
                </div>
                <div class="col-md-8">
                    <div class="good-item__id">Articule <%= good.id %></div>
                    <div class="good-item__name"><%- good.name %></div>
                    <div class="good-item__price"><%= good.price %> $.</div>
                    <button 
                        class="good-item__btn-add btn btn-info btn-sm js-add-to-cart"
                        data-id="<%= good.id %>"
                        data-name="<%- good.name %>"
                        data-price="<%= good.price %>"
                    >Add to chart</button>
                </div>
            </li>
        <% }); %>
    </script>

    <script src="js/vendor/jquery.min.js" type="text/javascript"></script>
    <script src="js/vendor/jquery.cookie.js" type="text/javascript"></script>
    <script src="js/vendor/underscore.min.js" type="text/javascript"></script>
    <script src="js/modules/catalog.js" type="text/javascript"></script>
    <script src="js/modules/cart.js" type="text/javascript"></script>
    <script src="js/modules/compare.js" type="text/javascript"></script>
    <script src="js/modules/main.js" type="text/javascript"></script>
    <script src="js/modules/header-footer.js" type="text/javascript"></script>
    
</body>
</html>