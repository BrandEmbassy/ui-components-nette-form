<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm;

use BrandEmbassy\Components\UiComponent;
use Nette\Forms\Form;

interface FormRenderer
{
    public function render(Form $form): UiComponent;
}
