<?php declare(strict_types = 1);

namespace BrandEmbassy\Components\NetteForm\FormField\SelectBox;

final class SelectBoxOptionDataRow
{
    /**
     * @var string
     */
    private $key;

    /**
     * @var string
     */
    private $value;


    public function __construct(string $key, string $value)
    {
        $this->key = $key;
        $this->value = $value;
    }


    public function getKey(): string
    {
        return $this->key;
    }


    public function getValue(): string
    {
        return $this->value;
    }
}
