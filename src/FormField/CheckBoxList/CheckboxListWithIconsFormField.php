<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\CheckBoxList;

use BrandEmbassy\Components\UiComponent;
use Nette\Forms\Controls\CheckboxList;

final class CheckboxListWithIconsFormField extends CheckboxList
{
    /**
     * @var CheckBoxListItem[]
     */
    private $checkBoxListRowData;

    /**
     * @var UiComponent|string
     */
    private $formFieldDescription;


    /**
     * @param string             $label
     * @param CheckBoxListItem[] $checkBoxListRowData
     * @param UiComponent|string $formFieldDescription
     */
    public function __construct(string $label, array $checkBoxListRowData, $formFieldDescription = '')
    {
        $items = [];
        foreach ($checkBoxListRowData as $checkBoxListRow) {
            $items[$checkBoxListRow->getId()] = $checkBoxListRow->getLabelText();
        }

        parent::__construct($label, $items);

        $this->checkBoxListRowData = $checkBoxListRowData;
        $this->formFieldDescription = $formFieldDescription;
    }


    /**
     * @return CheckBoxListItem[]
     */
    public function getCheckBoxListRowData(): array
    {
        return $this->checkBoxListRowData;
    }


    /**
     * @return UiComponent|string
     */
    public function getFormFieldDescription()
    {
        return $this->formFieldDescription;
    }
}
