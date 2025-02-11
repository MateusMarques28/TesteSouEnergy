<?php
namespace Company\TermsAcceptance\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class TermsAcceptance extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('company_terms_acceptance', 'id');
    }
}
