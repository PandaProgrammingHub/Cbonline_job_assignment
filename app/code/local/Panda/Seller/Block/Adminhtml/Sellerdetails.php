<?php
class Panda_Seller_Block_Adminhtml_Sellerdetails extends Mage_Adminhtml_Block_Widget_Grid_Container{
    public function __construct() {
        $this->_controller = 'adminhtml_sellerdetails';
        $this->_blockGroup = 'seller';
        $this->_headerText = Mage::helper('seller')->__('Manage Seller');
        parent::__construct();
        $this->_removeButton('add');

    }
}

