<?php

namespace ReusableCog\ErrorDictionaryBundle\Render;

use InvalidArgumentException;
use ReusableCog\ErrorDictionaryBundle\Model\Category;
use ReusableCog\ErrorDictionaryBundle\Model\Element;
use Twig\Environment;
use Twig_Environment;

final class TwigRender implements RenderInterface
{
    /** @var Environment|Twig_Environment */
    private $twig; /* @phpstan-ignore-line */

    /**
     * @param array<int, array{category: string, code: string|null, description: string, label: string, status_code: string|null, exception: string}> $errorDefinition
     */
    public function __construct(/* @phpstan-ignore-line */
        $twig,
        private readonly array $errorDefinition,
        private readonly mixed $title,
        private readonly mixed $description,
    ) {
        if (!$twig instanceof Twig_Environment && !$twig instanceof Environment) { /* @phpstan-ignore-line */
            throw new InvalidArgumentException(sprintf('Providing an instance of "%s" as twig is not supported.', $twig::class));
        }
        $this->twig = $twig;
    }

    public function render(): string
    {
        return $this->twig->render(/* @phpstan-ignore-line */
            '@ErrorDictionaryBundle/index.html.twig',
            [
                'data' => $this->serialize($this->errorDefinition),
                'title' => $this->title,
                'description' => $this->description,
            ]
        );
    }

    /**
     * @param array<int, array{category: string, code: string|null, description: string, label: string, status_code: string|null, exception: string}> $errorDefinition
     *
     * @return array<string, Category>
     */
    private function serialize(array $errorDefinition): array
    {
        $categories = [];

        foreach ($errorDefinition as $code => $definition) {
            if (!isset($categories[$definition['category']])) {
                $categories[$definition['category']] = new Category($definition['category']);
            }

            // TODO throw invalid payload

            $categories[$definition['category']]->addElement(
                new Element($definition['code'] ?? (string)$code, $definition['description'], $definition['label'], $definition['status_code'] ?? '500', $definition['exception'])
            );
        }

        return $categories;
    }
}
