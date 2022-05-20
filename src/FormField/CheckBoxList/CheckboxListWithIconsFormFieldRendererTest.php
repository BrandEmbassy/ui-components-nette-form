<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\CheckBoxList;

use BrandEmbassy\MockeryTools\Snapshot\SnapshotAssertions;
use Generator;
use Nette\Forms\Form;
use PHPUnit\Framework\TestCase;

/**
 * @final
 */
class CheckboxListWithIconsFormFieldRendererTest extends TestCase
{
    /**
     * @dataProvider componentDataProvider
     */
    public function testRenderingCheckBoxList(
        string $expectedDataAttribute,
        CheckboxListWithIconsFormField $componentToRender
    ): void {
        $form = new Form();
        $form->addComponent($componentToRender, 'checkBoxListComponent');

        $renderer = new CheckboxListWithIconsFormFieldRenderer();
        $checkBoxComponent = $renderer->render($componentToRender);

        SnapshotAssertions::assertSnapshotAndReplace(
            __DIR__ . '/__snapshots__/checkBoxList.html',
            $checkBoxComponent->render(),
            ['dataAttribute' => $expectedDataAttribute],
        );
    }


    /**
     * @return Generator<string, array<string, mixed>>
     */
    public function componentDataProvider(): Generator
    {
        $checkBoxList = $this->createCheckBoxList();

        yield 'with default data attribute' => [
            'expectedDataAttribute' => 'data-cy=\'SelectList\'',
            'componentToRender' => $checkBoxList,
        ];

        $checkBoxListWithDataAttr = $this->createCheckBoxList();
        $checkBoxListWithDataAttr->setHtmlAttribute('data-attr', 'value');

        yield 'with custom data attribute' => [
            'expectedDataAttribute' => 'data-attr=\'value\'',
            'componentToRender' => $checkBoxListWithDataAttr,
        ];
    }


    private function createCheckBoxList(): CheckboxListWithIconsFormField
    {
        return new CheckboxListWithIconsFormField(
            'checkBoxList',
            [
                new CheckBoxListItem('id-1', 'check-label-1'),
                new CheckBoxListItem('id-2', 'check-label-2'),
            ],
        );
    }
}
