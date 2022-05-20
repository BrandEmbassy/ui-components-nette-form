<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\Submit;

use BrandEmbassy\MockeryTools\Snapshot\SnapshotAssertions;
use Nette\Forms\Form;
use PHPUnit\Framework\TestCase;

/**
 * @final
 */
class SubmitFieldRendererTest extends TestCase
{
    public function testRender(): void
    {
        $form = new Form();
        $submit = $form->addSubmit('name', 'caption');

        $renderer = new SubmitFieldRenderer();
        $component = $renderer->render($submit);

        SnapshotAssertions::assertSnapshotAndReplace(
            __DIR__ . '/__snapshots__/submit.html',
            $component->render(),
            ['dataAttribute' => 'data-cy=\'Button\''],
        );
    }


    public function testRenderWithDataAttribute(): void
    {
        $form = new Form();
        $submit = $form->addSubmit('name', 'caption');
        $submit->setHtmlAttribute('data-attr', 'value');

        $renderer = new SubmitFieldRenderer();
        $component = $renderer->render($submit);

        SnapshotAssertions::assertSnapshotAndReplace(
            __DIR__ . '/__snapshots__/submit.html',
            $component->render(),
            ['dataAttribute' => 'data-attr=\'value\''],
        );
    }
}
