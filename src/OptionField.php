<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm;

use Nette\StaticClass;

/**
 * @final
 */
class OptionField
{
    use StaticClass;

    public const DESCRIPTION = 'description';
    public const INPUT_DESCRIPTION = 'inputDescription';
    public const PLACEHOLDER = 'placeholder';
    public const READONLY = 'readonly';
}
