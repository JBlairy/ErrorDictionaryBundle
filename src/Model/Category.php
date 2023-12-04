<?php

namespace ReusableCog\ErrorDictionaryBundle\Model;

use ArrayObject;

final class Category
{
    /** @var ArrayObject<int, Element> */
    private ArrayObject $elements;

    public function __construct(public readonly string $name)
    {
        $this->elements = new ArrayObject();
    }

    public function addElement(Element $element): self
    {
        $this->elements->append($element);

        return $this;
    }

    /**
     * @return ArrayObject<int, Element>
     */
    public function getElements(): ArrayObject
    {
        return $this->elements;
    }
}
