<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\FileUpload;

use BrandEmbassy\MockeryTools\Snapshot\SnapshotAssertions;
use Nette\Forms\Form;
use PHPUnit\Framework\TestCase;

/**
 * @final
 */
class FileUploadFieldRendererTest extends TestCase
{
    public function testRender(): void
    {
        $form = new Form();
        $upload = $form->addUpload('upload');

        $renderer = new FileUploadFieldRenderer();
        $component = $renderer->render($upload);

        SnapshotAssertions::assertSnapshotAndReplace(
            __DIR__ . '/__snapshots__/fileUpload.html',
            $component->render(),
            ['dataAttribute' => 'data-cy=\'FileUpload-upload\''],
        );
    }


    public function testRenderWithCustomDataAttribute(): void
    {
        $form = new Form();
        $upload = $form->addUpload('upload');
        $upload->setHtmlAttribute('data-attr', 'value');

        $renderer = new FileUploadFieldRenderer();
        $component = $renderer->render($upload);

        SnapshotAssertions::assertSnapshotAndReplace(
            __DIR__ . '/__snapshots__/fileUpload.html',
            $component->render(),
            ['dataAttribute' => 'data-attr=\'value\''],
        );
    }
}
