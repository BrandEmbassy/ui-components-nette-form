<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\UiComponent;

use BrandEmbassy\Components\Grid\GridColumn\GridColumn;
use BrandEmbassy\Components\Grid\GridColumn\GridColumnOption;
use BrandEmbassy\Components\Grid\GridRow;
use BrandEmbassy\Components\NetteForm\FormField\FieldRenderer;
use BrandEmbassy\Components\UiComponent;
use BrandEmbassy\Components\Utilities\UtilitiesOption;
use Nette\ComponentModel\IComponent;
use function assert;

final class UiComponentsRenderer implements FieldRenderer
{
    public function render(IComponent $control): UiComponent
    {
        assert($control instanceof UiComponentsFormContainer);

        $wrappedUiComponents = [];
        foreach ($control->getUiComponents() as $uiComponent) {
            $wrappedUiComponents[] = new GridRow(
                new GridColumn($uiComponent, [], [UtilitiesOption::get(UtilitiesOption::PADDING_0)])
            );
        }

        return new GridRow(
            new GridColumn(
                $wrappedUiComponents,
                [GridColumnOption::get(GridColumnOption::XS_12)],
                [UtilitiesOption::get(UtilitiesOption::PADDING_0)]
            ),
            [],
            [UtilitiesOption::get(UtilitiesOption::PADDING_10)]
        );
    }


    public function getRenderedInputClassName(): string
    {
        return UiComponentsFormContainer::class;
    }
}
