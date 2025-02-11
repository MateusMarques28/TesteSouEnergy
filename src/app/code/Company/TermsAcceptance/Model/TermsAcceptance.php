<?php
namespace Company\TermsAcceptance\Model;

use Magento\Framework\Model\AbstractModel;

class TermsAcceptance extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('Company\TermsAcceptance\Model\ResourceModel\TermsAcceptance');
    }
}
