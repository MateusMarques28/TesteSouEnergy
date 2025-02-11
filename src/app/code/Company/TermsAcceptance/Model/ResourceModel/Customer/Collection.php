<?php

namespace Company\TermsAcceptance\Model\ResourceModel\Customer;

use Magento\Customer\Model\ResourceModel\Customer\Collection as CustomerCollection;

class Collection extends CustomerCollection
{
    protected function _renderFiltersBefore()
    {
        $this->getSelect()->joinLeft(
            ['cta' => $this->getTable('company_terms_acceptance')],
            'cta.customer_id = e.entity_id',
            ['terms_accepted' => 'IF(cta.accepted_at IS NOT NULL, "Sim", "Não")']
        );

        parent::_renderFiltersBefore();
    }
}
