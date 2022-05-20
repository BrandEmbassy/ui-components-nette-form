<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\SelectBox;

use BrandEmbassy\Components\Controls\Selectbox\Selectbox;
use BrandEmbassy\Components\Controls\Selectbox\SelectboxOption;
use BrandEmbassy\Components\Controls\Selectbox\SelectboxType;
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
use Nette\Forms\Controls\SelectBox as NetteSelectBox;
use function assert;

/**
 * @final
 */
class SelectBoxFieldRenderer implements FieldRenderer
{
    public function render(IComponent $control): UiComponent
    {
        assert($control instanceof NetteSelectBox);

        $selectBoxComponent = $this->renderPlainSelectBox($control);

        $fieldDescription = $control->getOption(OptionField::DESCRIPTION) ?? '';

        $columnOptions = [
            GridColumnOption::byValue(GridColumnOption::XS_12),
            GridColumnOption::byValue(GridColumnOption::MD_4),
            GridColumnOption::byValue(GridColumnOption::LG_2),
        ];

        $gridRow = new GridRow(
            new GridColumn($selectBoxComponent, $columnOptions, [UtilitiesOption::get(UtilitiesOption::PADDING_0)]),
        );

        return new FormField($gridRow, (string)$control->caption, $fieldDescription);
    }


    public function renderPlainSelectBox(NetteSelectBox $selectBox): UiComponent
    {
        $options = $this->createOptions($selectBox);
        $inputDescription = $selectBox->getOption(OptionField::INPUT_DESCRIPTION) ?? '';

        $error = $selectBox->getError();
        $isError = $error !== null;
        $description = $isError ? $error : $inputDescription;

        $type = SelectboxType::byValue(SelectboxType::WIDE);
        $attributesProvider = new NetteHtmlDataAttributesProvider();

        return new Selectbox(
            $options,
            $selectBox->getHtmlName(),
            $type,
            $description,
            $isError,
            $selectBox->isDisabled(),
            null,
            null,
            $attributesProvider->findDataAttributes($selectBox),
        );
    }


    public function getRenderedInputClassName(): string
    {
        return NetteSelectBox::class;
    }


    /**
     * @return SelectboxOption[]
     */
    public function createOptions(NetteSelectBox $selectBox): array
    {
        $options = [];

        if ((string)$selectBox->getPrompt() !== '') {
            $options[] = new SelectboxOption('', (string)$selectBox->getPrompt(), false);
        }

        foreach ($selectBox->getItems() as $optionKey => $optionValue) {
            $isSelected = (string)$optionKey === (string)$selectBox->getValue();
            $options[] = new SelectboxOption((string)$optionKey, (string)$optionValue, $isSelected);
        }

        return $options;
    }
}
