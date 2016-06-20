<?php

/**
 * Show only free shipping on checkout when free shipping is available
 */
class MichaelThessel_FreeShippingOnly_Block_Onepage_Shipping_Method_Available extends Mage_Checkout_Block_Onepage_Shipping_Method_Available
{
    public function getShippingRates()
    {
        $groups = parent::getShippingRates();

        $freeGroups = array();
        foreach ($groups as $index => $rates) {
            foreach ($rates as $rate) {
                if (!((float) $rate->getPrice()) > 0) {
                    $freeGroups[$index][] = $rate;
                }
            }
        }

        if (!empty($freeGroups)) {
            $this->_rates = $freeGroups;
            return $this->_rates;
        }

        return $groups;
    }
}
