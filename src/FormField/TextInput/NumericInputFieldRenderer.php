<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\TextInput;

use BrandEmbassy\Components\Controls\Input\InputSize;
use BrandEmbassy\Components\Controls\Input\InputType;
use BrandEmbassy\Components\Grid\GridColumn\GridColumnOption;
use BrandEmbassy\Components\NetteForm\FormField\FieldRenderer;
use BrandEmbassy\Components\UiComponent;
use Nette\ComponentModel\IComponent;
use Nette\Forms\Controls\TextInput;
use function assert;

final class NumericInputFieldRenderer implements FieldRenderer
{
    /**
     * @var InputFieldRenderer
     */
    private $inputFieldRenderer;


    public function __construct(InputFieldRenderer $inputFieldRenderer)
    {
        $this->inputFieldRenderer = $inputFieldRenderer;
    }


    public function render(IComponent $control): UiComponent
    {
        assert($control instanceof NumericInputField);

        $gridColumnOptions = [
            GridColumnOption::byValue(GridColumnOption::XS_12),
            GridColumnOption::byValue(GridColumnOption::MD_4),
            GridColumnOption::byValue(GridColumnOption::LG_2),
        ];

        return $this->inputFieldRenderer->render($control, InputType::get(InputType::NUMBER), $gridColumnOptions);
    }


    public function renderPlainInput(TextInput $textInput): UiComponent
    {
        $type = InputType::get(InputType::NUMBER);
        $size = InputSize::get(InputSize::AUTOMATIC);

        return $this->inputFieldRenderer->renderPlainInput($textInput, $type, $size);
    }


    public function getRenderedInputClassName(): string
    {
        return NumericInputField::class;
    }
}
