<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm;

use BrandEmbassy\Components\Notification\NotificationMessage;
use BrandEmbassy\Components\Notification\NotificationType;
use BrandEmbassy\Components\UiComponent;

/**
 * @final
 */
class FormNotificationComponent implements UiComponent
{
    private string $message;

    private NotificationType $type;

    private bool $fixed;


    public function __construct(string $message, NotificationType $type, bool $fixed)
    {
        $this->message = $message;
        $this->type = $type;
        $this->fixed = $fixed;
    }


    public function render(): string
    {
        return (new FormField(new NotificationMessage($this->message, $this->type, $this->fixed)))->render();
    }
}
