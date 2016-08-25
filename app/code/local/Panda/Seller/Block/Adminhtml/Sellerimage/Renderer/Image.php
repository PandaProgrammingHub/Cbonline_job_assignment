<?php
class Panda_Seller_Block_Adminhtml_Sellerimage_Renderer_Image extends
Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract {
	public function render(Varien_Object $row){
		
		$value = $row->getData($this->getColumn()->getIndex());
		if($value == NULL){
			return "No image found";
		}else{
			return '<img width="200" height="100" src="'.Mage::getBaseUrl('media').DS.$value . '" />';
		}
	}
}