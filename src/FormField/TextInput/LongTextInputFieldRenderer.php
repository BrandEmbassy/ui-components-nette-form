<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\TextInput;

use BrandEmbassy\Components\Controls\Input\InputType;
use BrandEmbassy\Components\Grid\GridColumn\GridColumnOption;
use BrandEmbassy\Components\NetteForm\FormField\FieldRenderer;
use BrandEmbassy\Components\UiComponent;
use Nette\ComponentModel\IComponent;
use Nette\Forms\Controls\TextInput;
use function assert;

/**
 * @final
 */
class LongTextInputFieldRenderer implements FieldRenderer
{
    private InputFieldRenderer $inputFieldRenderer;


    public function __construct(InputFieldRenderer $inputFieldRenderer)
    {
        $this->inputFieldRenderer = $inputFieldRenderer;
    }


    public function render(IComponent $control): UiComponent
    {
        assert($control instanceof TextInput);

        $gridColumnOptions = [GridColumnOption::byValue(GridColumnOption::XS_12)];

        return $this->inputFieldRenderer->render($control, InputType::get(InputType::TEXT), $gridColumnOptions);
    }


    public function getRenderedInputClassName(): string
    {
        return LongTextInputField::class;
    }
}
