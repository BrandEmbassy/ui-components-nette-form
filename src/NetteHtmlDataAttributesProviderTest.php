<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm;

use Nette\Utils\Html;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use function assert;

final class NetteHtmlDataAttributesProviderTest extends TestCase
{
    private const EXPECTED_DATA_ATTRIBUTES_HTML = 'data-first=\'string-value\' data-second=\'{"json":"value"}\'';


    public function testFindingDataAttributes(): void
    {
        $html = new Html();
        $html->addAttributes([
            'data-first' => 'string-value',
            'style' => 'text-align: center;',
            'data-second' => [
                'json' => 'value',
            ],
        ]);

        $attributesResolver = new NetteHtmlDataAttributesProvider($html);
        $dataAttributes = $attributesResolver->findDataAttributes();

        assert($dataAttributes !== null);
        Assert::assertSame(self::EXPECTED_DATA_ATTRIBUTES_HTML, $dataAttributes->getHtmlAttributes());
    }


    public function testReturningNullWhenNoDataAttributeFound(): void
    {
        $html = new Html();
        $html->addAttributes([
            'style' => 'text-align: center;',
            'height' => 300,
        ]);

        $attributesResolver = new NetteHtmlDataAttributesProvider($html);
        $dataAttributes = $attributesResolver->findDataAttributes();

        Assert::assertNull($dataAttributes);
    }
}
