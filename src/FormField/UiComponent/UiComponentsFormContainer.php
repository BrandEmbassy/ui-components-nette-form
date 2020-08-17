<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\UiComponent;

use Assert\Assertion;
use BrandEmbassy\Components\UiComponent;
use Nette\Forms\Container;

final class UiComponentsFormContainer extends Container
{
    /**
     * @var UiComponent[]
     */
    private $uiComponents;


    /**
     * @param UiComponent[] $uiComponents
     */
    public function __construct(array $uiComponents)
    {
        Assertion::allIsInstanceOf($uiComponents, UiComponent::class);

        $this->uiComponents = $uiComponents;
    }


    /**
     * @return UiComponent[]
     */
    public function getUiComponents(): array
    {
        return $this->uiComponents;
    }
}
