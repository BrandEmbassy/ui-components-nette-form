<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\TextInput;

use BrandEmbassy\MockeryTools\Snapshot\SnapshotAssertions;
use Nette\Forms\Form;
use PHPUnit\Framework\TestCase;

/**
 * @final
 */
class LongTextInputFieldRendererTest extends TestCase
{
    public function testRender(): void
    {
        $longTextInput = new LongTextInputField('label');

        $form = new Form();
        $form->addComponent($longTextInput, 'name');

        $renderer = new LongTextInputFieldRenderer(new InputFieldRenderer());
        $component = $renderer->render($longTextInput);

        SnapshotAssertions::assertSnapshotAndReplace(
            __DIR__ . '/__snapshots__/longTextInput.html',
            $component->render(),
            ['dataAttribute' => 'data-cy=\'Input-name\''],
        );
    }


    public function testRenderWithDataAttribute(): void
    {
        $longTextInput = new LongTextInputField('label');
        $longTextInput->setHtmlAttribute('data-attr', 'value');

        $form = new Form();
        $form->addComponent($longTextInput, 'name');

        $renderer = new LongTextInputFieldRenderer(new InputFieldRenderer());
        $component = $renderer->render($longTextInput);

        SnapshotAssertions::assertSnapshotAndReplace(
            __DIR__ . '/__snapshots__/longTextInput.html',
            $component->render(),
            ['dataAttribute' => 'data-attr=\'value\''],
        );
    }
}
