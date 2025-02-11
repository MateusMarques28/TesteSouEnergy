<?php

namespace Company\TermsAcceptance\Plugin;

use Magento\Customer\Model\ResourceModel\Grid\Collection;
use Magento\Framework\DB\Select;

class CustomerGridPlugin
{
    public function beforeLoad(Collection $collection)
    {
        if ($collection->isLoaded()) {
            return;
        }

        $connection = $collection->getConnection();
        $select = $collection->getSelect();

        // Usa um subquery para evitar registros duplicados
        $subQuery = new \Zend_Db_Expr(
            "(SELECT customer_id, MAX(accepted_at) as accepted_at FROM company_terms_acceptance GROUP BY customer_id)"
        );

        $select->joinLeft(
            ['terms' => $subQuery],
            'terms.customer_id = main_table.entity_id',
            ['terms_accepted' => "IF(terms.accepted_at IS NOT NULL, 'Sim', 'Não')"]
        );
    }
}
