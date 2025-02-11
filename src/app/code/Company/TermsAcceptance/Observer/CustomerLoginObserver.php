<?php
namespace Company\TermsAcceptance\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Customer\Model\Session;
use Company\TermsAcceptance\Model\TermsAcceptanceFactory;

class CustomerLoginObserver implements ObserverInterface
{
    protected $session;
    protected $termsAcceptanceFactory;

    public function __construct(
        Session $session,
        TermsAcceptanceFactory $termsAcceptanceFactory
    ) {
        $this->session = $session;
        $this->termsAcceptanceFactory = $termsAcceptanceFactory;
    }

    public function execute(Observer $observer)
    {
        $customerId = $this->session->getCustomerId();

        if ($customerId) {
            $termsAcceptance = $this->termsAcceptanceFactory->create();
            $termsAcceptance->load($customerId, 'customer_id');

            if (!$termsAcceptance->getId()) {
                // O modal será exibido via template
                // Aqui você pode adicionar lógica adicional se necessário
                // Por exemplo, registrar um flag na sessão para exibir o modal
                $this->session->setShowTermsModal(true);
            } else {
                // O usuário já aceitou os termos, não é necessário exibir o modal
                $this->session->setShowTermsModal(false);
            }
        }
    }
}
