<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Nofrills_Booklayout_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction() {    
        $mainBlock = new Mage_Core_Block_Template();     
        echo $mainBlock->toHtml();
    }
    
    public function helloblockAction() {
        $mainBlock = new Nofrills_Booklayout_Block_Helloworld();
        echo $mainBlock->toHtml();
    }
    
    public function layoutAction() {
        $layout = Mage::getSingleton('core/layout');
        $block = $layout->createBlock('nofrills_booklayout/helloworld', 'root');
        
        $layout->addOutputBlock('root');
        $layout->setDirectOutput(true);
        $layout->getOutput();
        
    }
}
