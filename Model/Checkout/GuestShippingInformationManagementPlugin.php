<?php

declare(strict_types=1);

namespace Dragonfly\ShippingPoint\Model\Checkout;

use Dragonfly\ShippingPoint\Api\SettingsInterface;
use Magento\Checkout\Api\Data\ShippingInformationInterface;
use Magento\Customer\Model\Session;
use Magento\Checkout\Model\ShippingInformationManagement;

class GuestShippingInformationManagementPlugin
{
    /**
     * @var Session
     */
    private Session $session;

    /**
     * Initialize dependencies
     *
     * @param Session $session
     */
    public function __construct(
        Session $session

    )
    {
        $this->session = $session;
    }

    /**
     * @param ShippingInformationManagement $subject
     * @param $cartId
     * @param ShippingInformationInterface $addressInformation
     * @return void
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function beforeSaveAddressInformation(
        ShippingInformationManagement $subject,
                                      $cartId,
        ShippingInformationInterface  $addressInformation
    ): void
    {
        $carrierCode = $addressInformation->getShippingCarrierCode();
        $methodCode = $addressInformation->getShippingMethodCode();

        if (!isset(SettingsInterface::ENABLED_CARRIER_METHOD[$carrierCode . '_' . $methodCode])) {
            $this->session->unsShippingPoint();
            $this->session->unsShippingService();
            $this->session->unsShippingPointTitle();
            return;
        }

        $shippingPoint = $addressInformation->getExtensionAttributes()->getShippingPoint();
        $shippingService = SettingsInterface::ENABLED_CARRIER_METHOD[$carrierCode . '_' . $methodCode];


        $this->session->setShippingPoint($shippingPoint);
        $this->session->setShippingService($shippingService);
        $this->session->setShippingPointTitle('');
    }
}
