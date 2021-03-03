<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Filtering test</title>
    <meta name="description" content="Feature of filtering" />
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,700&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/main.css" rel="stylesheet" type="text/css">
</head>
<body data-page="compare">
    <div class="container">
        <h1>Comparison of items</h1>
        <ul class="nav nav-pills">
            <li><a href="gallery.php">Catalogue</a></li>
            <li><a href="catalog.php">Catalogue with filters</a></li>
            <li><a href="catalog-pag.php">Catalogue with pag</a></li>
            <li class="active" id="compare-tab"><a href="compare.php">Comparison of goods<span class="badge"></span></a></li>
            <li><a href="cart.php">Chart<span id="total-cart-count" class="badge"></span></a></li>
            <li><a href="order.php">Order</a></li>
        </ul>
        <br />
        <br />
        <div id="goods" class="col-md-12">
            <table id="compare-table" class="compare-table table table-bordered table-hover" data-compare="all">
                <thead>
                    <tr>
                        <!-- compare filters template -->
                        <!-- compare header template -->
                    </tr>
                </thead>
                <tbody>
                    <!-- compare content template -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Шаблон для фильтров -->
    <script id="compare-filters-template" type="text/template">
        <th>
            Show the properties:
            <% _.each(buttons, function(button) { %>
            <div class="radio">
                <label>
                    <input type="radio" class="js-compare-filter" name="filters" value="<%= button.value %>" <%= button.checked ? ' checked' : '' %>>
                    <%= button.title %>
                </label>
            </div>
            <% }); %>
        </th>
    </script>

    <!-- Шаблон для шапки таблицы -->
    <script id="compare-header-template" type="text/template">
        <% _.each(goods, function(good) { %>
        <th>
            <div class="compare-table__good"><%= good.good %></div>
            <img class="compare-table__photo" src="/img/goods/<%= good.photo %>" />
            <div class="compare-table__price"><%= good.price %> руб.</div>
            <div class="compare-table__remove js-compare-remove" data-id="<%= good.good_id %>">Delete comparison</div>
        </th>
        <% }); %>
    </script>

    <!-- Шаблон для содержимого таблицы - списка свойств -->
    <script id="compare-props-template" type="text/template">
        <% _.each(props, function(prop) { %>
        <tr <%= prop.equal ? 'class="-equal"' : '' %>>
            <td><%= prop.prop %></td>

            <% _.each(goods, function(goodId) { %>
            <td><%= (_.findWhere(prop.values, {goodId: goodId}) || {value: '&mdash;'}).value %></td>
            <% }); %>
        </tr>
        <% }); %>
    </script>

    <script src="js/vendor/jquery.min.js" type="text/javascript"></script>
    <script src="js/vendor/jquery.cookie.js" type="text/javascript"></script>
    <script src="js/vendor/underscore.min.js" type="text/javascript"></script>
    <script src="js/modules/cart.js" type="text/javascript"></script>
    <script src="js/modules/compare.js" type="text/javascript"></script>
    <script src="js/modules/main.js" type="text/javascript"></script>
</body>
</html>