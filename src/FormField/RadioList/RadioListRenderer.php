<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\RadioList;

use BrandEmbassy\Components\Controls\Radio\Radio;
use BrandEmbassy\Components\NetteForm\FormField;
use BrandEmbassy\Components\NetteForm\FormField\FieldRenderer;
use BrandEmbassy\Components\NetteForm\OptionField;
use BrandEmbassy\Components\UiComponent;
use BrandEmbassy\Components\UiFragment;
use Nette\ComponentModel\IComponent;
use Nette\Forms\Controls\RadioList;
use function assert;
use function sprintf;

/**
 * @final
 */
class RadioListRenderer implements FieldRenderer
{
    public function render(IComponent $control): UiComponent
    {
        assert($control instanceof RadioList);

        $radios = $this->renderPlainRadios($control);

        $fieldDescription = $control->getOption(OptionField::DESCRIPTION) ?? '';

        return new FormField(new UiFragment($radios), (string)$control->caption, $fieldDescription);
    }


    /**
     * @return Radio[]
     */
    public function renderPlainRadios(RadioList $control): array
    {
        $radios = [];
        foreach ($control->getItems() as $value => $label) {
            $isChecked = $value === $control->getValue();
            $id = sprintf('%s_%s', $control->getHtmlName(), $value);
            $radios[] = new Radio($label, $id, $control->getHtmlName(), $value, $isChecked, $control->isDisabled());
        }

        return $radios;
    }


    public function getRenderedInputClassName(): string
    {
        return RadioList::class;
    }
}
