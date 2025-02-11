<?php
namespace Company\TermsAcceptance\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Company\TermsAcceptance\Model\TermsAcceptanceFactory;

class Accept extends Action
{
    protected $jsonFactory;
    protected $termsAcceptanceFactory;

    public function __construct(
        Context $context,
        JsonFactory $jsonFactory,
        TermsAcceptanceFactory $termsAcceptanceFactory
    ) {
        parent::__construct($context);
        $this->jsonFactory = $jsonFactory;
        $this->termsAcceptanceFactory = $termsAcceptanceFactory;
    }

    public function execute()
    {
        $result = $this->jsonFactory->create();
        $customerId = $this->_getSession()->getCustomerId();

        if ($customerId) {
            try {
                // Verifica se o cliente já aceitou os termos
                $termsAcceptance = $this->termsAcceptanceFactory->create();
                $termsAcceptance->load($customerId, 'customer_id');

                if (!$termsAcceptance->getId()) {
                    // Salva a aceitação dos termos
                    $termsAcceptance->setCustomerId($customerId);
                    $termsAcceptance->save();

                    // Atualiza a sessão para não exibir o modal novamente
                    $this->_getSession()->setShowTermsModal(false);
                }

                return $result->setData(['success' => true]);
            } catch (\Exception $e) {
                return $result->setData(['success' => false, 'message' => $e->getMessage()]);
            }
        }

        return $result->setData(['success' => false, 'message' => 'ID do cliente não encontrado.']);
    }

    protected function _getSession()
    {
        return $this->_objectManager->get('Magento\Customer\Model\Session');
    }
}
