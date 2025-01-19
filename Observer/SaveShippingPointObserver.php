<?php

namespace Dragonfly\ShippingPoint\Observer;

use Dragonfly\ShippingPoint\Api\SettingsInterface;
use Dragonfly\ShippingPoint\Service\SetShippingPoint;
use Exception;
use Magento\Customer\Model\Session;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class SaveShippingPointObserver implements ObserverInterface
{
    /**
     * @var Session
     */
    protected Session $session;

    /**
     * @var SetShippingPoint
     */
    private SetShippingPoint $setShippingPointService;

    /**
     * @param Session $session
     * @param SetShippingPoint $setShippingPointService
     */
    public function __construct(
        Session          $session,
        SetShippingPoint $setShippingPointService
    )
    {
        $this->session = $session;
        $this->setShippingPointService = $setShippingPointService;
    }

    /**
     * Set checkout session flag if order has downloadable product(s)
     *
     * @param Observer $observer
     * @return $this
     * @throws Exception
     */
    public function execute(Observer $observer)
    {
        if (!$this->session->getShippingPoint()) {
            return $this;
        }

        $order = $observer->getEvent()->getOrder();
        $shippingMethod = $order->getShippingMethod();

        if (!isset(SettingsInterface::ENABLED_CARRIER_METHOD[$shippingMethod])) {
            $this->unsetSessionVar();
            return $this;
        }

        $orderId = intval($order->getId());
        $shippingPointCode = $this->session->getShippingPoint();
        $shippingService = $this->session->getShippingService();
        $shippingPointTitle = '';


        $this->setShippingPointService->execute($orderId, $shippingPointCode, $shippingService, $shippingPointTitle);

        $this->unsetSessionVar();
    }

    private function unsetSessionVar()
    {
        $this->session->unsShippingPoint();
        $this->session->unsShippingService();
        $this->session->unsShippingPointTitle();
    }
}
