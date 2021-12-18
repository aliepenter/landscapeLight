<?php
 
namespace Rokanthemes\RokanBase\Block\Adminhtml;
 
use Magento\Backend\Block\Widget\Grid\Container;
 
class Documents extends Container
{
   
   protected function _construct()
   {
      $this->_controller = 'adminhtml_documents';
      $this->_blockGroup = 'Rokanthemes_RokanBase';
      $this->_headerText = __('Manage Documents');
      $this->_addButtonLabel = __('Add Documents');
      parent::_construct();
   }
}
 