<?php

namespace Dragonfly\ShippingPoint\Model\ResourceModel\ShippingPointModel;

use Dragonfly\ShippingPoint\Model\ResourceModel\ShippingPointResource;
use Dragonfly\ShippingPoint\Model\ShippingPointModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class ShippingPointCollection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'shipping_point_collection';

    /**
     * Initialize collection model.
     */
    protected function _construct()
    {
        $this->_init(ShippingPointModel::class, ShippingPointResource::class);
    }
}
