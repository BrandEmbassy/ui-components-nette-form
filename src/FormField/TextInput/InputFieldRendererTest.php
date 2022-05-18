<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\TextInput;

use BrandEmbassy\Components\Controls\Input\InputType;
use BrandEmbassy\Components\SnapshotAssertTrait;
use Nette\Forms\Form;
use PHPUnit\Framework\TestCase;

/**
 * @final
 */
class InputFieldRendererTest extends TestCase
{
    use SnapshotAssertTrait;


    public function testRender(): void
    {
        $form = new Form();
        $input = $form->addText('name', 'label');

        $renderer = new InputFieldRenderer();
        $component = $renderer->render($input, InputType::get(InputType::TEXT), []);

        $this->assertSnapshot(__DIR__ . '/__snapshots__/input.html', $component);
    }
}
