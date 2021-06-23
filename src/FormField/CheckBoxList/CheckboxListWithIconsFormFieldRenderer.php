<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\CheckBoxList;

use BrandEmbassy\Components\NetteForm\FormField;
use BrandEmbassy\Components\NetteForm\FormField\FieldRenderer;
use BrandEmbassy\Components\UiComponent;
use Nette\ComponentModel\IComponent;
use function assert;
use function in_array;

final class CheckboxListWithIconsFormFieldRenderer implements FieldRenderer
{
    public function render(IComponent $control): UiComponent
    {
        assert($control instanceof CheckboxListWithIconsFormField);

        $checkbox = $this->renderPlainCheckBoxList($control);

        return new FormField($checkbox, (string)$control->caption, $control->getFormFieldDescription());
    }


    public function renderPlainCheckBoxList(CheckboxListWithIconsFormField $control): UiComponent
    {
        return new CheckBoxList($control->getHtmlName(), $this->createRowDataFromDefaultValues($control));
    }


    /**
     * @return CheckBoxListItem[]
     */
    private function createRowDataFromDefaultValues(CheckboxListWithIconsFormField $control): array
    {
        $data = $control->getCheckBoxListRowData();

        $finalValue = $control->getValue();
        if ($finalValue === []) {
            return $data;
        }

        foreach ($finalValue as $key => $value) {
            $finalValue[$key] = (string)$value;
        }

        $result = [];
        foreach ($data as $rowData) {
            $result[] = in_array($rowData->getId(), $finalValue, true) ? $rowData->asSelected() : $rowData;
        }

        return $result;
    }


    public function getRenderedInputClassName(): string
    {
        return CheckboxListWithIconsFormField::class;
    }
}
