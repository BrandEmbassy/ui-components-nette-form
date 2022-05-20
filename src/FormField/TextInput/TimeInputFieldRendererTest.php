<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\TextInput;

use BrandEmbassy\MockeryTools\Snapshot\SnapshotAssertions;
use Nette\Forms\Form;
use PHPUnit\Framework\TestCase;

/**
 * @final
 */
class TimeInputFieldRendererTest extends TestCase
{
    public function testRender(): void
    {
        $timeInput = new TimeInputField('label');

        $form = new Form();
        $form->addComponent($timeInput, 'name');

        $renderer = new TimeInputFieldRenderer(new InputFieldRenderer());
        $component = $renderer->render($timeInput);

        SnapshotAssertions::assertSnapshotAndReplace(
            __DIR__ . '/__snapshots__/timeInput.html',
            $component->render(),
            ['dataAttribute' => 'data-cy=\'Input-name\''],
        );
    }


    public function testRenderWithDataAttribute(): void
    {
        $timeInput = new TimeInputField('label');
        $timeInput->setHtmlAttribute('data-attr', 'value');

        $form = new Form();
        $form->addComponent($timeInput, 'name');

        $renderer = new TimeInputFieldRenderer(new InputFieldRenderer());
        $component = $renderer->render($timeInput);

        SnapshotAssertions::assertSnapshotAndReplace(
            __DIR__ . '/__snapshots__/timeInput.html',
            $component->render(),
            ['dataAttribute' => 'data-attr=\'value\''],
        );
    }
}
