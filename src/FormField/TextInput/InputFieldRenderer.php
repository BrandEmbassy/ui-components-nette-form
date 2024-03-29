<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\TextInput;

use BrandEmbassy\Components\Controls\Input\Input;
use BrandEmbassy\Components\Controls\Input\InputSize;
use BrandEmbassy\Components\Controls\Input\InputType;
use BrandEmbassy\Components\Grid\GridColumn\GridColumn;
use BrandEmbassy\Components\Grid\GridColumn\GridColumnOption;
use BrandEmbassy\Components\Grid\GridRow;
use BrandEmbassy\Components\NetteForm\FormField;
use BrandEmbassy\Components\NetteForm\NetteHtmlDataAttributesProvider;
use BrandEmbassy\Components\NetteForm\OptionField;
use BrandEmbassy\Components\UiComponent;
use BrandEmbassy\Components\Utilities\UtilitiesOption;
use Nette\Forms\Controls\TextInput;

/**
 * @final
 */
class InputFieldRenderer
{
    /**
     * @param GridColumnOption[] $gridColumnOptions
     */
    public function render(TextInput $textInput, InputType $type, array $gridColumnOptions): UiComponent
    {
        $inputComponent = $this->renderPlainInput($textInput, $type, InputSize::get(InputSize::AUTOMATIC));

        $fieldDescription = $textInput->getOption(OptionField::DESCRIPTION) ?? '';

        $column = new GridColumn(
            $inputComponent,
            $gridColumnOptions,
            [UtilitiesOption::get(UtilitiesOption::PADDING_0)],
        );

        return new FormField(
            new GridRow($column),
            (string)$textInput->caption,
            $fieldDescription,
        );
    }


    public function renderPlainInput(
        TextInput $textInput,
        InputType $type,
        InputSize $inputSize
    ): UiComponent {
        $hasError = $textInput->getError() !== null;
        $placeholder = $textInput->getOption(OptionField::PLACEHOLDER) ?? '';

        $readOnly = $textInput->getOption(OptionField::READONLY, false);
        $attributesProvider = new NetteHtmlDataAttributesProvider();

        return new Input(
            $textInput->getHtmlName(),
            (string)$textInput->getValue(),
            $type,
            $this->getInputDescription($textInput),
            $hasError,
            $inputSize,
            (string)$placeholder,
            $textInput->isDisabled(),
            $readOnly,
            $attributesProvider->findDataAttributes($textInput),
        );
    }


    /**
     * @return string|UiComponent
     */
    private function getInputDescription(TextInput $textInput)
    {
        $inputDescription = $textInput->getOption(OptionField::INPUT_DESCRIPTION) ?? '';
        $error = $textInput->getError();

        return $error ?? $inputDescription;
    }
}
