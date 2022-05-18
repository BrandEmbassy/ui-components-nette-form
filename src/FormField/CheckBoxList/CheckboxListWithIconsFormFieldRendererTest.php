<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\CheckBoxList;

use BrandEmbassy\Components\SnapshotAssertTrait;
use Nette\Forms\Form;
use PHPUnit\Framework\TestCase;

/**
 * @final
 */
class CheckboxListWithIconsFormFieldRendererTest extends TestCase
{
    use SnapshotAssertTrait;


    public function testRenderingCheckBoxList(): void
    {
        $checkBoxList = new CheckboxListWithIconsFormField(
            'checkBoxList',
            [
                new CheckBoxListItem('id-1', 'check-label-1'),
                new CheckBoxListItem('id-2', 'check-label-2'),
            ],
        );

        $form = new Form();
        $form->addComponent($checkBoxList, 'checkBoxListComponent');

        $renderer = new CheckboxListWithIconsFormFieldRenderer();
        $checkBoxComponent = $renderer->render($checkBoxList);

        $this->assertSnapshot(__DIR__ . '/__snapshots__/checkBoxList.html', $checkBoxComponent);
    }
}
