/**
 * @package Test_LoyaltyCardNumber
 * @author  Nguyet Nguyen <nguyetnt.it@gmail.com>
 */

define([
    'jquery',
    'ko',
    'uiComponent',
    'mage/validation'
], function ($, ko, Component) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'Test_LoyaltyCardNumber/payment/loyalty-card-number'
        },
        getCode: function(context) {
            var paymentMethodName = '',
                paymentMethodRenderer = context.$parents[0];

            // corresponding payment method fetched from parent context
            if (paymentMethodRenderer) {
                // item looks like this: {title: "Check / Money order", method: "checkmo"}
                paymentMethodName = paymentMethodRenderer.item ?
                    paymentMethodRenderer.item.method : '';
            }

            return paymentMethodName;
        }
    });
});
