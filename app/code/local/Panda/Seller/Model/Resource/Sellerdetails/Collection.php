<?php
class Panda_Seller_Model_Resource_Sellerdetails_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract{
	public function _construct(){
		$this->_init('seller/sellerdetails');
	}
}