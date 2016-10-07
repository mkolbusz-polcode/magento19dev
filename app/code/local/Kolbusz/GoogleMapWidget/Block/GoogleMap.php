<?php

/**
 * Google Map Block
 */
class Kolbusz_GoogleMapWidget_Block_GoogleMap extends Mage_Core_Block_Template implements Mage_Widget_Block_Interface
{
    public function getAddress(){
        if($this->getMode() == "store_address"){
            return Mage::getStoreConfig('general/store_information/address');
        }
        return $this->getCustomAddress();
    }
}
