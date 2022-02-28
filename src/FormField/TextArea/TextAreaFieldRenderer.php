<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\TextArea;

use BrandEmbassy\Components\Controls\Textarea\Textarea as TextareaComponent;
use BrandEmbassy\Components\Grid\GridColumn\GridColumn;
use BrandEmbassy\Components\Grid\GridColumn\GridColumnOption;
use BrandEmbassy\Components\Grid\GridRow;
use BrandEmbassy\Components\NetteForm\FormField;
use BrandEmbassy\Components\NetteForm\FormField\FieldRenderer;
use BrandEmbassy\Components\NetteForm\NetteHtmlDataAttributesProvider;
use BrandEmbassy\Components\NetteForm\OptionField;
use BrandEmbassy\Components\UiComponent;
use BrandEmbassy\Components\Utilities\UtilitiesOption;
use Nette\ComponentModel\IComponent;
use Nette\Forms\Controls\TextArea;
use function assert;
use function is_numeric;

/**
 * @final
 */
class TextAreaFieldRenderer implements FieldRenderer
{
    public function render(IComponent $control): UiComponent
    {
        assert($control instanceof TextArea);
        $inputComponent = $this->renderPlainTextArea($control);
        $fieldDescription = $control->getOption(OptionField::DESCRIPTION) ?? '';

        $gridColumnOptions = [
            GridColumnOption::byValue(GridColumnOption::XS_12),
        ];

        $column = new GridColumn(
            $inputComponent,
            $gridColumnOptions,
            [UtilitiesOption::get(UtilitiesOption::PADDING_0)]
        );

        return new FormField(new GridRow($column), (string)$control->caption, $fieldDescription);
    }


    public function renderPlainTextArea(TextArea $textArea): UiComponent
    {
        $prototype = $textArea->getControlPrototype();
        $rowsAttribute = $prototype->getAttribute('rows');
        $placeholder = $textArea->getOption(OptionField::PLACEHOLDER, '');
        assert(is_numeric($rowsAttribute), 'Rows attribute must be an integer.');
        $hasError = $textArea->getError() !== null;
        if ($hasError) {
            $fieldDescription = $textArea->getError();
        } else {
            $fieldDescription = $textArea->getOption(OptionField::INPUT_DESCRIPTION, '');
        }

        $attributesProvider = new NetteHtmlDataAttributesProvider($prototype);

        return new TextareaComponent(
            $textArea->getHtmlName(),
            $textArea->getValue() ?? '',
            (int)$rowsAttribute,
            $textArea->isDisabled(),
            $fieldDescription,
            $hasError,
            $placeholder,
            $attributesProvider->findDataAttributes()
        );
    }


    public function getRenderedInputClassName(): string
    {
        return TextArea::class;
    }
}
