<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Nofrills_Booklayout_LayoutdemoController extends Mage_Core_Controller_Front_Action
{
    protected function _initLayout() {
        $layout = Mage::getSingleton('core/layout');
        $layout->addOutputBlock('root');
        
        $additional_head = $layout->createBlock('nofrills_booklayout/template', 'additional_head')
                ->setTemplate('simple-page/head.phtml');
        
        $sidebar = $layout->createBlock('nofrills_booklayout/template', 'siedbar')
                ->setTemplate('simple-page/sidebar.phtml');
        
        $content = $layout->createBlock('core/text_list', 'content');
        
        $root = $layout->createBlock('nofrills_booklayout/template', 'root')
                ->setTemplate('simple-page/2col.phtml')
                ->insert($additional_head)
                ->insert($sidebar)
                ->insert($content);
        
        return $layout;
    }
    
    public function indexAction() {
        $layout = $this->_initLayout();
        $text = $layout->createBlock('core/text', 'words');
        $text->setText('It was the best of timer, it was the BLURST?! of times');
        
        $content = $layout->getBlock('content');
        $content->insert($text);
        $layout->setDirectOutput(true);
        $layout->getOutput();
        
        exit;
    }
}
