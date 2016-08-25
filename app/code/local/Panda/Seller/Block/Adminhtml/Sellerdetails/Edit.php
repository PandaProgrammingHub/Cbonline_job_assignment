<?php
class Panda_Seller_Block_Adminhtml_Sellerdetails_Edit extends Mage_Adminhtml_Block_Widget_Form_Container{
    public function __construct() {
        parent::__construct();
        $this->_objectId = 'sellerid';
        $this->_blockGroup = 'seller';
        $this->_controller = 'adminhtml_sellerdetails';
        $this->_mode = 'edit';
        $this->_updateButton('save', 'label', Mage::helper('seller')->__('Save'));
        $this->_updateButton('delete', 'label', Mage::helper('seller')->__('Delete'));
        $this->_addButton('saveandcontinue', [
           'label' => Mage::helper('seller')->__('Save And Continue Edit'),
            'onclick' => 'saveAndContinueEdit()',
            'class' => 'save',
        ], -100);
        
        $this->_formScripts[] ="
			function toggleEditor(){
				if (tinyMCE.getInstanceById('form_content') == null) {
					tinyMCE.execCommand('mceAddControl', false, 'edit_form');
				} else {
					tinyMCE.execCommand('mceRemoveControl', false, 'edit_form');
				}
			}
			function saveAndContinueEdit(){
				editForm.submit($('edit_form').action+'back/edit/');
			}"; 
        
    }
    	
    public function getHeaderText() {
		if (Mage::registry('seller_data') && Mage::registry('seller_data')->getId()) {
			return Mage::helper('seller')->__('Edit Seller Details "%s"', $this->htmlEscape(Mage::registry('seller_data')->getName()));
		} else {
			return Mage::helper('seller')->__('New Seller');
		}
	}

}