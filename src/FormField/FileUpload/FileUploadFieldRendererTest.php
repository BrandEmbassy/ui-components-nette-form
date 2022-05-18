<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\FileUpload;

use BrandEmbassy\Components\SnapshotAssertTrait;
use Nette\Forms\Form;
use PHPUnit\Framework\TestCase;

/**
 * @final
 */
class FileUploadFieldRendererTest extends TestCase
{
    use SnapshotAssertTrait;


    public function testRender(): void
    {
        $form = new Form();
        $upload = $form->addUpload('upload');

        $renderer = new FileUploadFieldRenderer();
        $component = $renderer->render($upload);

        $this->assertSnapshot(__DIR__ . '/__snapshots__/fileUpload.html', $component);
    }
}
