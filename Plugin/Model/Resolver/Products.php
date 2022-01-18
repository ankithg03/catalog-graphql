<?php

namespace Ankith\CatalogGraphQl\Plugin\Model\Resolver;

use Magento\CatalogGraphQl\Model\Resolver\Products as Subject;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

class Products
{
    /**
     * @param Subject $subject
     * @param Field $field
     * @param $context
     * @param ResolveInfo $info
     * @param $value
     * @param array|null $args
     * @return array
     */
    public function beforeResolve(
        Subject $subject,
        Field $field,
              $context,
        ResolveInfo $info,
        $value = null,
        array $args = null
    ): array
    {
        if ($context) {
            $extensionAttribute = $context->getExtensionAttributes();
            $extensionAttribute->setData('query_argument', $args);
        }
        return [
            $field,
            $context,
            $info,
            $value,
            $args
        ];
    }
}
