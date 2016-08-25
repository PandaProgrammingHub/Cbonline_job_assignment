<?php

class Panda_Seller_IndexController extends Mage_Core_Controller_Front_Action{
	function indexAction(){
		$this->loadLayout();
		$block = $this->getLayout()->createBlock('Mage_Core_Block_Template','sellerlist',array('template' => 'panda/seller/sellerlist.phtml'));
		$this->getLayout()->getBlock('content')->append($block);
		$this->renderLayout();

	}
}