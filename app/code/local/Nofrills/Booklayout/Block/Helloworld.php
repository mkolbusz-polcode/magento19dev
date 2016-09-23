<?php

class Nofrills_Booklayout_Block_Helloworld extends Mage_Core_Block_Template
{
    public function _construct() {
        $this->setTemplate('nofrills_booklayout/helloworld.phtml');
        return parent::_construct();
    }
    
    protected function _beforeToHtml() {
        $block1 = new Mage_Core_Block_Text();
        $block1->setText('Original Text');
        $this->setChild('the_first', $block1);
        
        $block2 = new Mage_Core_Block_Text();
        $block2->setText('The second sentence.');
        $this->setChild('the_second', $block2);
    }
    
    public function fetchTitle() {
        return 'Hello World from block';
    }
}