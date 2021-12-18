<?php

namespace Blueskytechco\ProductDocument\Controller\Adminhtml\Index;

use Magento\Framework\Controller\ResultFactory;

class Upload extends \Magento\Backend\App\Action
{
    public $imageUploader;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Vendor\Module\Model\ImageUploader $imageUploader
    ) {
        parent::__construct($context);
        $this->imageUploader = $imageUploader;
    }

    public function execute()
    {
        /** @var \Magento\Framework\Controller\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        try{
            $target = $this->_mediaDirectory->getAbsolutePath('mycustomfolder/');
            /** @var $uploader \Magento\MediaStorage\Model\File\Uploader */
            $uploader = $this->_fileUploaderFactory->create(['fileId' => 'file']);
            /** Allowed extension types */
            $uploader->setAllowedExtensions(['pdf','pptx', 'xls', 'xlsx', 'flash', 'mp3', 'docx', 'doc', 'zip', 'jpg', 'jpeg', 'png', 'gif', 'ini', 'readme', 'avi', 'csv', 'txt', 'wma', 'mpg', 'flv', 'mp4']);
            /** rename file name if already exists */
            $uploader->setAllowRenameFiles(true);
            /** upload file in folder "mycustomfolder" */
            $result = $uploader->save($target);
            if ($result['file']) {
                $this->messageManager->addSuccess(__('File has been successfully uploaded'));
            }
        } catch (\Exception $e) {
            $this->messageManager->addError($e->getMessage());
        }
        return $this->resultRedirectFactory->create()->setPath(
            '*/*/upload', ['_secure'=>$this->getRequest()->isSecure()]
        );
    }
}
