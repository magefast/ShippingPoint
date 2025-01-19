<?php

namespace Dragonfly\ShippingPoint\Model\ResourceModel;

use Dragonfly\ShippingPoint\Api\Data\ShippingPointInterface;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class ShippingPointResource extends AbstractDb
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'shipping_point_resource_model';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('shipping_point', ShippingPointInterface::SHIPPING_POINT_ID);
        $this->_useIsObjectNew = true;
    }
}
