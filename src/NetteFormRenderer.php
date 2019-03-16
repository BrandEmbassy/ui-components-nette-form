<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm;

use BrandEmbassy\Components\NetteForm\FormField\FieldRenderer;
use BrandEmbassy\Components\Notification\NotificationMessage;
use BrandEmbassy\Components\Notification\NotificationType;
use BrandEmbassy\Components\UiComponent;
use LogicException;
use Nette\ComponentModel\IComponent;
use Nette\Forms\Form;
use function count;
use function get_class;
use function sprintf;

final class NetteFormRenderer
{
    /**
     * @var FieldRenderer[]
     */
    private $renderers;


    /**
     * @param FieldRenderer[] $renderers
     */
    public function __construct(array $renderers)
    {
        $this->renderers = [];
        foreach ($renderers as $renderer) {
            $this->renderers[$renderer->getRenderedInputClassName()] = $renderer;
        }
    }


    public function render(Form $form): UiComponent
    {
        $elements = [];

        foreach ($form->getComponents() as $component) {
            /** @var IComponent $component */
            $className = get_class($component);
            $renderer = $this->renderers[$className] ?? null;
            if ($renderer === null) {
                throw new LogicException(sprintf('Unsupported Form Element: %s', $className));
            }

            $elements[] = $renderer->render($component);
        }

        $errorComponents = [];
        if (count($form->getErrors()) > 0) {
            $errorComponents[] = new FormNotificationComponent(
                'There is an error in your submission. Please correct the highlighted fields below.',
                NotificationType::byValue(NotificationType::ERROR),
                NotificationMessage::FIXED
            );
        }

        return new NetteFormComponent($form, $elements, $errorComponents);
    }
}
