<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\CheckBox;

use BrandEmbassy\Components\SnapshotAssertTrait;
use Nette\Forms\Form;
use PHPUnit\Framework\TestCase;

/**
 * @final
 */
class CheckBoxFormFieldRendererTest extends TestCase
{
    use SnapshotAssertTrait;


    public function testRenderingCheckBox(): void
    {
        $form = new Form();
        $checkbox = $form->addCheckbox('checkBox');

        $renderer = new CheckBoxFormFieldRenderer();
        $checkBoxComponent = $renderer->render($checkbox);

        $this->assertSnapshot(__DIR__ . '/__snapshots__/checkbox.html', $checkBoxComponent);
    }
}
