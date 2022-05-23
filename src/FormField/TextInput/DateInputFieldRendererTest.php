<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\TextInput;

use BrandEmbassy\MockeryTools\Snapshot\SnapshotAssertions;
use Nette\Forms\Form;
use PHPUnit\Framework\TestCase;

/**
 * @final
 */
class DateInputFieldRendererTest extends TestCase
{
    public function testRender(): void
    {
        $dateInput = new DateInputField('label');

        $form = new Form();
        $form->addComponent($dateInput, 'name');

        $renderer = new DateInputFieldRenderer(new InputFieldRenderer());
        $component = $renderer->render($dateInput);

        SnapshotAssertions::assertSnapshotAndReplace(
            __DIR__ . '/__snapshots__/dateInput.html',
            $component->render(),
            ['dataAttribute' => 'data-cy=\'Input-name\''],
        );
    }


    public function testRenderWithCustomDataAttribute(): void
    {
        $dateInput = new DateInputField('label');
        $dateInput->setHtmlAttribute('data-attr', 'value');

        $form = new Form();
        $form->addComponent($dateInput, 'name');

        $renderer = new DateInputFieldRenderer(new InputFieldRenderer());
        $component = $renderer->render($dateInput);

        SnapshotAssertions::assertSnapshotAndReplace(
            __DIR__ . '/__snapshots__/dateInput.html',
            $component->render(),
            ['dataAttribute' => 'data-attr=\'value\''],
        );
    }
}
