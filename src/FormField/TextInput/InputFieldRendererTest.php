<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\TextInput;

use BrandEmbassy\Components\Controls\Input\InputType;
use BrandEmbassy\MockeryTools\Snapshot\SnapshotAssertions;
use Nette\Forms\Form;
use PHPUnit\Framework\TestCase;

/**
 * @final
 */
class InputFieldRendererTest extends TestCase
{
    public function testRender(): void
    {
        $form = new Form();
        $input = $form->addText('name', 'label');

        $renderer = new InputFieldRenderer();
        $component = $renderer->render($input, InputType::get(InputType::TEXT), []);

        SnapshotAssertions::assertSnapshotAndReplace(
            __DIR__ . '/__snapshots__/input.html',
            $component->render(),
            ['dataAttribute' => 'data-cy=\'Input-name\''],
        );
    }


    public function testRenderWithDataAttribute(): void
    {
        $form = new Form();
        $input = $form->addText('name', 'label');
        $input->setHtmlAttribute('data-attr', 'value');

        $renderer = new InputFieldRenderer();
        $component = $renderer->render($input, InputType::get(InputType::TEXT), []);

        SnapshotAssertions::assertSnapshotAndReplace(
            __DIR__ . '/__snapshots__/input.html',
            $component->render(),
            ['dataAttribute' => 'data-attr=\'value\''],
        );
    }
}
