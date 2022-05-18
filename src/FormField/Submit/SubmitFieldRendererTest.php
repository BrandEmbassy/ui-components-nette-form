<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\Submit;

use BrandEmbassy\Components\SnapshotAssertTrait;
use Nette\Forms\Form;
use PHPUnit\Framework\TestCase;

/**
 * @final
 */
class SubmitFieldRendererTest extends TestCase
{
    use SnapshotAssertTrait;


    public function testRender(): void
    {
        $form = new Form();
        $submit = $form->addSubmit('name', 'caption');

        $renderer = new SubmitFieldRenderer();
        $component = $renderer->render($submit);

        $this->assertSnapshot(__DIR__ . '/__snapshots__/submit.html', $component);
    }
}
