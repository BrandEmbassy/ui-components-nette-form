<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\SelectBox;

use BrandEmbassy\Components\SnapshotAssertTrait;
use Nette\Forms\Form;
use PHPUnit\Framework\TestCase;

/**
 * @final
 */
class SelectBoxFieldRendererTest extends TestCase
{
    use SnapshotAssertTrait;


    public function testRender(): void
    {
        $form = new Form();
        $select = $form->addSelect('name', 'label', [
            'key-1' => 'item-1',
            'key-2' => 'item-2',
        ]);

        $renderer = new SelectBoxFieldRenderer();
        $component = $renderer->render($select);

        $this->assertSnapshot(__DIR__ . '/__snapshots__/selectBox.html', $component);
    }
}
