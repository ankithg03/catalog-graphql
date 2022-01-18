<?php

namespace Ankith\CatalogGraphQl\Plugin\Model\Resolver\Products\DataProvider\Product\CollectionProcessor;

use Magento\Catalog\Model\ResourceModel\Product\Collection;
use Magento\CatalogGraphQl\Model\Resolver\Products\DataProvider\Product\CollectionProcessor\StockProcessor as Subject;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\GraphQl\Model\Query\ContextInterface;
use Ankith\CatalogGraphQl\Model\Query\ContextExtension;
class StockProcessor
{
    public function aroundProcess(
        Subject $subject,
        callable $proceed,
        Collection $collection,
        SearchCriteriaInterface $searchCriteria,
        array $attributeNames,
        ContextInterface $context = null
    ): Collection
    {
        if (isset($context)) {
            /**
             * @var $extensionAttributes ContextExtension
             */
            $extensionAttributes = $context->getExtensionAttributes();
            $queryArgument = $extensionAttributes->getQueryArgument();
            if(isset($queryArgument['filter']) && isset($queryArgument['filter']['url_key'])) {
                return $collection;
            }
        }
       return $proceed($collection, $searchCriteria, $attributeNames, $context);
    }

}
