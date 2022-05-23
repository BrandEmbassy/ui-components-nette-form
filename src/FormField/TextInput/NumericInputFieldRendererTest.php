<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\TextInput;

use BrandEmbassy\MockeryTools\Snapshot\SnapshotAssertions;
use Nette\Forms\Form;
use PHPUnit\Framework\TestCase;

/**
 * @final
 */
class NumericInputFieldRendererTest extends TestCase
{
    private const MIN_VALUE = 1;
    private const MAX_VALUE = 10;


    public function testRender(): void
    {
        $numericInputField = new NumericInputField('label', self::MIN_VALUE, self::MAX_VALUE);

        $form = new Form();
        $form->addComponent($numericInputField, 'name');

        $renderer = new NumericInputFieldRenderer(new InputFieldRenderer());
        $component = $renderer->render($numericInputField);

        SnapshotAssertions::assertSnapshotAndReplace(
            __DIR__ . '/__snapshots__/numericInput.html',
            $component->render(),
            ['dataAttribute' => 'data-cy=\'Input-name\''],
        );
    }


    public function testRenderWithCustomDataAttribute(): void
    {
        $numericInputField = new NumericInputField('label', self::MIN_VALUE, self::MAX_VALUE);
        $numericInputField->setHtmlAttribute('data-attr', 'value');

        $form = new Form();
        $form->addComponent($numericInputField, 'name');

        $renderer = new NumericInputFieldRenderer(new InputFieldRenderer());
        $component = $renderer->render($numericInputField);

        SnapshotAssertions::assertSnapshotAndReplace(
            __DIR__ . '/__snapshots__/numericInput.html',
            $component->render(),
            ['dataAttribute' => 'data-attr=\'value\''],
        );
    }
}
