<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\FileUpload;

use BrandEmbassy\Components\Controls\FileUpload\FileUpload;
use BrandEmbassy\Components\NetteForm\FormField\FieldRenderer;
use BrandEmbassy\Components\NetteForm\OptionField;
use BrandEmbassy\Components\UiComponent;
use Nette\ComponentModel\IComponent;
use Nette\Forms\Controls\UploadControl;
use function assert;

final class FileUploadFieldRenderer implements FieldRenderer
{
    public function render(IComponent $control, string $accept = '', bool $isMultiple = false): UiComponent
    {
        assert($control instanceof UploadControl);

        $value = $control->getValue() ?? '';
        $placeholder = $control->getOption(OptionField::PLACEHOLDER) ?? '';
        $hasError = $control->getError() !== null;

        return new FileUpload(
            $control->getHtmlId(),
            $control->getHtmlName(),
            $value,
            $placeholder,
            $accept,
            $isMultiple,
            $hasError
        );
    }


    public function getRenderedInputClassName(): string
    {
        return UploadControl::class;
    }
}