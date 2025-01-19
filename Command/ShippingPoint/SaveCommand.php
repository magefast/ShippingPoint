<?php

namespace Dragonfly\ShippingPoint\Command\ShippingPoint;

use Dragonfly\ShippingPoint\Api\Data\ShippingPointInterface;
use Dragonfly\ShippingPoint\Model\ResourceModel\ShippingPointResource;
use Dragonfly\ShippingPoint\Model\ShippingPointModel;
use Dragonfly\ShippingPoint\Model\ShippingPointModelFactory;
use Exception;
use Magento\Framework\Exception\CouldNotSaveException;
use Psr\Log\LoggerInterface;

/**
 * Save ShippingPoint Command.
 */
class SaveCommand
{
    /**
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * @var ShippingPointModelFactory
     */
    private ShippingPointModelFactory $modelFactory;

    /**
     * @var ShippingPointResource
     */
    private ShippingPointResource $resource;

    /**
     * @param LoggerInterface $logger
     * @param ShippingPointModelFactory $modelFactory
     * @param ShippingPointResource $resource
     */
    public function __construct(
        LoggerInterface           $logger,
        ShippingPointModelFactory $modelFactory,
        ShippingPointResource     $resource
    )
    {
        $this->logger = $logger;
        $this->modelFactory = $modelFactory;
        $this->resource = $resource;
    }

    /**
     * Save ShippingPoint.
     *
     * @param ShippingPointInterface $shippingPoint
     *
     * @return int
     * @throws CouldNotSaveException
     */
    public function execute(ShippingPointInterface $shippingPoint): int
    {
        try {
            /** @var ShippingPointModel $model */
            $model = $this->modelFactory->create();
            $model->addData($shippingPoint->getData());
            $model->setHasDataChanges(true);

            if (!$model->getData(ShippingPointInterface::SHIPPING_POINT_ID)) {
                $model->isObjectNew(true);
            }
            $this->resource->save($model);
        } catch (Exception $exception) {
            $this->logger->error(
                __('Could not save ShippingPoint. Original message: {message}'),
                [
                    'message' => $exception->getMessage(),
                    'exception' => $exception
                ]
            );
            throw new CouldNotSaveException(__('Could not save ShippingPoint.'));
        }

        return (int)$model->getData(ShippingPointInterface::SHIPPING_POINT_ID);
    }
}
