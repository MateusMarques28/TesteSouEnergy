<?php
namespace Company\TermsAcceptance\Model\ResourceModel\TermsAcceptance;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Company\TermsAcceptance\Model\TermsAcceptance', 'Company\TermsAcceptance\Model\ResourceModel\TermsAcceptance');
    }
}
