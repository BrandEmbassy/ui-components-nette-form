<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm;

use BrandEmbassy\Components\Grid\GridColumn\GridColumn;
use BrandEmbassy\Components\Grid\GridColumn\GridColumnOption;
use BrandEmbassy\Components\Grid\GridRow;
use BrandEmbassy\Components\Typography\Heading;
use BrandEmbassy\Components\Typography\HeadingLevel;
use BrandEmbassy\Components\UiComponent;
use BrandEmbassy\Components\Utilities\UtilitiesOption;

final class FormField implements UiComponent
{
    /**
     * @var UiComponent
     */
    private $children;

    /**
     * @var string
     */
    private $header;

    /**
     * @var UiComponent|string
     */
    private $description;


    /**
     * @param UiComponent        $children
     * @param string             $header
     * @param UiComponent|string $description
     */
    public function __construct(UiComponent $children, string $header = '', $description = '')
    {
        $this->children = $children;
        $this->header = $header;
        $this->description = $description;
    }


    public function render(): string
    {
        $descriptionElements = [];

        if ($this->header !== '') {
            $descriptionElements[] = new Heading($this->header, [], HeadingLevel::byValue(HeadingLevel::H3));
        }

        $descriptionElements[] = $this->description;

        $row = new GridRow(
            [
                new GridColumn(
                    $descriptionElements,
                    [GridColumnOption::byValue(GridColumnOption::XS_12)],
                    [UtilitiesOption::get(UtilitiesOption::PADDING_0)]
                ),
                new GridColumn(
                    $this->children,
                    [GridColumnOption::byValue(GridColumnOption::XS_12)],
                    [UtilitiesOption::get(UtilitiesOption::PADDING_0)]
                ),
            ],
            [],
            [
                UtilitiesOption::byValue(UtilitiesOption::PADDING_10),
            ]
        );

        return $row->render();
    }
}
