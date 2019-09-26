<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\CheckBox;

use BrandEmbassy\Components\Controls\Checkbox\Checkbox as CheckboxUiComponent;
use BrandEmbassy\Components\NetteForm\FormField\FieldRenderer;
use BrandEmbassy\Components\UiComponent;
use Nette\ComponentModel\IComponent;
use Nette\Forms\Controls\Checkbox;
use function assert;

final class CheckBoxFormFieldRenderer implements FieldRenderer
{
    public function render(IComponent $control): UiComponent
    {
        assert($control instanceof Checkbox);

        return new CheckboxUiComponent(
            [],
            (string)$control->getCaption(),
            $control->getHtmlId(),
            $control->getHtmlName(),
            $control->getHtmlName(),
            $control->getValue(),
            $control->isDisabled()
        );
    }


    public function getRenderedInputClassName(): string
    {
        return Checkbox::class;
    }
}
