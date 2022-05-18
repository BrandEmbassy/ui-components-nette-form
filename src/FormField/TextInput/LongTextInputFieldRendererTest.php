<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\TextInput;

use BrandEmbassy\Components\SnapshotAssertTrait;
use Nette\Forms\Form;
use PHPUnit\Framework\TestCase;

/**
 * @final
 */
class LongTextInputFieldRendererTest extends TestCase
{
    use SnapshotAssertTrait;


    public function testRender(): void
    {
        $longTextInput = new LongTextInputField('label');

        $form = new Form();
        $form->addComponent($longTextInput, 'name');

        $renderer = new LongTextInputFieldRenderer(new InputFieldRenderer());
        $component = $renderer->render($longTextInput);

        $this->assertSnapshot(__DIR__ . '/__snapshots__/longTextInput.html', $component);
    }
}
