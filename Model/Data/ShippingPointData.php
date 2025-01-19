<?php

namespace Dragonfly\ShippingPoint\Model\Data;

use Dragonfly\ShippingPoint\Api\Data\ShippingPointInterface;
use Magento\Framework\DataObject;

class ShippingPointData extends DataObject implements ShippingPointInterface
{
    /**
     * Getter for ShippingPointId.
     *
     * @return int|null
     */
    public function getShippingPointId(): ?int
    {
        return $this->getData(self::SHIPPING_POINT_ID) === null ? null
            : (int)$this->getData(self::SHIPPING_POINT_ID);
    }

    /**
     * Setter for ShippingPointId.
     *
     * @param int|null $shippingPointId
     *
     * @return void
     */
    public function setShippingPointId(?int $shippingPointId): void
    {
        $this->setData(self::SHIPPING_POINT_ID, $shippingPointId);
    }

    /**
     * Getter for Id.
     *
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->getData(self::SHIPPING_POINT_ID) === null ? null
            : (int)$this->getData(self::SHIPPING_POINT_ID);
    }

    /**
     * Setter for Id.
     *
     * @param int|null $id
     *
     * @return void
     */
    public function setId(?int $id): void
    {
        $this->setData(self::SHIPPING_POINT_ID, $id);
    }

    /**
     * Getter for OrderId.
     *
     * @return int|null
     */
    public function getOrderId(): ?int
    {
        return $this->getData(self::ORDER_ID) === null ? null
            : (int)$this->getData(self::ORDER_ID);
    }

    /**
     * Setter for OrderId.
     *
     * @param int|null $orderId
     *
     * @return void
     */
    public function setOrderId(?int $orderId): void
    {
        $this->setData(self::ORDER_ID, $orderId);
    }

    /**
     * Getter for ShippingPointCode.
     *
     * @return string|null
     */
    public function getShippingPointCode(): ?string
    {
        return $this->getData(self::SHIPPING_POINT_CODE);
    }

    /**
     * Setter for ShippingPointCode.
     *
     * @param string|null $shippingPointCode
     *
     * @return void
     */
    public function setShippingPointCode(?string $shippingPointCode): void
    {
        $this->setData(self::SHIPPING_POINT_CODE, $shippingPointCode);
    }

    /**
     * Getter for ShippingService.
     *
     * @return string|null
     */
    public function getShippingService(): ?string
    {
        return $this->getData(self::SHIPPING_SERVICE) === null ? null
            : (string)$this->getData(self::SHIPPING_SERVICE);
    }

    /**
     * Setter for ShippingService.
     *
     * @param string $shippingService
     *
     * @return void
     */
    public function setShippingService(string $shippingService): void
    {
        $this->setData(self::SHIPPING_SERVICE, $shippingService);
    }

    /**
     * Getter for ShippingPointTitle.
     *
     * @return string|null
     */
    public function getShippingPointTitle(): ?string
    {
        return $this->getData(self::SHIPPING_POINT_TITLE);
    }

    /**
     * Setter for ShippingPointTitle.
     *
     * @param string|null $shippingPointTitle
     *
     * @return void
     */
    public function setShippingPointTitle(?string $shippingPointTitle): void
    {
        $this->setData(self::SHIPPING_POINT_TITLE, $shippingPointTitle);
    }
}
