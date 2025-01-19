<?php

namespace Dragonfly\ShippingPoint\Service;

use Dragonfly\ShippingPoint\Api\Data\ShippingPointInterface;
use Dragonfly\ShippingPoint\Command\ShippingPoint\SaveCommand;
use Exception;

class SetShippingPoint
{
    /**
     * @var SaveCommand
     */
    private SaveCommand $saveCommand;

    /**
     * @var ShippingPointInterface
     */
    private ShippingPointInterface $shippingPoint;

    /**
     * @param SaveCommand $saveCommand
     * @param ShippingPointInterface $shippingPoint
     */
    public function __construct(
        SaveCommand            $saveCommand,
        ShippingPointInterface $shippingPoint
    )
    {
        $this->saveCommand = $saveCommand;
        $this->shippingPoint = $shippingPoint;
    }

    /**
     * @throws Exception
     */
    public function execute(int $orderId, string $shippingPointCode, string $shippingService, string $shippingPointTitle): void
    {
        try {
            $this->shippingPoint->setOrderId($orderId);
            $this->shippingPoint->setShippingPointCode($shippingPointCode);
            $this->shippingPoint->setShippingService($shippingService);
            $this->shippingPoint->setShippingPointTitle($shippingPointTitle);

            $this->saveCommand->execute($this->shippingPoint);
        } catch (Exception $e) {
            // @todo
//            var_dump($e->getMessage());
        }

    }
}
