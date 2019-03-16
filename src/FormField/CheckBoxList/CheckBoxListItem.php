<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\CheckBoxList;

use BrandEmbassy\Components\UiComponent;

final class CheckBoxListItem
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $labelText;

    /**
     * @var UiComponent|null
     */
    private $avatar;

    /**
     * @var bool
     */
    private $selected;


    public function __construct(string $id, string $labelText, bool $selected = false, ?UiComponent $avatar = null)
    {
        $this->id = $id;
        $this->labelText = $labelText;
        $this->avatar = $avatar;
        $this->selected = $selected;
    }


    public function getId(): string
    {
        return $this->id;
    }


    public function getLabelText(): string
    {
        return $this->labelText;
    }


    public function getAvatar(): ?UiComponent
    {
        return $this->avatar;
    }


    public function hasPicture(): bool
    {
        return $this->avatar !== null;
    }


    public function isSelected(): bool
    {
        return $this->selected;
    }


    public function asSelected(): self
    {
        return new self($this->id, $this->labelText, true, $this->avatar);
    }
}
