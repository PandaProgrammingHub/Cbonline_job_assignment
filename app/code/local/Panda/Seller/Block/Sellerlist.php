<?php 
class Panda_Seller_Block_Sellerlist
extends Mage_Adminhtml_Block_Widget

{

	public function __construct()
	{   parent::_construct();
		$this->setTemplate('panda/seller/sellerlist.phtml');

	}
}


?>