<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\TextInput;

use Nette\Forms\Controls\TextInput;
use Nette\Forms\Form;

/**
 * @final
 */
class TimeInputField extends TextInput
{
    public function __construct(?string $label = null, ?int $maxLength = null)
    {
        parent::__construct($label, $maxLength);

        $this->addCondition(Form::FILLED)
            ->addRule(
                Form::PATTERN,
                'Specified value is not valid time. Expected format is hh:mm.',
                '\d{1,2}:\d{1,2}'
            );
    }
}
