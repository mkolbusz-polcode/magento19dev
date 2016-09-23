<?php

class Nofrills_Booklayout_Block_Template extends Mage_Core_Block_Template
{
    public function fetchView($fileName) {
        $this->setScriptPath(Mage::getModuleDir('', 'Nofrills_Booklayout') . DS . 'design');
        parent::fetchView($fileName);
    }
}

