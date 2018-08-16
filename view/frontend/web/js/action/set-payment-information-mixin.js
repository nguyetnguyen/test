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

    return function (setPaymentInformationAction) {

        return wrapper.wrap(setPaymentInformationAction, function (originalAction, messageContainer, paymentData) {
            console.log( $("#loyalty-card-number-" + paymentData['method']).val());
            var cardNumber = $("#loyalty-card-number-" + paymentData['method']).val();
            _.extend(paymentData['additional_data'], {'cardNumber': cardNumber});
            console.log(paymentData);
            return originalAction(paymentData);
        });
    };
});
