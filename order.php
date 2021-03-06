<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Filtering test</title>
    <meta name="description" content="Feature of filtering" />
    <?php include 'external-script.php'; ?>

</head>
<body data-page="order">
<?php include 'navbar.php'; ?>

    <div class="container">
        <h1>Order</h1>
        <ul class="nav nav-pills">
            <li><a href="gallery.php">Catalogue</a></li>
            <li><a href="catalog.php">Catalogue with filters</a></li>
            <li><a href="catalog-pag.php">Catalogue with pag</a></li>
            <li id="compare-tab"><a href="compare.php">Comparison<span class="badge"></span></a></li>
            <li><a href="cart.php">Cart<span id="total-cart-count" class="badge"></span></a></li>
            <li class="active"><a href="order.php">Order</a></li>
        </ul>
        <br />
        <br />
        <div id="order-message" class="alert alert-info"></div>
        <br />
        <form id="order-form" class="form-horizontal" role="form">
            <div class="form-group">
                <label for="input-name" class="col-sm-2 control-label">Your name *</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="input-name" name="name" placeholder="Your name">
                </div>
            </div>
            <div class="form-group">
                <label for="input-email" class="col-sm-2 control-label">Email *</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" id="input-email" name="email" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <label for="input-phone" class="col-sm-2 control-label">Mobile phone</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="input-phone" name="phone" placeholder="Phone">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Way of delivery</label>
                <div class="col-sm-6">
                    <input type="hidden" name="delivery_type" id="delivery-type" value="" />
                    <input type="hidden" name="delivery_summa" id="delivery-summa" value="0" />
                    <input type="hidden" name="full_summa" id="full-summa" value="0" />
                    <div class="radio">
                        <label><input type="radio" name="delivery" class="js-delivery-type" data-type="By yourself" data-summa="0" checked>By yourself (free)</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="delivery" class="js-delivery-type" data-type="In the EU area" data-summa="200">In the EU area (200 $)</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="delivery" class="js-delivery-type" data-type="In the Scandinavian Area" data-summa="300">In the Scandinavian Area (300 $)</label>
                    </div>
                    <br />
                    <div id="alert-delivery" class="alert alert-info"></div>
                </div>
            </div>
            <div class="form-group">
                <label for="input-address" class="col-sm-2 control-label">Adress of picking</label>
                <div class="col-sm-6">
                    <textarea class="form-control" id="input-address" name="address" placeholder="Adress of picking" row="3"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="input-message" class="col-sm-2 control-label">Message</label>
                <div class="col-sm-6">
                    <textarea class="form-control" id="input-message" name="message" placeholder="Additional info" row="3"></textarea>
                    <br />
                    <div id="alert-validation" class="alert alert-danger hidden">
                        <button type="button" class="close js-close-alert">&times;</button>
                        <strong>Error!</strong> Fill the needed gaps *
                    </div>
                    <div id="alert-order-done" class="alert alert-success hidden">
                        <button type="button" class="close js-close-alert">&times;</button>
                        <strong>Thanks for the order!</strong> Will contanct you soon
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-6">
                    <button id="order-btn" type="submit" class="btn btn-primary">Send the order</button>
                </div>
            </div>
        </form>
    </div>

    <script id="order-message-template" type="text/template">
        <% if (count !== 0) { %>
            In your cart <%= count %> order(s) in total sum of <%= summa %> $.
            Fill the form below and press button Send the order.
        <% } else { %>
            Your cart is empty. Add at least one car.
        <% } %>
    </script>

    <?php include 'footbar.php'; ?>

    <script src="js/vendor/jquery.min.js" type="text/javascript"></script>
    <script src="js/vendor/jquery.cookie.js" type="text/javascript"></script>
    <script src="js/vendor/underscore.min.js" type="text/javascript"></script>
    <script src="js/modules/cart.js" type="text/javascript"></script>
    <script src="js/modules/order.js" type="text/javascript"></script>
    <script src="js/modules/compare.js" type="text/javascript"></script>
    <script src="js/modules/main.js" type="text/javascript"></script>
    <script src="js/modules/header-footer.js" type="text/javascript"></script>
</body>
</html>