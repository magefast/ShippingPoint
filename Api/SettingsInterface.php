<?php

namespace Dragonfly\ShippingPoint\Api;

interface SettingsInterface
{
    public const ENABLED_CARRIER_METHOD = [
        'novaposhtabranch_novaposhtabranch' => 'novaposhtabranch_novaposhtabranch',
        'novaposhtabranch_novaposhtaposhtomat' => 'novaposhtabranch_novaposhtaposhtomat',
    ];
}
