/**
 * @package Test_LoyaltyCardNumber
 * @author  Nguyet Nguyen <nguyetnt.it@gmail.com>
 */
define(
    [
        'jquery',
        'mage/validation'
    ],
    function ($) {
        'use strict';
        return {
            /**
             * Validate loyalty card number field, it is required and code format
             *
             * @returns {boolean}
             */
            validate: function() {
                var form = '.payment-method._active form.form-loyalty-card-number';
                $(form).validation();
                var inputTest = $('.payment-method._active .loyalty-card-number')[0];
                var validateCardNumber = Boolean($(inputTest).valid());

                return validateCardNumber;
            }
        }
    }
);