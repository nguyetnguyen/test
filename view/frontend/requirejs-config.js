/**
 * @package Test_LoyaltyCardNumber
 * @author  Nguyet Nguyen <nguyetnt.it@gmail.com>
 */

var config = {
    config: {
        mixins: {
            'Magento_Checkout/js/action/set-payment-information': {
                'Test_LoyaltyCardNumber/js/action/set-payment-information-mixin': true
            },
            'Magento_Checkout/js/action/place-order': {
                'Test_LoyaltyCardNumber/js/action/place-order-mixin': true
            },
            'Magento_Checkout/js/action/select-payment-method': {
                'Test_LoyaltyCardNumber/js/action/select-payment-method-mixin':true
            }
        }
    },
    shim: {
        'Test_LoyaltyCardNumber/js/action/set-payment-information-mixin': {
            deps: [
                'Magento_Checkout/js/action/set-payment-information'
            ]
        },
        'Test_LoyaltyCardNumber/js/action/place-order-mixin': {
            deps: [
                'Magento_CheckoutAgreements/js/model/place-order-mixin',
                'Magento_Checkout/js/action/place-order'
            ]
        },
        'Test_LoyaltyCardNumber/js/action/select-payment-method-mixin': {
            deps: [
                'Magento_Checkout/js/action/select-payment-method'
            ]
        }
    }
};