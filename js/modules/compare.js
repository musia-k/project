'use strict';

// Compare the items
var compare = (function($) {

    var ui = {
        $body: $('body'),
        elAddToCompare: '.js-add-to-compare',
        elCompareFilters: '.js-compare-filter',
        elCompareRemove: '.js-compare-remove',
        $compareTab: $('#compare-tab'),
        $compareTable: $('#compare-table')
    };

    var tpl = {
        filters: _.template($('#compare-filters-template').html() || ''),
        header: _.template($('#compare-header-template').html() || ''),
        props: _.template($('#compare-props-template').html() || '')
    };

    var settings = {
        cookie: {
            goods: 'compared_goods',
            category: 'compared_category'
        }
    };

    // Adding item for comparison
    function _onClickAddToCompare(e) {
        var $button = $(e.target),
            goodId = $button.attr('data-id'),
            categoryId = $button.attr('data-category-id'),
            comparedGoodsStr = $.cookie(settings.cookie.goods),
            comparedGoodsArr = comparedGoodsStr ? comparedGoodsStr.split(',') : [],
            comparedCategoryId = $.cookie(settings.cookie.category);

        // Check the matching categories
        if (comparedCategoryId && categoryId !== comparedCategoryId) {
            alert('Не допускается сравнивать товары разных категорий');
            return false;
        }

        //Changing if it is in kuk
        if (comparedGoodsArr.indexOf(goodId) === -1) {
            // assing to comparing 
            comparedGoodsArr.push(goodId);
            $.cookie(settings.cookie.goods, comparedGoodsArr.join(','), {expires: 365, path: '/'});
            $.cookie(settings.cookie.category, categoryId, {expires: 365, path: '/'});
            updateCompareTab();
            alert('Товар добавлен к сравнению!');
        } else {
            alert('Этот товар уже есть в списке сравниваемых');
        }
    }

    // Change the filter
    function _onClickCompareFilters(e) {
        ui.$compareTable.attr('data-compare', e.target.value);
    }

    // Deleting from comparing
    function _onClickCompareRemove(e) {
        var id = $(e.target).attr('data-id'),
            goods = $.cookie(settings.cookie.goods).split(','),
            categoryId = $.cookie(settings.cookie.category),
            newGoods = _.without(goods, id),
            newGoodsStr = newGoods.join(',');

        // Delte kuk
        if (!newGoodsStr) {
            $.removeCookie(settings.cookie.goods, {path: '/'});
            $.removeCookie(settings.cookie.category, {path: '/'});
        }

        // change hash
        document.location.hash = newGoodsStr ? encodeURIComponent(categoryId + '|' + newGoodsStr) : '';
        document.location.reload();
    }

    // events
    function _bindHandlers() {
        ui.$body.on('click', ui.elAddToCompare, _onClickAddToCompare);
        ui.$body.on('click', ui.elCompareFilters, _onClickCompareFilters);
        ui.$body.on('click', ui.elCompareRemove, _onClickCompareRemove);
    }

    // update the amount of compared items
    function updateCompareTab() {
        var comparedGoodsStr = $.cookie(settings.cookie.goods),
            comparedGoodsArr = comparedGoodsStr ? comparedGoodsStr.split(',') : [],
            comparedCategoryId = $.cookie(settings.cookie.category),
            compareHref = 'compare.php' + (comparedGoodsArr.length ? '#' + encodeURIComponent(comparedCategoryId + '|' + comparedGoodsStr) : '');

        // updating sign
        ui.$compareTab.find('span').text(comparedGoodsArr.length || '');

        // update link (compare)
        ui.$compareTab.find('a').attr('href', compareHref);
    }

    // getting from response.data.goods
    function _getBaseProps(goods) {
        // config for basics
        var baseProps = [{
            key: 'brand',
            prop: 'Brand'
        }, {
            key: 'price',
            prop: 'Price'
        }, {
            key: 'rating',
            prop: 'Rating'
        }];

        var valuesWithIds, values, equal;

        // returning
        return _.map(baseProps, function(item) {

            // returning
            valuesWithIds = _.map(goods, function(good) {
                return {
                    goodId: good.good_id,
                    value: good[item.key]
                }
            });

            values = _.pluck(valuesWithIds, 'value');


            return {
                prop: item.prop,
                values: valuesWithIds,
                equal: equal
            }
        });
    }

    // getting additional info from response.data.props
    function _getAdditionalProps(props) {
        var valuesWithIds, values, equal;
        return _.chain(props)
            .groupBy('prop')
            .map(function(valuesArray, key) {


                valuesWithIds = _.map(valuesArray, function(item) {
                    return {
                        goodId: item.good_id,
                        value: item.value
                    }
                });

                values = _.pluck(valuesWithIds, 'value');

                equal = (values.length > 1) && (_.uniq(values).length === 1);

                return {
                    prop: key,
                    values: valuesWithIds,
                    equal: equal
                }
            })
            .value();
    }

    //rendering
    function _renderCompareTable(response) {
        var filters = [{
                value: 'all',
                title: 'All',
                checked: true
            },{
                value: 'equal',
                title: 'The same'
            },{
                value: 'not-equal',
                title: 'The different'
            }];

        var goods = response.data.goods;

        var allProps = _.union(
            _getBaseProps(goods),
            _getAdditionalProps(response.data.props)
        );

        // Rendering filters
        ui.$compareTable.find('thead tr').html(tpl.filters({
            buttons: filters
        }));

        // Rendering items in nav
        ui.$compareTable.find('thead tr').append(tpl.header({
            goods: goods
        }));

        // rendering values
        ui.$compareTable.find('tbody').append(tpl.props({
            goods: _.pluck(goods, 'good_id'),
            props: allProps
        }));
    }

    // error
    function _onAjaxError(response) {
        console.error('response', response);
       
    }

    // Initialixation of compare
    function _initComparePage() {
        var hashData = decodeURIComponent(location.hash).substr(1).split('|'),
            categoryId = hashData.length ? hashData[0] : 0,
            goods = hashData.length ? hashData[1] : [];

        if (!goods) {
            alert('No items were choosen for comparison');
            return false;
        }

        $.cookie(settings.cookie.goods, goods, {expires: 365, path: '/'});
        $.cookie(settings.cookie.category, categoryId, {expires: 365, path: '/'});

        // server getting
        $.ajax({
            url: 'scripts/compare.php',
            data: 'goods=' + encodeURIComponent(goods),
            type: 'GET',
            cache: false,
            dataType: 'json',
            error: _onAjaxError,
            success: function(response) {
                if (response.code === 'success') {
                    _renderCompareTable(response);
                } else {
                    _onAjaxError(response);
                }
            }
        });
    }

    // initialization
    function init() {
        _bindHandlers();
        if (ui.$body.attr('data-page') === 'compare') {
            _initComparePage();
        }
    }


    // outter export
    return {
        updateCompareTab: updateCompareTab,
        init: init
    }

})(jQuery);