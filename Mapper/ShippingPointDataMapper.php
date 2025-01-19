<?php

namespace Dragonfly\ShippingPoint\Mapper;

use Dragonfly\ShippingPoint\Api\Data\ShippingPointInterface;
use Dragonfly\ShippingPoint\Api\Data\ShippingPointInterfaceFactory;
use Dragonfly\ShippingPoint\Model\ShippingPointModel;
use Magento\Framework\DataObject;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Converts a collection of ShippingPoint entities to an array of data transfer objects.
 */
class ShippingPointDataMapper
{
    /**
     * @var ShippingPointInterfaceFactory
     */
    private ShippingPointInterfaceFactory $entityDtoFactory;

    /**
     * @param ShippingPointInterfaceFactory $entityDtoFactory
     */
    public function __construct(
        ShippingPointInterfaceFactory $entityDtoFactory
    )
    {
        $this->entityDtoFactory = $entityDtoFactory;
    }

    /**
     * Map magento models to DTO array.
     *
     * @param AbstractCollection $collection
     *
     * @return array|ShippingPointInterface[]
     */
    public function map(AbstractCollection $collection): array
    {
        $results = [];
        /** @var ShippingPointModel $item */
        foreach ($collection->getItems() as $item) {
            /** @var ShippingPointInterface|DataObject $entityDto */
            $entityDto = $this->entityDtoFactory->create();
            $entityDto->addData($item->getData());

            $results[] = $entityDto;
        }

        return $results;
    }
}
