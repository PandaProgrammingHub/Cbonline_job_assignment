<?php

class Panda_Seller_Model_Resource_Sellerdetails extends Mage_Core_Model_Mysql4_Abstract{
	public function _construct() {
		$this->_init('seller/sellerdetails', 'seller_id');
	}
}

