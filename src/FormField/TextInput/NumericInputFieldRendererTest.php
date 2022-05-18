<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\TextInput;

use BrandEmbassy\Components\SnapshotAssertTrait;
use Nette\Forms\Form;
use PHPUnit\Framework\TestCase;

/**
 * @final
 */
class NumericInputFieldRendererTest extends TestCase
{
    use SnapshotAssertTrait;

    private const MIN_VALUE = 1;
    private const MAX_VALUE = 10;


    public function testRender(): void
    {
        $numericInputField = new NumericInputField('label', self::MIN_VALUE, self::MAX_VALUE);

        $form = new Form();
        $form->addComponent($numericInputField, 'name');

        $renderer = new NumericInputFieldRenderer(new InputFieldRenderer());
        $component = $renderer->render($numericInputField);

        $this->assertSnapshot(__DIR__ . '/__snapshots__/numericInput.html', $component);
    }
}
