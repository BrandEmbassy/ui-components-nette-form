<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\Hidden;

use BrandEmbassy\Components\SnapshotAssertTrait;
use Nette\Forms\Form;
use PHPUnit\Framework\TestCase;

/**
 * @final
 */
class HiddenInputFieldRendererTest extends TestCase
{
    use SnapshotAssertTrait;


    public function testRender(): void
    {
        $form = new Form();
        $hidden = $form->addHidden('name', 'value');

        $renderer = new HiddenInputFieldRenderer();
        $component = $renderer->render($hidden);

        $this->assertSnapshot(__DIR__ . '/__snapshots__/hiddenInput.html', $component);
    }
}
