<?php

namespace Dragonfly\ShippingPoint\Model;

use Dragonfly\ShippingPoint\Model\ResourceModel\ShippingPointResource;
use Magento\Framework\Model\AbstractModel;

class ShippingPointModel extends AbstractModel
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'shipping_point_model';

    /**
     * Initialize magento model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ShippingPointResource::class);
    }
}
