<?php

namespace Doctrine\DBAL\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;

/**
 * Type that maps an SQL VARCHAR to a PHP string.
 */
class StringType extends Type
{
    /**
     * {@inheritdoc}
     */
    public function getSQLDeclaration(array $column, AbstractPlatform $platform)
    {
<<<<<<< HEAD
        return $platform->getStringTypeDeclarationSQL($column);
=======
        return $platform->getVarcharTypeDeclarationSQL($column);
>>>>>>> stage
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return Types::STRING;
    }
}
