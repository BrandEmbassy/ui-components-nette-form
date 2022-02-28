<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\TextArea;

use BrandEmbassy\Components\NetteForm\OptionField;
use Nette\Forms\Form;
use Nette\Utils\FileSystem;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @final
 */
class TextAreaFieldRendererTest extends TestCase
{
    public function testRenderingPlainTextArea(): void
    {
        $form = new Form();
        $netteTextArea = $form->addTextArea('textareaName');
        $netteTextArea->setHtmlAttribute('rows', 5);
        $netteTextArea->setOption(OptionField::PLACEHOLDER, 'placeholder');
        $netteTextArea->setOption(OptionField::INPUT_DESCRIPTION, 'input-description');
        $netteTextArea->setHtmlAttribute('data-attr', 'value');

        $renderer = new TextAreaFieldRenderer();
        $textarea = $renderer->renderPlainTextArea($netteTextArea);

        $expectedTextarea = FileSystem::read(__DIR__ . '/__snapshots__/textarea.html');
        Assert::assertSame($expectedTextarea, $textarea->render());
    }
}
