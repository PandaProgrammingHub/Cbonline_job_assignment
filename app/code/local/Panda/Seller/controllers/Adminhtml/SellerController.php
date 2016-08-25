<?php
class Panda_Seller_Adminhtml_SellerController extends Mage_Adminhtml_Controller_Action{
    protected function _initAction(){
        $this->loadLayout()->_setActiveMenu('seller/sellerdetails')->_addBreadcrumb(
                Mage::helper('adminhtml')->__('Manage Seller'),
                Mage::helper('adminhtml')->__('Manage Seller')
                
        );
        return $this;
    }
    
    public function indexAction(){
        $this->_initAction()->renderLayout();
    }


  public function saveAction(){
        if($data = $this->getRequest()->getPost()){
         //  echo '<pre>'; print_r($data);
            $model = Mage::getModel('seller/sellerdetails');
            $id = $this->getRequest()->getParam('id'); 
            foreach ($data as $key => $value){
                echo is_array($value);
                        
                if(is_array($value)){
                    $data[$key] = implode(',', $this->getRequest()->getParam($key));
                }
            }
            
            if($id){
                $model->load($id);
            }
            
            if(isset($_FILES['image']['name']) and (  file_exists($_FILES['image']['tmp_name']))){
                try {
                    $uploader = new Varien_File_Uploader('image');
                    $uploader->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);
                    $uploader->setAllowRenameFiles(false);
                    $uploader->setFilesDispersion(false);
                    $path = Mage::getBaseDir('media'). DS .'seller';
                    $imgName = explode('.', $_FILES['image']['name']);
                    $imgName[0] = $imgName[0]. '-'.'image'.'-'.date('Y-m-d H-i-s');
                    $imgName = implode('.',$imgName);
                    $imgName = preg_replace('/\s+/', '-', $imgName);
                    $uploader->save($path, $imgName);
                    $data['image'] = 'seller'.DS.$imgName;
                } catch (Exception $ex) {
                    
                }
            }else{
                if(isset($data['image']) && $data['image']['delete'] == 1){
                    
                    $image = explode(',',$data['image']);
                    unlink(Mage::getBaseDir('media').DS.$image[1]);
                    
                    $data['image'] = ''; 
        }else{
                    unset($data['image']);
        }
            }
            
            
            
            
            $model->setData($data);
            Mage::getSingleton('adminhtml/session')->setFormData($data);
            try{
                if ($id){
                    $model->setId($id);
                }

                $model->save();
                if (!$model->getId()){
                    Mage::throwException(Mage::helper('seller')->__('Error saving seller details'));
                }
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('seller')->__('Seller Details was successfully saved.'));
                Mage::getSingleton('adminhtml/session')->setFormData(false);

                
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', array('id' => $model->getId()));
                }else{
                    $this->_redirect('*/*/');
                }
            }catch(Exception $e){
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                if ($model && $model->getId()){
                    $this->_redirect('*/*/edit', array('id' => $model->getId()));
                }else {
                    $this->_redirect('*/*/');
                } 
            }
            return;
         }
         Mage::getSingleton('adminhtml/session')->addError(Mage::helper('seller')->__('No data found to save'));
         $this->_redirect('*/*/'); 
    }
    public function editAction(){
        $id = $this->getRequest()->getParam('id', null);
        $model = Mage::getModel('seller/sellerdetails');
        if($id){
            $model->load((int)$id);
            if($model->getId()){
                $data = Mage::getSingleton('adminhtml/session')->getFormData(true);
                if($data){
                $model->setData($data)->setId($id);
        }
            }else{
                    Mage::getSingleton('adminhtml/session')->addError(Mage::helper('seller')->__('Seller does not exist'));
                    $this->_redirect('*/*/');
            }
        }
        Mage::register('seller_data', $model);
    $this->_title($this->__('seller'))->_title($this->__('Edit Seller Details'));
    $this->loadLayout();
    $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);
    $this->_addContent($this->getLayout()->createBlock('seller/adminhtml_sellerdetails_edit'))
    ->_addLeft($this->getLayout()->createBlock('seller/adminhtml_sellerdetails_edit_tabs'));
    $this->renderLayout();
        
    }
    
    public function deleteAction(){
        if($this->getRequest()->getParam('id') > 0){
            try {
                $model = Mage::getModel('seller/sellerdetails');
                $id = $this->getRequest()->getParam('id');
                $objModel = $model->load($id);
                $path = Mage::getBaseDir('media');
                unlink($path.DS.$objModel->Image);
                $objModel->setId($id)->delete();
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Seller Details was successfully deleted'));
        $this->_redirect('*/*/');
                
            } catch (Exception $ex) {
                Mage::getSingleton('adminhtml/session')->addError($ex->getMessage());
        $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
            }
        }
        $this->_redirect('*/*/'); 
    }
    
    
    
}
?>

