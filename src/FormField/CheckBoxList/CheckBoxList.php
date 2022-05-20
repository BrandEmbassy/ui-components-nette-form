<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\CheckBoxList;

use BrandEmbassy\Components\Controls\Checkbox\Checkbox;
use BrandEmbassy\Components\DataAttributes;
use BrandEmbassy\Components\SelectList\SelectList;
use BrandEmbassy\Components\SelectList\SelectListItem;
use BrandEmbassy\Components\UiComponent;
use function array_map;

/**
 * @final
 */
class CheckBoxList implements UiComponent
{
    /**
     * @var CheckBoxListItem[]
     */
    private array $rowsData;

    private string $name;

    private ?DataAttributes $dataAttributes;


    /**
     * @param CheckBoxListItem[] $itemsData
     */
    public function __construct(string $name, array $itemsData, ?DataAttributes $dataAttributes = null)
    {
        $this->name = $name;
        $this->rowsData = $itemsData;
        $this->dataAttributes = $dataAttributes;
    }


    public function render(): string
    {
        $rows = array_map(
            function (CheckBoxListItem $rowData): SelectListItem {
                /** @var UiComponent[] $children */
                $children = [];

                $avatar = $rowData->getAvatar();
                if ($avatar !== null) {
                    $children[] = $rowData->getAvatar() ?? '';
                }

                $checkbox = new Checkbox(
                    $children,
                    $rowData->getLabelText(),
                    $this->name . '-' . $rowData->getId(),
                    $this->name,
                    $rowData->getId(),
                    $rowData->isSelected(),
                );

                return new SelectListItem([$checkbox]);
            },
            $this->rowsData,
        );

        return (new SelectList($rows, $this->dataAttributes))->render();
    }
}
