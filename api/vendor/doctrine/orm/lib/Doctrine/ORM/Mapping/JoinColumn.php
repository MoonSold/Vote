<?php

declare(strict_types=1);

namespace Doctrine\ORM\Mapping;

use Attribute;
use Doctrine\Common\Annotations\Annotation\NamedArgumentConstructor;

/**
 * @Annotation
 * @NamedArgumentConstructor()
 * @Target({"PROPERTY","ANNOTATION"})
 */
#[Attribute(Attribute::TARGET_PROPERTY | Attribute::IS_REPEATABLE)]
final class JoinColumn implements Annotation
{
    /** @var string|null */
    public $name;

    /** @var string */
    public $referencedColumnName = 'id';

    /** @var bool */
    public $unique = false;

    /** @var bool */
    public $nullable = true;

    /** @var mixed */
    public $onDelete;

    /** @var string|null */
    public $columnDefinition;

    /**
     * Field name used in non-object hydration (array/scalar).
     *
     * @var string|null
     */
    public $fieldName;

<<<<<<< HEAD
    /** @var array<string, mixed> */
    public $options = [];

    /**
     * @param array<string, mixed> $options
     */
=======
>>>>>>> stage
    public function __construct(
        ?string $name = null,
        string $referencedColumnName = 'id',
        bool $unique = false,
        bool $nullable = true,
        $onDelete = null,
        ?string $columnDefinition = null,
<<<<<<< HEAD
        ?string $fieldName = null,
        array $options = []
=======
        ?string $fieldName = null
>>>>>>> stage
    ) {
        $this->name                 = $name;
        $this->referencedColumnName = $referencedColumnName;
        $this->unique               = $unique;
        $this->nullable             = $nullable;
        $this->onDelete             = $onDelete;
        $this->columnDefinition     = $columnDefinition;
        $this->fieldName            = $fieldName;
<<<<<<< HEAD
        $this->options              = $options;
=======
>>>>>>> stage
    }
}
