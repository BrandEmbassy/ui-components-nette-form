<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField;

use BrandEmbassy\Components\UiComponent;
use Nette\ComponentModel\IComponent;

interface FieldRenderer
{
    public function render(IComponent $control): UiComponent;


    public function getRenderedInputClassName(): string;
}
