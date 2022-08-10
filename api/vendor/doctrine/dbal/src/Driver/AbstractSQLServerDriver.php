<?php

namespace Doctrine\DBAL\Driver;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Driver;
use Doctrine\DBAL\Driver\API\ExceptionConverter as ExceptionConverterInterface;
use Doctrine\DBAL\Driver\API\SQLSrv\ExceptionConverter;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Platforms\SQLServer2012Platform;
use Doctrine\DBAL\Schema\SQLServerSchemaManager;
<<<<<<< HEAD
use Doctrine\Deprecations\Deprecation;
=======
>>>>>>> stage

use function assert;

/**
 * Abstract base implementation of the {@see Driver} interface for Microsoft SQL Server based drivers.
 */
abstract class AbstractSQLServerDriver implements Driver
{
    /**
     * {@inheritdoc}
     */
    public function getDatabasePlatform()
    {
        return new SQLServer2012Platform();
    }

    /**
     * {@inheritdoc}
<<<<<<< HEAD
     *
     * @deprecated Use {@link SQLServerPlatform::createSchemaManager()} instead.
     */
    public function getSchemaManager(Connection $conn, AbstractPlatform $platform)
    {
        Deprecation::triggerIfCalledFromOutside(
            'doctrine/dbal',
            'https://github.com/doctrine/dbal/pull/5458',
            'AbstractSQLServerDriver::getSchemaManager() is deprecated.'
                . ' Use SQLServerPlatform::createSchemaManager() instead.'
        );

=======
     */
    public function getSchemaManager(Connection $conn, AbstractPlatform $platform)
    {
>>>>>>> stage
        assert($platform instanceof SQLServer2012Platform);

        return new SQLServerSchemaManager($conn, $platform);
    }

    public function getExceptionConverter(): ExceptionConverterInterface
    {
        return new ExceptionConverter();
    }
}
