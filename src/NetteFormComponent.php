<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm;

use BrandEmbassy\Components\ArrayRenderer;
use BrandEmbassy\Components\UiComponent;
use Nette\Forms\Form;
use Nette\Forms\Rendering\DefaultFormRenderer;
use function assert;

final class NetteFormComponent implements UiComponent
{
    /**
     * @var Form
     */
    private $form;

    /**
     * @var UiComponent[]
     */
    private $elements;

    /**
     * @var UiComponent[]
     */
    private $errorComponents;


    /**
     * @param Form          $form
     * @param UiComponent[] $elements
     * @param UiComponent[] $errorComponents
     */
    public function __construct(Form $form, array $elements, array $errorComponents)
    {
        $this->form = $form;
        $this->elements = $elements;
        $this->errorComponents = $errorComponents;
    }


    public function render(): string
    {
        $baseRenderer = $this->form->getRenderer();
        assert($baseRenderer instanceof DefaultFormRenderer);

        return $baseRenderer->render($this->form, 'begin')
            . ArrayRenderer::render($this->errorComponents)
            . ArrayRenderer::render($this->elements)
            . $baseRenderer->render($this->form, 'end');
    }
}
