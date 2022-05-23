<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\CheckBox;

use BrandEmbassy\MockeryTools\Snapshot\SnapshotAssertions;
use Nette\Forms\Form;
use PHPUnit\Framework\TestCase;

/**
 * @final
 */
class CheckBoxFormFieldRendererTest extends TestCase
{
    public function testRenderingCheckBox(): void
    {
        $form = new Form();
        $checkbox = $form->addCheckbox('checkBox');

        $renderer = new CheckBoxFormFieldRenderer();
        $checkBoxComponent = $renderer->render($checkbox);

        SnapshotAssertions::assertSnapshotAndReplace(
            __DIR__ . '/__snapshots__/checkbox.html',
            $checkBoxComponent->render(),
            ['dataAttribute' => 'data-cy=\'Checkbox-checkBox\''],
        );
    }


    public function testRenderingCheckBoxWithCustomDataAttributes(): void
    {
        $form = new Form();
        $checkbox = $form->addCheckbox('checkBox');
        $checkbox->setHtmlAttribute('data-attr', 'value');

        $renderer = new CheckBoxFormFieldRenderer();
        $checkBoxComponent = $renderer->render($checkbox);

        SnapshotAssertions::assertSnapshotAndReplace(
            __DIR__ . '/__snapshots__/checkbox.html',
            $checkBoxComponent->render(),
            ['dataAttribute' => 'data-attr=\'value\''],
        );
    }
}
