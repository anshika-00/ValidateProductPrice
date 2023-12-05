<?php

namespace Anshika\ValidateProductPrice\Observer;

use Magento\Customer\Model\Session;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Exception\LocalizedException;

class ValidateProductPrice implements ObserverInterface
{
    protected $session;

    public function __construct(Session $session)
    {
        $this->session = $session;
    }
    public function execute(Observer $observer)
    {
        $product = $observer->getEvent()->getProduct();
        $price = $product->getFinalPrice();
        $customer = $this->session->getCustomer()->getEntityId();

        if ($price > 100 && $customer == NULL) {
            throw new LocalizedException(__('You need to log-in for adding any product worth 100 or more.'));
        }
    }
}


