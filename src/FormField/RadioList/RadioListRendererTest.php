<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\RadioList;

use BrandEmbassy\Components\SnapshotAssertTrait;
use Nette\Forms\Form;
use PHPUnit\Framework\TestCase;

/**
 * @final
 */
class RadioListRendererTest extends TestCase
{
    use SnapshotAssertTrait;


    public function testRender(): void
    {
        $form = new Form();
        $radioList = $form->addRadioList('name', 'label', [
            'key-1' => 'item-1',
            'key-2' => 'item-2',
        ]);

        $renderer = new RadioListRenderer();
        $component = $renderer->render($radioList);

        $this->assertSnapshot(__DIR__ . '/__snapshots__/radioList.html', $component);
    }
}
