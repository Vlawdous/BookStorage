<?php

namespace App\Model\ValuesAccessor\VO\Book;

use App\Model\ValuesAccessor\VO\Book\Exception\UndefinedCoverTypeException;

class CoverType
{
    private string $coverType;

    private const TYPES = [
        'hard',
        'soft'
    ];

    public function __construct(string $type)
    {
        $this->setCoverType($type);
    }

    private function setCoverType(string $type): void
    {
        if (in_array($type, self::TYPES)) {
            $this->coverType = $type;
        }

        throw new UndefinedCoverTypeException($type);
    }

    /**
     * @return string
     */
    public function getCoverType(): string
    {
        return $this->coverType;
    }
}