<?php

class Liquid_Shipping_Model_Carrier
    extends Mage_Shipping_Model_Carrier_Abstract
    implements Mage_Shipping_Model_Carrier_Interface
{
    protected $_code = 'liquid_shipping';


    public function collectRates(Mage_Shipping_Model_Rate_Request $request)
    {

        if (!$this->getConfigFlag('active')) {
            return false;
        }

        $result = Mage::getModel('shipping/rate_result');
        $rate = Mage::getModel('shipping/rate_result_method');
        $startDate = new DateTime($this->getConfigData('discount_start_date'));
        $endDate = new DateTime($this->getConfigData('discount_end_date'));
        $currentDate = new DateTime("now");
        $shipPrice = $this->getConfigData('price');

        if (($startDate < $currentDate) && ($currentDate < $endDate)) {
            $discountMsg = $this->getConfigData('name') . $this->getConfigData('discount_message');
            $rate->setMethodTitle($discountMsg);
            $shipPrice = $this->getConfigData('discount_price');
        } else {
            $rate->setMethodTitle($this->getConfigData('name'));
        }
        $rate->setCarrier('liquid_shipping');
        $rate->setCarrierTitle($this->getConfigData('name'));
        $rate->setMethod('liquid_shipping');
        $rate->setPrice($shipPrice);
        $rate->setCost(0);
        $result->append($rate);
        return $result;
    }


    public function getAllowedMethods()
    {
        return array('liquid_shipping' => $this->getConfigData('name'));
    }

}
	