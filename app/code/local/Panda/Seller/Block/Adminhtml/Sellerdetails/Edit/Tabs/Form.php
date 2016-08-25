<?php
class Panda_Seller_Block_Adminhtml_Sellerdetails_Edit_Tabs_Form extends Mage_Adminhtml_Block_Widget_Form{
	Protected function _prepareForm(){
		if (Mage::registry('seller_data')){
			$data=Mage::registry('seller_data')->getData();

		}else{
			$data=array();
		}
		$form=new Varien_Data_Form();
		$this->setForm($form);
		$fieldset=$form->addFieldset('seller_sellerdetails', array('legand'=>Mage::helper('seller')->__('Seller Information')));
     	
     $fieldset->addField('name', 'text', array(
     	'label'=>Mage::helper('seller')->__('Name'),
     	'class'=>'required_entry',
     	'required'=>true,
     	'name'=>'name',
     	));
     $fieldset->addField('email', 'text', array(
      'label'=>Mage::helper('seller')->__('Email'),
      'class'=>'required_entry',
      'required'=>true,
      'name'=>'email',
      ));
     $fieldset->addField('address', 'text', array(
      'label'=>Mage::helper('seller')->__('Address'),
      'class'=>'required_entry',
      'required'=>true,
      'name'=>'address',
      ));
     $fieldset->addField('image', 'image', array(
     	'label'=>Mage::helper('seller')->__('Image'),
     	'class'=>'required_entry',
      'required'=>true,
     	'name'=>'image',
     	'note'=>'(*.jpg, *.jpeg, *.png, *.gif)',

       	));
     $fieldset->addField('mobile', 'text', array(
      'label'=>Mage::helper('seller')->__('Mobile'),
      'class'=>'required_entry',
      'required'=>true,
      'name'=>'mobile',
      ));

     $form->setValues($data);
     return parent:: _prepareForm();
	
	}
}



?>