<?php

namespace Company\TermsAcceptance\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;

class TermsStatus implements OptionSourceInterface
{
    public function toOptionArray()
    {
        return [
            ['value' => 'Sim', 'label' => __('Sim')],
            ['value' => 'Não', 'label' => __('Não')]
        ];
    }
}
