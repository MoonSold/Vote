<?php

namespace Doctrine\DBAL\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
<<<<<<< HEAD
use Doctrine\Deprecations\Deprecation;
=======
>>>>>>> stage

/**
 * Represents a GUID/UUID datatype (both are actually synonyms) in the database.
 */
class GuidType extends StringType
{
    /**
     * {@inheritdoc}
     */
    public function getSQLDeclaration(array $column, AbstractPlatform $platform)
    {
        return $platform->getGuidTypeDeclarationSQL($column);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return Types::GUID;
    }

    /**
     * {@inheritdoc}
<<<<<<< HEAD
     *
     * @deprecated
     */
    public function requiresSQLCommentHint(AbstractPlatform $platform)
    {
        Deprecation::triggerIfCalledFromOutside(
            'doctrine/dbal',
            'https://github.com/doctrine/dbal/pull/5509',
            '%s is deprecated.',
            __METHOD__
        );

=======
     */
    public function requiresSQLCommentHint(AbstractPlatform $platform)
    {
>>>>>>> stage
        return ! $platform->hasNativeGuidType();
    }
}
