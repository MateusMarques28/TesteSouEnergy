<?php

namespace Company\TermsAcceptance\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    const XML_PATH_TERMSMODAL = 'termsmodal/settings/enable_modal';

    public function isModalEnabled()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_TERMSMODAL, ScopeInterface::SCOPE_STORE);
    }
}
