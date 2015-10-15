<?php

class Liquid_Shipping_Helper_Data extends
    Mage_Core_Helper_Abstract
{
    const XML_EXPRESS_START_DATE = 'carriers/liquid_shipping/discount_start_date';
    const XML_EXPRESS_END_DATE = 'carriers/liquid_shipping/discount_end_date';
    const XML_EXPRESS_DISCOUNT_PRICE = 'carriers/liquid_shipping/discount_price';

    public function getExpressStartDate()
    {
        return Mage::getStoreConfig(self::XML_EXPRESS_START_DATE);
    }

    public function getExpressEndDate()
    {
        return Mage::getStoreConfig(self::XML_EXPRESS_END_DATE);
    }

    public function getExpressDiscountPrice()
    {
        return Mage::getStoreConfig(self::XML_EXPRESS_DISCOUNT_PRICE);
    }

}