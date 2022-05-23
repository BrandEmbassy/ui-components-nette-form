<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\SelectBox;

use BrandEmbassy\MockeryTools\Snapshot\SnapshotAssertions;
use Nette\Forms\Form;
use PHPUnit\Framework\TestCase;

/**
 * @final
 */
class SelectBoxFieldRendererTest extends TestCase
{
    public function testRender(): void
    {
        $form = new Form();
        $select = $form->addSelect('name', 'label', [
            'key-1' => 'item-1',
            'key-2' => 'item-2',
        ]);

        $renderer = new SelectBoxFieldRenderer();
        $component = $renderer->render($select);

        SnapshotAssertions::assertSnapshotAndReplace(
            __DIR__ . '/__snapshots__/selectBox.html',
            $component->render(),
            ['dataAttribute' => 'data-cy=\'Selectbox-name\''],
        );
    }


    public function testRenderWithCustomDataAttribute(): void
    {
        $form = new Form();
        $select = $form->addSelect('name', 'label', [
            'key-1' => 'item-1',
            'key-2' => 'item-2',
        ]);
        $select->setHtmlAttribute('data-attr', 'value');

        $renderer = new SelectBoxFieldRenderer();
        $component = $renderer->render($select);

        SnapshotAssertions::assertSnapshotAndReplace(
            __DIR__ . '/__snapshots__/selectBox.html',
            $component->render(),
            ['dataAttribute' => 'data-attr=\'value\''],
        );
    }
}
