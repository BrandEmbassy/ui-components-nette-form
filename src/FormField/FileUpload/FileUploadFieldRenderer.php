<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\FileUpload;

use BrandEmbassy\Components\Controls\FileUpload\FileUpload;
use BrandEmbassy\Components\NetteForm\FormField\FieldRenderer;
use BrandEmbassy\Components\NetteForm\NetteHtmlDataAttributesProvider;
use BrandEmbassy\Components\NetteForm\OptionField;
use BrandEmbassy\Components\UiComponent;
use Nette\ComponentModel\IComponent;
use Nette\Forms\Controls\UploadControl;
use function assert;

/**
 * @final
 */
class FileUploadFieldRenderer implements FieldRenderer
{
    public function render(IComponent $control, string $acceptAttributeValue = '', bool $isMultiple = false): UiComponent
    {
        assert($control instanceof UploadControl);

        $attributesProvider = new NetteHtmlDataAttributesProvider();

        $placeholder = $control->getOption(OptionField::PLACEHOLDER) ?? '';
        $hasError = $control->getError() !== null;

        return new FileUpload(
            $control->getHtmlId(),
            $control->getHtmlName(),
            $placeholder,
            $acceptAttributeValue,
            $isMultiple,
            $hasError,
            $attributesProvider->findDataAttributes($control),
        );
    }


    public function getRenderedInputClassName(): string
    {
        return UploadControl::class;
    }
}
