<?php

namespace Dragonfly\ShippingPoint\Api\Data;

interface ShippingPointInterface
{
    /**
     * String constants for property names
     */
    public const SHIPPING_POINT_ID = "shipping_point_id";
    public const ORDER_ID = "order_id";
    public const SHIPPING_POINT_CODE = "shipping_point_code";
    public const SHIPPING_SERVICE = "shipping_service";
    public const SHIPPING_POINT_TITLE = "shipping_point_title";

    /**
     * Getter for ShippingPointId.
     *
     * @return int|null
     */
    public function getShippingPointId(): ?int;

    /**
     * Setter for ShippingPointId.
     *
     * @param int|null $shippingPointId
     *
     * @return void
     */
    public function setShippingPointId(?int $shippingPointId): void;

    /**
     * Getter for Id.
     *
     * @return int|null
     */
    public function getId(): ?int;

    /**
     * Setter for Id.
     *
     * @param int|null $id
     *
     * @return void
     */
    public function setId(?int $id): void;

    /**
     * Getter for OrderId.
     *
     * @return int|null
     */
    public function getOrderId(): ?int;

    /**
     * Setter for OrderId.
     *
     * @param int|null $orderId
     *
     * @return void
     */
    public function setOrderId(?int $orderId): void;

    /**
     * Getter for ShippingPointCode.
     *
     * @return string|null
     */
    public function getShippingPointCode(): ?string;

    /**
     * Setter for ShippingPointCode.
     *
     * @param string|null $shippingPointCode
     *
     * @return void
     */
    public function setShippingPointCode(?string $shippingPointCode): void;

    /**
     * Getter for ShippingService.
     *
     * @return string|null
     */
    public function getShippingService(): ?string;

    /**
     * Setter for ShippingService.
     *
     * @param string $shippingService
     *
     * @return void
     */
    public function setShippingService(string $shippingService): void;

    /**
     * Getter for ShippingPointTitle.
     *
     * @return string|null
     */
    public function getShippingPointTitle(): ?string;

    /**
     * Setter for ShippingPointTitle.
     *
     * @param string|null $shippingPointTitle
     *
     * @return void
     */
    public function setShippingPointTitle(?string $shippingPointTitle): void;
}
