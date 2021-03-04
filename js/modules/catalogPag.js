'use strict';

// Module with pag
var catalogPag = (function($) {

    var ui = {
        $categoryBtn: $('.js-category'),
        $themeBtn: $('.js-theme'),
        $limit: $('#pages-limit'),
        $pag: $('#pagination'),
        $goods: $('#goods'),
        $goodsInfo: $('#goods-info')
    };
    var goodsTemplate = {
        big: _.template($('#goods-template-big').html()),
        compact: _.template($('#goods-template-compact').html()),
        list: _.template($('#goods-template-list').html())
    },
        pagTemplate = _.template($('#pagination-template').html());


    // Initialization of module
    function init() {
        _setTheme();
        _getData({
            resetPage: true
        });
        _bindHandlers();
    }

    // Set the theme
    function _setTheme() {
        var theme = localStorage.getItem('theme') || 'compact';
        $('.js-theme[data-theme="' + theme + '"]').addClass('active');
    }

    // Link the events
    function _bindHandlers() {
        ui.$categoryBtn.on('click', _changeCategory);
        ui.$themeBtn.on('click', _changeTheme);
        ui.$limit.on('change', _changeLimit);
        ui.$pag.on('click', 'a', _changePage);
    }

    // Changing the category
    function _changeCategory(e) {
        var $category = $(e.target);
        ui.$categoryBtn.removeClass('active');
        $category.addClass('active');

        _getData({
            resetPage: true
        });
    }

    // Changing the theme
    function _changeTheme(e) {
        var $theme = $(e.target).closest('button'),
            theme = $theme.attr('data-theme');
        ui.$themeBtn.removeClass('active');
        $theme.addClass('active');

        _getData({
            resetPage: false
        });

        localStorage.setItem('theme', theme);
    }

    // Changing limit
    function _changeLimit() {
        _getData({
            resetPage: true
        });
    }

    // Change the page
    function _changePage(e) {
        e.preventDefault();
        e.stopPropagation();

        var $page = $(e.target).closest('li');
        ui.$pag.find('li').removeClass('active');
        $page.addClass('active');

        _getData();
    }

    // opt-settings 
    function _getOptions(resetPage) {
        var categoryId = +$('.js-category.active').attr('data-category'),
            page = !resetPage ? +ui.$pag.find('li.active').attr('data-page') : 1,
            limit = +ui.$limit.val();

        return {
            category: categoryId,
            page: page,
            limit: limit
        }
    }

    // Getting data
    function _getData(options) {
        var resetPage = options && options.resetPage,
            options = _getOptions(resetPage);
        $.ajax({
            url: 'scripts/catalog_pag.php',
            data: options,
            type: 'GET',
            cache: false,
            dataType: 'json',
            success: function(response) {
                if (response.code === 'success') {
                    _renderCatalog(response.data.goods);
                    _renderPagination({
                        page: options.page,
                        limit: options.limit,
                        countAll: response.data.countAll,
                        countItems: response.data.goods.length
                    });
                } else {
                    console.error('Error occurs');
                }
            }
        });
    }

    // Rendering the catalogue
    function _renderCatalog(goods) {
        var theme = $('.js-theme.active').attr('data-theme');
        ui.$goods.html(goodsTemplate[theme]({goods: goods}));
    }

    // Render with oag
    function _renderPagination(options) {
        var countAll = options.countAll,
            countItems = options.countItems,
            page = options.page,
            limit = options.limit,
            countPages = Math.ceil(countAll / limit),
            start = (page - 1) * limit + 1,
            end = start + countItems - 1;

        // Info about shown items
        var goodsInfoMsg = start + ' - ' + end + ' from ' + countAll;
        ui.$goodsInfo.text(goodsInfoMsg);

        // Rendering with pag
        ui.$pag.html(pagTemplate({
            page: page,
            countPages: countPages
        }));
    }

    // Outter export
    return {
        init: init
    }
    
})(jQuery);