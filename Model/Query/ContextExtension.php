<?php

namespace Ankith\CatalogGraphQl\Model\Query;

class ContextExtension extends \Magento\GraphQl\Model\Query\ContextExtension
{
    public function getQueryArgument()
    {
        return $this->_get('query_argument');
    }
}
