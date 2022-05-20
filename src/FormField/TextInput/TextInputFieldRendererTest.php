<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\TextInput;

use BrandEmbassy\MockeryTools\Snapshot\SnapshotAssertions;
use Nette\Forms\Form;
use PHPUnit\Framework\TestCase;

/**
 * @final
 */
class TextInputFieldRendererTest extends TestCase
{
    public function testRender(): void
    {
        $form = new Form();
        $textInput = $form->addText('name', 'label');

        $renderer = new TextInputFieldRenderer(new InputFieldRenderer());
        $component = $renderer->render($textInput);

        SnapshotAssertions::assertSnapshotAndReplace(
            __DIR__ . '/__snapshots__/textInput.html',
            $component->render(),
            ['dataAttribute' => 'data-cy=\'Input-name\''],
        );
    }


    public function testRenderWithDataAttribute(): void
    {
        $form = new Form();
        $textInput = $form->addText('name', 'label');
        $textInput->setHtmlAttribute('data-attr', 'value');

        $renderer = new TextInputFieldRenderer(new InputFieldRenderer());
        $component = $renderer->render($textInput);

        SnapshotAssertions::assertSnapshotAndReplace(
            __DIR__ . '/__snapshots__/textInput.html',
            $component->render(),
            ['dataAttribute' => 'data-attr=\'value\''],
        );
    }
}
