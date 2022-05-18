<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\TextInput;

use BrandEmbassy\Components\SnapshotAssertTrait;
use Nette\Forms\Form;
use PHPUnit\Framework\TestCase;

/**
 * @final
 */
class DateInputFieldRendererTest extends TestCase
{
    use SnapshotAssertTrait;


    public function testRender(): void
    {
        $dateInput = new DateInputField('label');

        $form = new Form();
        $form->addComponent($dateInput, 'name');

        $renderer = new DateInputFieldRenderer(new InputFieldRenderer());
        $component = $renderer->render($dateInput);

        $this->assertSnapshot(__DIR__ . '/__snapshots__/dateInput.html', $component);
    }
}
