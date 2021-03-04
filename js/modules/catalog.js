'use strict';

// Module of catalogue
var catalog = (function($) {

    // Initialization of module
    function init() {
        _render();
    }

    // Rendering of the catalogue
    function _render() {
        var template = _.template($('#catalog-template').html()),
            $goods = $('#goods');

        /* $.getJSON('data/test.json', function(data) {
            $goods.html(template({goods: data})); */

            $.getJSON('scripts/gallery-fetch-data.php', function(data) {
                $goods.html(template({goods: data}));
        });
    }


    // Outter export
    return {
        init: init
    }
    
})(jQuery);