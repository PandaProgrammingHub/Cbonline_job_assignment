<?php

class Panda_Seller_Block_Adminhtml_Sellerdetails_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs{
    public function __construct() {
        parent::__construct();
        $this->setId('seller_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('seller')->__('Seller Details'));
        
    }
    protected function _beforeToHtml() {
		$this->addTab('form_section', array(
			'label' => Mage::helper('seller')->__('Seller Detail'),
			'title' => Mage::helper('seller')->__('Seller Detail'),
			'content' => $this->getLayout()->createBlock('seller/adminhtml_sellerdetails_edit_tabs_form')->toHtml(),
                    ));
		return parent::_beforeToHtml();
	} 
}
