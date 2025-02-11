<?php
namespace Company\TermsAcceptance\Block;

use Magento\Framework\View\Element\Template;
use Magento\Customer\Model\Session;

class TermsAcceptance extends Template
{
    protected $session;

    public function __construct(
        Template\Context $context,
        Session $session,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->session = $session;
    }

    /**
     * Verifica se o modal de termos deve ser exibido.
     *
     * @return bool
     */
    public function shouldShowTermsModal()
    {
        return (bool)$this->session->getShowTermsModal();
    }
}
