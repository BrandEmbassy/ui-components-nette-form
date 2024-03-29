<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\Submit;

use BrandEmbassy\Components\Controls\Button\Button;
use BrandEmbassy\Components\NetteForm\FormField;
use BrandEmbassy\Components\NetteForm\FormField\FieldRenderer;
use BrandEmbassy\Components\NetteForm\NetteHtmlDataAttributesProvider;
use BrandEmbassy\Components\UiComponent;
use Nette\ComponentModel\IComponent;
use Nette\Forms\Controls\SubmitButton;
use function assert;

/**
 * @final
 */
class SubmitFieldRenderer implements FieldRenderer
{
    public function render(IComponent $control): UiComponent
    {
        assert($control instanceof SubmitButton);
        $button = $this->renderPlainSubmit($control);

        return new FormField($button);
    }


    public function renderPlainSubmit(SubmitButton $control): UiComponent
    {
        $attributesProvider = new NetteHtmlDataAttributesProvider();

        return new Button(
            (string)$control->caption,
            null,
            null,
            null,
            $control->isDisabled(),
            null,
            $attributesProvider->findDataAttributes($control),
        );
    }


    public function getRenderedInputClassName(): string
    {
        return SubmitButton::class;
    }
}
