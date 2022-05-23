<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\Hidden;

use BrandEmbassy\MockeryTools\Snapshot\SnapshotAssertions;
use Nette\Forms\Form;
use PHPUnit\Framework\TestCase;

/**
 * @final
 */
class HiddenInputFieldRendererTest extends TestCase
{
    public function testRender(): void
    {
        $form = new Form();
        $hidden = $form->addHidden('name', 'value');

        $renderer = new HiddenInputFieldRenderer();
        $component = $renderer->render($hidden);

        SnapshotAssertions::assertSnapshotAndReplace(
            __DIR__ . '/__snapshots__/hiddenInput.html',
            $component->render(),
            ['dataAttribute' => 'data-cy=\'Hidden-name\''],
        );
    }


    public function testRenderWithCustomDataAttribute(): void
    {
        $form = new Form();
        $hidden = $form->addHidden('name', 'value');
        $hidden->setHtmlAttribute('data-attr', 'value');

        $renderer = new HiddenInputFieldRenderer();
        $component = $renderer->render($hidden);

        SnapshotAssertions::assertSnapshotAndReplace(
            __DIR__ . '/__snapshots__/hiddenInput.html',
            $component->render(),
            ['dataAttribute' => 'data-attr=\'value\''],
        );
    }
}
