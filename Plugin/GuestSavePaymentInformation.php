<?php
/**
 * @package Test_LoyaltyCardNumber
 * @author  Nguyet Nguyen <nguyetnt.it@gmail.com>
 */
namespace Test\LoyaltyCardNumber\Plugin;

use \Magento\Checkout\Model\Session;

/**
 * Class GuestSavePaymentInformation
 */
class GuestSavePaymentInformation
{
    /**
     * @var \Magento\Checkout\Model\Session
     */
    protected $checkoutSession;

    /**
     * @param Session $checkoutSession
     */
    public function __construct(
        \Magento\Checkout\Model\Session $checkoutSession
    ) {
        $this->checkoutSession = $checkoutSession;
    }

    /**
     * @param \Magento\Checkout\Api\GuestPaymentInformationManagementInterface $subject
     * @param string $cartId
     * @param string $email
     * @param \Magento\Quote\Api\Data\PaymentInterface $paymentMethod
     * @param \Magento\Quote\Api\Data\AddressInterface|null $billingAddress
     * @return void
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function beforeSavePaymentInformationAndPlaceOrder(
        \Magento\Checkout\Api\GuestPaymentInformationManagementInterface $subject,
        $cartId,
        $email,
        \Magento\Quote\Api\Data\PaymentInterface $paymentMethod,
        \Magento\Quote\Api\Data\AddressInterface $billingAddress = null
    ) {
        $this->saveLoyaltyCardNumber($paymentMethod);
    }

    /**
     * @param \Magento\Checkout\Api\GuestPaymentInformationManagementInterface $subject
     * @param string $cartId
     * @param string $email
     * @param \Magento\Quote\Api\Data\PaymentInterface $paymentMethod
     * @param \Magento\Quote\Api\Data\AddressInterface|null $billingAddress
     * @return void
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function beforeSavePaymentInformation(
        \Magento\Checkout\Api\GuestPaymentInformationManagementInterface $subject,
        $cartId,
        $email,
        \Magento\Quote\Api\Data\PaymentInterface $paymentMethod,
        \Magento\Quote\Api\Data\AddressInterface $billingAddress = null
    ) {
        $this->saveLoyaltyCardNumber($paymentMethod);
    }

    private function saveLoyaltyCardNumber($paymentMethod)
    {
        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/test.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $logger->info("ooooooooooooooooooooooooooooooooooooooooooooooooooo");
        $logger->info($paymentMethod->getAdditionalData());

        if ($paymentMethod->getAdditionalData()) {
            $additionalData = $paymentMethod->getAdditionalData();
            if (isset($additionalData['loyalty_card_number'])) {
                $quote = $this->checkoutSession->getQuote();
                $quote->setLoyaltyCardNumber($additionalData['loyalty_card_number']);
            }
        }
    }
}
