<?php

/**
 * @package Test_LoyaltyCardNumber
 * @author  Nguyet Nguyen <nguyetnt.it@gmail.com>
 */

namespace Test\LoyaltyCardNumber\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;

/**
 * Class SetLoyaltyCardNumberToOrder
 */
class SetLoyaltyCardNumberToOrder implements ObserverInterface
{
    /**
     * This is the method that fires when the event runs.
     *
     * @param Observer $observer
     * @return $this
     */
    public function execute(Observer $observer)
    {
        $quote = $observer->getEvent()->getQuote();
        $order = $observer->getEvent()->getOrder();
        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/test.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $logger->info("bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb");
        $logger->info($quote->getLoyaltyCardNumber());
        if ($quote->getLoyaltyCardNumber()){
            $order->setLoyaltyCardNumber($quote->getLoyaltyCardNumber());
        }

        return $this;
    }
}