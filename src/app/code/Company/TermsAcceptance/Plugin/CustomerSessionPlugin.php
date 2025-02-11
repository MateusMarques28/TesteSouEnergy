<?php
namespace Company\TermsAcceptance\Plugin;

use Magento\Customer\Model\Session;
use Company\TermsAcceptance\Model\TermsAcceptanceFactory;

class CustomerSessionPlugin
{
    protected $termsAcceptanceFactory;

    public function __construct(
        TermsAcceptanceFactory $termsAcceptanceFactory
    ) {
        $this->termsAcceptanceFactory = $termsAcceptanceFactory;
    }

    public function afterLoad(Session $subject, $result)
    {
        $customerId = $subject->getCustomerId();

        if ($customerId) {
            $termsAcceptance = $this->termsAcceptanceFactory->create();
            $termsAcceptance->load($customerId, 'customer_id');

            if (!$termsAcceptance->getId()) {
                // O modal deve ser exibido
                $subject->setShowTermsModal(true);
            } else {
                // O modal não deve ser exibido
                $subject->setShowTermsModal(false);
            }
        }

        return $result;
    }
}
