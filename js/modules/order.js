'use strict';

// Cart 
var order = (function($) {

    var ui = {
        $orderForm: $('#order-form'),
        $messageCart: $('#order-message'),
        $orderBtn: $('#order-btn'),
        $alertValidation: $('#alert-validation'),
        $alertOrderDone: $('#alert-order-done'),
        $orderMessageTemplate: $('#order-message-template'),
        $fullSumma: $('#full-summa'),
        $delivery: {
            type: $('#delivery-type'),
            summa: $('#delivery-summa'),
            btn: $('.js-delivery-type'),
            alert: $('#alert-delivery')
        }
    };

    var freeDelivery = {
        enabled: false,
        summa: 10000
    };

    // Initialization of 
    function init() {
        _renderMessage();
        _checkCart();
        _initDelivery();
        _bindHandlers();
    }

    // amount + overall sum
    function _renderMessage() {
        var template = _.template(ui.$orderMessageTemplate.html()),
            data;
        cart.update();
        data = {
            count: cart.getCountAll(),
            summa: cart.getSumma()
        };
        ui.$messageCart.html(template(data));
    }

    // case: empty cart
    function _checkCart() {
        if (cart.getCountAll() === 0) {
            ui.$orderBtn.attr('disabled', 'disabled');
        }
    }

    // change way of delivering
    function _changeDelivery() {
        var $item = ui.$delivery.btn.filter(':checked'),
            deliveryType = $item.attr('data-type'),
            deliverySumma = freeDelivery.enabled ? 0 : +$item.attr('data-summa'),
            cartSumma = cart.getSumma(),
            fullSumma = deliverySumma + cartSumma,
            alert =
                freeDelivery.enabled
                    ? 'We give you a free pick-up!'
                    :
                        'Overall sum of delivery ' + deliverySumma + ' $. ' +
                        'Overall sum: ' +
                        cartSumma + ' + ' + deliverySumma + ' = ' + fullSumma + ' $';

        ui.$delivery.type.val(deliveryType);
        ui.$delivery.summa.val(deliverySumma);
        ui.$fullSumma.val(fullSumma);
        ui.$delivery.alert.html(alert);
    }

    // initializing the delivery
    function _initDelivery() {
        // free pick-up
        freeDelivery.enabled = (cart.getSumma() >= freeDelivery.summa);

        // event - change
        ui.$delivery.btn.on('change', _changeDelivery);

        _changeDelivery();
    }

    // events
    function _bindHandlers() {
        ui.$orderForm.on('click', '.js-close-alert', _closeAlert);
        ui.$orderForm.on('submit', _onSubmitForm);
    }

    // close alert-а
    function _closeAlert(e) {
        $(e.target).parent().addClass('hidden');
    }

    // validation
    function _validate() {
        var formData = ui.$orderForm.serializeArray(),
            name = _.find(formData, {name: 'name'}).value,
            email = _.find(formData, {name: 'email'}).value,
            isValid = (name !== '') && (email !== '');
        return isValid;
    }

    // prepare cart
    function _getCartData() {
        var cartData = cart.getData();
        _.each(cart.getData(), function(item) {
            item.name = encodeURIComponent(item.name);
        });
        return cartData;
    }

    // success
    function _orderSuccess(responce) {
        console.info('responce', responce);
        ui.$orderForm[0].reset();
        ui.$alertOrderDone.removeClass('hidden');
    }

    // error
    function _orderError(responce) {
        console.error('responce', responce);

    }

    // sending is over
    function _orderComplete() {
        ui.$orderBtn.removeAttr('disabled').text('Send the order');
    }

    // order making
    function _onSubmitForm(e) {
        var isValid,
            formData,
            cartData,
            orderData;
        e.preventDefault();
        ui.$alertValidation.addClass('hidden');
        isValid = _validate();
        if (!isValid) {
            ui.$alertValidation.removeClass('hidden');
            return false;
        }
        formData = ui.$orderForm.serialize();
        cartData = _getCartData();
        orderData = formData + '&cart=' + JSON.stringify(cartData);
        ui.$orderBtn.attr('disabled', 'disabled').text('Delivery is taking place...');
        $.ajax({
            url: 'scripts/order.php',
            data: orderData,
            type: 'POST',
            cache: false,
            dataType: 'json',
            error: _orderError,
            success: function(responce) {
                if (responce.code === 'success') {
                    _orderSuccess(responce);
                } else {
                    _orderError(responce);
                }
            },
            complete: _orderComplete
        });
    }



    // export outter
    return {
        init: init
    }

})(jQuery);