<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm;

use Nette\Forms\Controls\Checkbox;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use function assert;

/**
 * @final
 */
class NetteHtmlDataAttributesProviderTest extends TestCase
{
    private const EXPECTED_DATA_ATTRIBUTES_HTML = 'data-first=\'string-value\' data-second=\'{"json":"value"}\'';


    public function testFindingDataAttributes(): void
    {
        $checkbox = new Checkbox('label');
        $checkbox->setHtmlAttribute('data-first', 'string-value');
        $checkbox->setHtmlAttribute('style', 'text-align: center;');
        $checkbox->setHtmlAttribute('data-second', [
            'json' => 'value',
        ]);

        $attributesResolver = new NetteHtmlDataAttributesProvider();
        $dataAttributes = $attributesResolver->findDataAttributes($checkbox);

        assert($dataAttributes !== null);
        Assert::assertSame(self::EXPECTED_DATA_ATTRIBUTES_HTML, $dataAttributes->getHtmlAttributes());
    }


    public function testReturningNullWhenNoDataAttributeFound(): void
    {
        $checkbox = new Checkbox('label');
        $checkbox->setHtmlAttribute('height', 300);
        $checkbox->setHtmlAttribute('style', 'text-align: center;');

        $attributesResolver = new NetteHtmlDataAttributesProvider();
        $dataAttributes = $attributesResolver->findDataAttributes($checkbox);

        Assert::assertNull($dataAttributes);
    }
}
