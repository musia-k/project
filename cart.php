<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Filtering test</title>
    <meta name="description" content="Feature of filtering" />
    
    <?php include 'external-script.php'; ?>
</head>
<body data-page="cart">
<?php include 'navbar.php'; ?>

    <div class="container">
        <h1>Cart</h1>
        <br />
        <ul class="nav nav-pills">
            <li><a href="gallery.php">Catalogue</a></li>
            <li><a href="catalog.php">Catalogue with filtering</a></li>
            <li><a href="catalog-pag.php">Catalogue with the pag</a></li>
            <li id="compare-tab"><a href="compare.php">Compare the goods<span class="badge"></span></a></li>
            <li class="active"><a href="cart.php">Cart<span id="total-cart-count" class="badge"></span></a></li>
            <li><a href="order.php">Order</a></li>
        </ul>
        <br />
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Articule</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Amount of</th>
                        <th>Sum</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="cart">
                    <tr><td colspan="6"><img src="img/loading.gif" alt="" /></td></tr>
                </tbody>
            </table>
        </div>
        <div>Overall: <span id="total-cart-summa">45</span> $.</div>
        <br />
        <a class="btn btn-info" href="order.php">Order</a>
    </div>

    <script id="cart-template" type="text/template">
        <% _.each(goods, function(good) { %>
            <tr class="cart-item js-cart-item" data-id="<%= good.id %>">
                <td><%= good.id %></td>
                <td><%- good.name %></td>
                <td><%= good.price %> $.</td>
                <td>
                    <span 
                        class="cart-item__btn-dec-count js-change-count" 
                        title="Decrease by 1" 
                        data-id="<%= good.id %>" 
                        data-delta="-1"
                    >
                        <span class="glyphicon glyphicon-minus"></span>
                    </span>
                    <span class="js-count"><%= good.count %></span>
                    <span 
                        class="cart-item__btn-inc-count js-change-count" 
                        title="Increase by 1" 
                        data-id="<%= good.id %>" 
                        data-delta="1"
                    >
                        <span class="glyphicon glyphicon-plus"></span>
                    </span>
                </td>
                <td><span class="js-summa"><%= good.count * good.price %></span> руб.</td>
                <td>
                    <span class="cart-item__btn-remove js-remove-from-cart" title="Delete from cart" data-id="<%= good.id %>">
                        <span class="glyphicon glyphicon-remove"></span>                                
                    </span>
                </td>
            </tr>
        <% }); %>
    </script>

    <?php include 'footbar.php'; ?>

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