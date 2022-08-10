<?php

namespace Doctrine\DBAL\Platforms\Keywords;

<<<<<<< HEAD
use Doctrine\Deprecations\Deprecation;

=======
>>>>>>> stage
/**
 * MariaDb reserved keywords list.
 *
 * @deprecated Use {@link MariaDBKeywords} instead.
 *
 * @link https://mariadb.com/kb/en/the-mariadb-library/reserved-words/
 */
final class MariaDb102Keywords extends MariaDBKeywords
{
<<<<<<< HEAD
    /**
     * @deprecated
     */
    public function getName(): string
    {
        Deprecation::triggerIfCalledFromOutside(
            'doctrine/dbal',
            'https://github.com/doctrine/dbal/pull/5433',
            'MariaDb102Keywords::getName() is deprecated.'
        );

=======
    public function getName(): string
    {
>>>>>>> stage
        return 'MariaDb102';
    }
}
