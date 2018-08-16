<?php
/**
 * @package Test_LoyaltyCardNumber
 * @author  Nguyet Nguyen <nguyetnt.it@gmail.com>
 */

namespace Test\LoyaltyCardNumber\Block\Adminhtml\Sales\Order\View;

/**
 * Class LoyaltyCardNumber
 */
class LoyaltyCardNumber extends \Magento\Sales\Block\Adminhtml\Order\AbstractOrder
{
    /**
     * @return string
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getValue()
    {
        if ($this->getOrder()->getLoyaltyCardNumber()) {

            return $this->getOrder()->getLoyaltyCardNumber();
        }

        return '';
    }
}
