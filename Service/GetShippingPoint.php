<?php

namespace Dragonfly\ShippingPoint\Service;

use Dragonfly\ShippingPoint\Api\Data\ShippingPointInterface;
use Dragonfly\ShippingPoint\Model\ResourceModel\ShippingPointResource;
use Dragonfly\ShippingPoint\Model\ShippingPointModel;
use Dragonfly\ShippingPoint\Model\ShippingPointModelFactory;
use Exception;

class GetShippingPoint
{
    /**
     * @var ShippingPointModelFactory
     */
    private ShippingPointModelFactory $modelFactory;

    /**
     * @var ShippingPointResource
     */
    private ShippingPointResource $resource;

    /**
     * @param ShippingPointModelFactory $modelFactory
     * @param ShippingPointResource $resource
     */
    public function __construct(
        ShippingPointModelFactory $modelFactory,
        ShippingPointResource     $resource
    )
    {
        $this->modelFactory = $modelFactory;
        $this->resource = $resource;
    }

    /**
     * @throws Exception
     */
    public function execute(int $orderId): ?ShippingPointModel
    {
        $model = $this->modelFactory->create();
        $this->resource->load($model, $orderId, ShippingPointInterface::ORDER_ID);

        if (!$model->getData(ShippingPointInterface::SHIPPING_POINT_ID)) {
            return null;
        }

        return $model;
    }

}
