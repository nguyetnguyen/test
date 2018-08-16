/**
 * @package Test_LoyaltyCardNumber
 * @author  Nguyet Nguyen <nguyetnt.it@gmail.com>
 */
define(
    [
        'uiComponent',
        'Magento_Checkout/js/model/payment/additional-validators',
        'Test_LoyaltyCardNumber/js/model/loyalty-card-number-validator'
    ],
    function (Component, additionalValidators, cardNumberValidator) {
        'use strict';
        additionalValidators.registerValidator(cardNumberValidator);
        return Component.extend({});
    }
);