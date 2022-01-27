<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm;

use BrandEmbassy\Components\DataAttribute;
use BrandEmbassy\Components\DataAttributes;
use Nette\Utils\Html;
use Nette\Utils\Strings;
use function array_filter;
use function is_array;
use const ARRAY_FILTER_USE_KEY;

final class NetteHtmlDataAttributesProvider
{
    /**
     * @var Html
     */
    private $html;


    public function __construct(Html $html)
    {
        $this->html = $html;
    }


    public function findDataAttributes(): ?DataAttributes
    {
        $rawDataAttributes = array_filter($this->html->attrs, static function (string $key): bool {
            return Strings::startsWith($key, 'data-');
        }, ARRAY_FILTER_USE_KEY);

        if ($rawDataAttributes === []) {
            return null;
        }

        $dataAttributes = [];

        foreach ($rawDataAttributes as $attributeName => $attributeValue) {
            if (is_array($attributeValue)) {
                $dataAttributes[] = DataAttribute::createWithArrayValue($attributeName, $attributeValue);
                continue;
            }

            $dataAttributes[] = DataAttribute::createWithStringValue($attributeName, (string)$attributeValue);
        }

        return new DataAttributes($dataAttributes);
    }
}
