/**
 * @package Test_LoyaltyCardNumber
 * @author  Nguyet Nguyen <nguyetnt.it@gmail.com>
 */
define([
    'jquery',
    'underscore',
    'mage/utils/wrapper'
], function ($, _, wrapper) {
    'use strict';

    return function (selectPaymentMethodAction) {

        /** Override place-order-mixin for set-payment-information action as they differs only by method signature */
        return wrapper.wrap(selectPaymentMethodAction, function (originalAction, paymentMethod) {
            if ($("#loyalty-card-number-" + paymentMethod.method)) {
                var cardNumber = $("#loyalty-card-number-" + paymentMethod.method).val();
                if (cardNumber) {
                    if ((paymentMethod['additional_data'] === undefined) || (paymentMethod['additional_data'] === null)) {
                        paymentMethod['additional_data'] = {'loyalty_card_number': cardNumber};
                    } else {
                        paymentMethod['additional_data']['loyalty_card_number'] = cardNumber;
                    }
                }
            }
            console.log(paymentMethod);
            return originalAction(paymentMethod);
        });
    };
});
