<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Filtering test</title>
    <meta name="description" content="Feature of filtering" />
    <?php include 'external-script.php'; ?>
    
</head>
<body data-page="catalogPag">
<?php include 'navbar.php'; ?>

    <div class="container">
        <h1>Catalogue with pag</h1>
        <br>
        <ul class="nav nav-pills">
            <li><a href="gallery.php">Catalogue</a></li>
            <li><a href="catalog.php">Catalogue with filters</a></li>
            <li class="active"><a href="catalog-pag.php">Catalogue wuth pag</a></li>
            <li id="compare-tab"><a href="compare.php">Compare the goods<span class="badge"></span></a></li>
            <li><a href="cart.php">Cart<span id="total-cart-count" class="badge"></span></a></li>
            <li><a href="order.php">Order</a></li>
        </ul>
        <br />
        <div class="row">
            <div class="btn-group col-md-6">
                <button type="button" data-category="0" class="btn btn-default active js-category">All categories</button>
                <button type="button" data-category="1" class="btn btn-default js-category">Econom</button>
                <button type="button" data-category="2" class="btn btn-default js-category">SUV</button>
                <button type="button" data-category="3" class="btn btn-default js-category">Convertible</button>
                <button type="button" data-category="4" class="btn btn-default js-category">Business</button>
            </div>
            <div class="btn-group col-md-6">
                <button type="button" data-theme="big" class="btn btn-default js-theme" title="Big image"><span class="glyphicon glyphicon-th-large"></span></button>
                <button type="button" data-theme="compact" class="btn btn-default js-theme" title="Comact image"><span class="glyphicon glyphicon-th"></span></button>
                <button type="button" data-theme="list" class="btn btn-default js-theme" title="List"><span class="glyphicon glyphicon-list"></span></button>
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col-md-2">
                Cars in the page:
                <select id="pages-limit" class="form-control col-md-3">
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="100">100</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul id="pagination" class="pagination"></ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                Showed cars: <span id="goods-info"></span>
            </div>
        </div>
        <ul id="goods" class="list-unstyled">
            <img src="img/loading.gif" alt="" />
        </ul>
    </div>

    <script id="goods-template-compact" type="text/template">
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
                >Add to Cart</button>
                <button
                    class="btn btn-link btn-sm js-add-to-compare"
                    data-id="<%= item.good_id %>"
                    data-category-id="<%= item.category_id %>"
                >Add to comarison</button>
            </div>
        </li>
        <% }); %>
    </script>

    <script id="goods-template-big" type="text/template">
        <% _.each(goods, function(item) { %>
        <li class="good-item row">
            <div class="col-md-4">
                <img class="good-item__img" src="img/goods/<%= item.photo %>" />
            </div>
            <div class="col-md-8">
                <div class="good-item__id">Articule <%= item.good_id %></div>
                <div class="good-item__name"><%- item.good %></div>
                <div class="good-item__price"><%= item.price %> $.</div>
                <button
                    class="good-item__btn-add btn btn-info btn-sm js-add-to-cart"
                    data-id="<%= item.good_id %>"
                    data-name="<%- item.good %>"
                    data-price="<%= item.price %>"
                >Add to Cart</button>
            </div>
        </li>
        <% }); %>
    </script>

    <script id="goods-template-list" type="text/template">
        <br />
        <br />
        <% _.each(goods, function(item) { %>
        <li class="row">
            <div class="col-md-12">
                <p>
                    Articule <%= item.good_id %>, <%- item.good %>. Price: <%= item.price %> руб.
                    <a
                        class="btn btn-link btn-sm js-add-to-cart"
                        data-id="<%= item.good_id %>"
                        data-name="<%- item.good %>"
                        data-price="<%= item.price %>"
                    >Add to Cart</a>
                </p>
            </div>
        </li>
        <% }); %>
    </script>

    <script id="pagination-template" type="text/template">
        <% if (page !== 1) { %>
        <li data-page="1"><a href>&laquo;</a></li>
        <li data-page="<%= page-1 %>"><a href>&lt;</a></li>
        <% } %>

        <% for (var i = 1; i <= countPages; i++) { %>
        <li data-page="<%= i %>" <%= (i === page) ? ' class="active"' : '' %>><a href><%= i %></a></li>
        <% } %>

        <% if (page !== countPages) { %>
        <li data-page="<%= page + 1 %>"><a href>&gt;</a></li>
        <li data-page="<%= countPages %>"><a href>&raquo;</a></li>
        <% } %>
    </script>

    <?php include 'footbar.php'; ?>

    <script src="js/vendor/jquery.min.js" type="text/javascript"></script>
    <script src="js/vendor/jquery.cookie.js" type="text/javascript"></script>
    <script src="js/vendor/underscore.min.js" type="text/javascript"></script>
    <script src="js/modules/catalogPag.js" type="text/javascript"></script>
    <script src="js/modules/cart.js" type="text/javascript"></script>
    <script src="js/modules/compare.js" type="text/javascript"></script>
    <script src="js/modules/main.js" type="text/javascript"></script>
    <script src="js/modules/header-footer.js" type="text/javascript"></script>
</body>
</html>