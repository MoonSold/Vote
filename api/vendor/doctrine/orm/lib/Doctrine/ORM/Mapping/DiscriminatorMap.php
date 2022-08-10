<?php

declare(strict_types=1);

namespace Doctrine\ORM\Mapping;

use Attribute;
use Doctrine\Common\Annotations\Annotation\NamedArgumentConstructor;

/**
 * @Annotation
 * @NamedArgumentConstructor()
 * @Target("CLASS")
 */
#[Attribute(Attribute::TARGET_CLASS)]
final class DiscriminatorMap implements Annotation
{
<<<<<<< HEAD
    /** @var array<int|string, string> */
    public $value;

    /**
     * @param array<int|string, string> $value
=======
    /**
     * @var array<string, string>
     * @psalm-var array<string, class-string>
     */
    public $value;

    /**
     * @param array<string, string> $value
     * @psalm-param array<string, class-string> $value
>>>>>>> stage
     */
    public function __construct(array $value)
    {
        $this->value = $value;
    }
}
