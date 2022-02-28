<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\Hidden;

use BrandEmbassy\Components\Controls\Hidden\Hidden;
use BrandEmbassy\Components\NetteForm\FormField\FieldRenderer;
use BrandEmbassy\Components\UiComponent;
use Nette\ComponentModel\IComponent;
use Nette\Forms\Controls\HiddenField;
use function assert;

/**
 * @final
 */
class HiddenInputFieldRenderer implements FieldRenderer
{
    public function render(IComponent $control): UiComponent
    {
        assert($control instanceof HiddenField);

        return new Hidden($control->getHtmlName(), (string)$control->getValue());
    }


    public function getRenderedInputClassName(): string
    {
        return HiddenField::class;
    }
}
