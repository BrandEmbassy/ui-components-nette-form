<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\TextInput;

use BrandEmbassy\Components\SnapshotAssertTrait;
use Nette\Forms\Form;
use PHPUnit\Framework\TestCase;

/**
 * @final
 */
class TextInputFieldRendererTest extends TestCase
{
    use SnapshotAssertTrait;


    public function testRender(): void
    {
        $form = new Form();
        $textInput = $form->addText('name', 'label');

        $renderer = new TextInputFieldRenderer(new InputFieldRenderer());
        $component = $renderer->render($textInput);

        $this->assertSnapshot(__DIR__ . '/__snapshots__/textInput.html', $component);
    }
}
