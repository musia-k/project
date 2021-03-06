<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Filtering test</title>
    <meta name="description" content="Feature of filtering" />
    
    <link href="components/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css">
    
    <?php include 'external-script.php'; ?>

</head>

<body data-page="catalogDB">
<?php include 'navbar.php'; ?>

    <div class="container">
        <h1>Catalogue with pag</h1>
        <br>
        <ul class="nav nav-pills">
            <li><a href="gallery.php">Catalogue</a></li>
            <li class="active"><a href="catalog.php">Catalogue with filters</a></li>
            <li><a href="catalog-pag.php">Catalogue wuth pag</a></li>
            <li id="compare-tab"><a href="compare.php">Compare the goods<span class="badge"></span></a></li>
            <li><a href="cart.php">Cart<span id="total-cart-count" class="badge"></span></a></li>
            <li><a href="order.php">Order</a></li>
        </ul>
    
        <div id="filters" class="col-md-12"></div>
        <div class="btn-group">
            <button type="button" data-category="0" class="btn btn-default active js-category">All Categories</button>
            <button type="button" data-category="1" class="btn btn-default js-category">ECONOM</button>
            <button type="button" data-category="2" class="btn btn-default js-category">SUV</button>
            <button type="button" data-category="3" class="btn btn-default js-category">Convertible</button>
            <button type="button" data-category="4" class="btn btn-default js-category">Business</button>
        </div>
        <br>
        <br>
        <form id="filters-form" role="form">
            <div class="col-md-4">
                <h4>Brand</h4>
                <div id="brands">
                    <div class="row-md-2">
                    <div class="col-md-6">
                    <div class="checkbox"><label><input type="checkbox" name="brands[]" value="1">Skoda</label></div>
                    <div class="checkbox"><label><input type="checkbox" name="brands[]" value="2">Hyundai</label></div>
                    <div class="checkbox"><label><input type="checkbox" name="brands[]" value="3">Suzuki</label></div>
                    <div class="checkbox"><label><input type="checkbox" name="brands[]" value="4">Citroen</label></div>
                    <div class="checkbox"><label><input type="checkbox" name="brands[]" value="5">Toyota</label></div>
                    </div>
                    <div class="col-md-6">
                    <div class="checkbox"><label><input type="checkbox" name="brands[]" value="6">Kia</label></div>
                    <div class="checkbox"><label><input type="checkbox" name="brands[]" value="7">Audi</label></div>
                    <div class="checkbox"><label><input type="checkbox" name="brands[]" value="8">Ford</label></div>
                    <div class="checkbox"><label><input type="checkbox" name="brands[]" value="9">Volkswagen</label></div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <h4>Filter by price</h4>
                <div id="prices-label">10 - 500 $.</div>
                <br>
                <input type="hidden" id="min-price" name="min_price" value="10">
                <input type="hidden" id="max-price" name="max_price" value="500">
                <div id="prices"></div>
            </div>
            <div class="col-md-4">
                <h4>Sort</h4>
                <br>
                <select id="sort" name="sort" class="form-control">
                    <option value="price_asc">By price, the cheapest firstly</option>
                    <option value="price_desc">By price, the most expensive firstly</option>
                    <option value="rating_desc">By rating</option>
                    <option value="good_asc">By name, A-Z</option>
                    <option value="good_desc">By name, Z-A</option>
                </select>
            </div>
        </form>
        <br>
        <ul id="goods" class="col-md-12">
            <img src="img/loading.gif" alt="" />
        </ul>
    </div>

    <script id="goods-template" type="text/template">
        <% _.each(goods, function(item) { %>
        <li class="small-good-item row">
            <div class="col-md-2">
                <img class="small-good-item__img" src="img/goods/<%= item.photo %>" />
            </div>
            <div class="col-md-10">
                <div class="small-good-item__id">Articule <%= item.good_id %></div>
                <div class="small-good-item__name"><%- item.good %> (rating <%= item.rating %>)</div>
                <div class="small-good-item__brand">Brand: <%- item.brand %></div>
                <div class="small-good-item__price"><%= item.price %> $.</div>
                <button
                    class="small-good-item__btn-add btn btn-info btn-sm js-add-to-cart"
                    data-id="<%= item.good_id %>"
                    data-name="<%- item.good %>"
                    data-price="<%= item.price %>"
                >Add to chart</button>
                <button
                    class="btn btn-link btn-sm js-add-to-compare"
                    data-id="<%= item.good_id %>"
                    data-category-id="<%= item.category_id %>"
                >Add to comparison</button>
            </div>
        </li>
        <% }); %>
    </script>

    <script id="brands-template" type="text/template">
        <% _.each(brands, function(item) { %>
        <div class="checkbox"><label><input type="checkbox" name="brands[]" value="<%= item.id %>"> <%= item.brand %></label></div>
        <% }); %>
    </script>

    <?php include 'footbar.php'; ?>

    <script src="js/vendor/jquery.min.js" type="text/javascript"></script>
    <script src="js/vendor/jquery.cookie.js" type="text/javascript"></script>
    <script src="components/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="js/vendor/underscore.min.js" type="text/javascript"></script>
    <script src="js/modules/catalogDB.js" type="text/javascript"></script>
    <script src="js/modules/cart.js" type="text/javascript"></script>
    <script src="js/modules/compare.js" type="text/javascript"></script>
    <script src="js/modules/main.js" type="text/javascript"></script>
    <script src="js/modules/header-footer.js" type="text/javascript"></script>
</body>
</html>