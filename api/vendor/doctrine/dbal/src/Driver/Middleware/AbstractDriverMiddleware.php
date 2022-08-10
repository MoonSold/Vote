<?php

namespace Doctrine\DBAL\Driver\Middleware;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Driver;
use Doctrine\DBAL\Driver\API\ExceptionConverter;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\VersionAwarePlatformDriver;
<<<<<<< HEAD
use Doctrine\Deprecations\Deprecation;

abstract class AbstractDriverMiddleware implements VersionAwarePlatformDriver
{
    private Driver $wrappedDriver;
=======

abstract class AbstractDriverMiddleware implements VersionAwarePlatformDriver
{
    /** @var Driver */
    private $wrappedDriver;
>>>>>>> stage

    public function __construct(Driver $wrappedDriver)
    {
        $this->wrappedDriver = $wrappedDriver;
    }

    /**
     * {@inheritdoc}
     */
    public function connect(array $params)
    {
        return $this->wrappedDriver->connect($params);
    }

    /**
     * {@inheritdoc}
     */
    public function getDatabasePlatform()
    {
        return $this->wrappedDriver->getDatabasePlatform();
    }

    /**
     * {@inheritdoc}
<<<<<<< HEAD
     *
     * @deprecated Use {@link AbstractPlatform::createSchemaManager()} instead.
     */
    public function getSchemaManager(Connection $conn, AbstractPlatform $platform)
    {
        Deprecation::triggerIfCalledFromOutside(
            'doctrine/dbal',
            'https://github.com/doctrine/dbal/pull/5458',
            'AbstractDriverMiddleware::getSchemaManager() is deprecated.'
                . ' Use AbstractPlatform::createSchemaManager() instead.'
        );

=======
     */
    public function getSchemaManager(Connection $conn, AbstractPlatform $platform)
    {
>>>>>>> stage
        return $this->wrappedDriver->getSchemaManager($conn, $platform);
    }

    public function getExceptionConverter(): ExceptionConverter
    {
        return $this->wrappedDriver->getExceptionConverter();
    }

    /**
     * {@inheritdoc}
     */
    public function createDatabasePlatformForVersion($version)
    {
        if ($this->wrappedDriver instanceof VersionAwarePlatformDriver) {
            return $this->wrappedDriver->createDatabasePlatformForVersion($version);
        }

        return $this->wrappedDriver->getDatabasePlatform();
    }
}
