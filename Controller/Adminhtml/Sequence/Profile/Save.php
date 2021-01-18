<?php
/**
 * Copyright © 2011-2018 Karliuka Vitalii(karliuka.vitalii@gmail.com)
 *
 * See COPYING.txt for license details.
 */
namespace Faonni\SalesSequence\Controller\Adminhtml\Sequence\Profile;

use Faonni\SalesSequence\Controller\Adminhtml\Sequence\Profile as AbstractController;

/**
 * Profile Save Controller
 */
class Save extends AbstractController
{
    /**
     * Save profile form processing
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        $data = $this->request->getPostValue();
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {
            $profile = $this->_initProfile();
            if ($profile) {
                unset($data['meta_id']);
                $profile->setData($data);
                try {
                    $profile->save();
                    $this->messageManager->addSuccess(
                        __('You saved the sequence profile.')
                    );
                    return $resultRedirect->setPath('sales/*/');
                }
                catch (\Exception $e) {
                    $this->messageManager->addException(
                        $e,
                        __('We can\'t save the sequence profile right now.')
                    );
                }
                $this->_getSession()->setFormData($data);
                return $resultRedirect->setPath(
                    'sales/*/edit',
                    ['profile_id' => $this->request->getParam('profile_id')]
                );
            } else {
                $this->messageManager->addError(
                    __('We can\'t find this sequence profile.')
                );
                return $resultRedirect->setPath('sales/');
            }
        }
        return $resultRedirect->setPath('sales/*/');
    }
}
