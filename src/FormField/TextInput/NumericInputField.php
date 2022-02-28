<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\TextInput;

use BrandEmbassy\Components\NetteForm\OptionField;
use BrandEmbassy\Components\Typography\Paragraph;
use Nette\Forms\Controls\TextInput;
use Nette\Forms\Form;

/**
 * @final
 */
class NumericInputField extends TextInput
{
    private const TYPE_NUMBER = 'number';
    private const VALUE_MIN = 'min';
    private const VALUE_MAX = 'max';


    public function __construct(
        string $label,
        int $minimumValue,
        int $maximumValue,
        ?int $defaultValue = null,
        ?string $description = null,
        ?string $inputDescription = null,
        ?string $minimumValueErrorMessage = 'Specified value has to be greater or equal to %s',
        ?string $maximumValueErrorMessage = 'Specified value has to be lower or equal to %s'
    ) {
        parent::__construct($label);

        $this->setHtmlType(self::TYPE_NUMBER)
            ->setHtmlAttribute(self::VALUE_MIN, $minimumValue)
            ->setHtmlAttribute(self::VALUE_MAX, $maximumValue);

        $this->addCondition(Form::FILLED)
            ->addRule(Form::INTEGER, $inputDescription)
            ->addRule(Form::MIN, $minimumValueErrorMessage, $minimumValue)
            ->addRule(Form::MAX, $maximumValueErrorMessage, $maximumValue);

        if ($defaultValue !== null) {
            $this->setDefaultValue($defaultValue);
        }

        if ($description !== null) {
            $paragraphDescription = new Paragraph($description);
            $this->setOption(OptionField::DESCRIPTION, $paragraphDescription);
        }

        if ($inputDescription !== null) {
            $this->setOption(OptionField::INPUT_DESCRIPTION, $inputDescription);
        }
    }
}
