<?php

namespace Dragonfly\ShippingPoint\Command\ShippingPoint;

use Dragonfly\ShippingPoint\Api\Data\ShippingPointInterface;
use Dragonfly\ShippingPoint\Model\ResourceModel\ShippingPointResource;
use Dragonfly\ShippingPoint\Model\ShippingPointModel;
use Dragonfly\ShippingPoint\Model\ShippingPointModelFactory;
use Exception;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use Psr\Log\LoggerInterface;

/**
 * Delete ShippingPoint by id Command.
 */
class DeleteByIdCommand
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
     * Delete ShippingPoint.
     *
     * @param int $entityId
     *
     * @return void
     * @throws CouldNotDeleteException
     */
    public function execute(int $entityId): void
    {
        try {
            /** @var ShippingPointModel $model */
            $model = $this->modelFactory->create();
            $this->resource->load($model, $entityId, ShippingPointInterface::SHIPPING_POINT_ID);

            if (!$model->getData(ShippingPointInterface::SHIPPING_POINT_ID)) {
                throw new NoSuchEntityException(
                    __('Could not find ShippingPoint with id: `%id`',
                        [
                            'id' => $entityId
                        ]
                    )
                );
            }

            $this->resource->delete($model);
        } catch (Exception $exception) {
            $this->logger->error(
                __('Could not delete ShippingPoint. Original message: {message}'),
                [
                    'message' => $exception->getMessage(),
                    'exception' => $exception
                ]
            );
            throw new CouldNotDeleteException(__('Could not delete ShippingPoint.'));
        }
    }
}
