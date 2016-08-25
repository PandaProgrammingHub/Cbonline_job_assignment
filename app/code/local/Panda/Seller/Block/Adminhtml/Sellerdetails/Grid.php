<?php

class Panda_Seller_Block_Adminhtml_Sellerdetails_Grid extends Mage_Adminhtml_Block_Widget_Grid{
    public function __construct() {
        parent::__construct();
        $this->setId('seller_grid');
        $this->setDefaultSort('seller_id'); 
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
        
    }
    
    protected function _prepareCollection() {
        $collection = Mage::getModel('seller/sellerdetails')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }
    
    protected function _prepareColumns() {
	 $this->addColumn('seller_id', [
			'header' => Mage::helper('seller')->__('ID'),
			'align' => 'center',
			'width' => '10px',
			'index' => 'seller_id',
		]);
    $this->addColumn('name', [
            'header' => Mage::helper('seller')->__('Name'),
            'align' => 'left',
            'index' => 'name',
        ]);
    $this->addColumn('email', [
            'header' => Mage::helper('seller')->__('Email'),
            'align' => 'left',
            'index' => 'email',
        ]);
    $this->addColumn('address', [
            'header' => Mage::helper('seller')->__('Address'),
            'align' => 'left',
            'index' => 'address',
        ]);
		$this->addColumn('image', array(
			'header' => Mage::helper('seller')->__('Image'),
			'align' => 'left',
			'width' => '200px',
			'index' => 'image',
			'renderer' => 'seller/adminhtml_sellerimage_renderer_image',
		));
                  

		$this->addColumn('mobile', array(
			'header' => Mage::helper('seller')->__('Mobile'),
			'align' => 'left',
			'index' => 'mobile',
		));
    


        return parent::_prepareColumns();
    }
 
    public function getRowUrl($row) {
        return $this->getUrl('*/*/edit', ['id' => $row->getId()]);
    }
}

