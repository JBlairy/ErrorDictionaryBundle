<?php

namespace ReusableCog\ErrorDictionaryBundle\Model;

final class Element
{
    public function __construct(
        public readonly string $code,
        public readonly string $description,
        public readonly string $label,
        public readonly string $statusCode,
        public readonly string $exception,
    ) {}
}
