<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\TextInput;

use BrandEmbassy\Components\SnapshotAssertTrait;
use Nette\Forms\Form;
use PHPUnit\Framework\TestCase;

/**
 * @final
 */
class TimeInputFieldRendererTest extends TestCase
{
    use SnapshotAssertTrait;


    public function testRender(): void
    {
        $timeInput = new TimeInputField('label');

        $form = new Form();
        $form->addComponent($timeInput, 'name');

        $renderer = new TimeInputFieldRenderer(new InputFieldRenderer());
        $component = $renderer->render($timeInput);

        $this->assertSnapshot(__DIR__ . '/__snapshots__/timeInput.html', $component);
    }
}
