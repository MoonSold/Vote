<?php

declare(strict_types=1);

namespace Doctrine\ORM\Mapping;

/**
 * A set of rules for determining the physical column and table names
 *
 * @link    www.doctrine-project.org
 */
interface NamingStrategy
{
    /**
     * Returns a table name for an entity class.
     *
<<<<<<< HEAD
     * @param class-string $className
=======
     * @param string $className The fully-qualified class name.
>>>>>>> stage
     *
     * @return string A table name.
     */
    public function classToTableName($className);

    /**
     * Returns a column name for a property.
     *
<<<<<<< HEAD
     * @param string       $propertyName A property name.
     * @param class-string $className    The fully-qualified class name.
=======
     * @param string      $propertyName A property name.
     * @param string|null $className    The fully-qualified class name.
>>>>>>> stage
     *
     * @return string A column name.
     */
    public function propertyToColumnName($propertyName, $className = null);

    /**
     * Returns a column name for an embedded property.
     *
<<<<<<< HEAD
     * @param string       $propertyName
     * @param string       $embeddedColumnName
     * @param class-string $className
     * @param class-string $embeddedClassName
     *
     * @return string
     */
    public function embeddedFieldToColumnName(
        $propertyName,
        $embeddedColumnName,
        $className = null,
        $embeddedClassName = null
    );
=======
     * @param string $propertyName
     * @param string $embeddedColumnName
     * @param string $className
     * @param string $embeddedClassName
     *
     * @return string
     */
    public function embeddedFieldToColumnName($propertyName, $embeddedColumnName, $className = null, $embeddedClassName = null);
>>>>>>> stage

    /**
     * Returns the default reference column name.
     *
     * @return string A column name.
     */
    public function referenceColumnName();

    /**
     * Returns a join column name for a property.
     *
     * @param string $propertyName A property name.
     *
     * @return string A join column name.
     */
<<<<<<< HEAD
    public function joinColumnName($propertyName/*, string $className */);
=======
    public function joinColumnName($propertyName);
>>>>>>> stage

    /**
     * Returns a join table name.
     *
<<<<<<< HEAD
     * @param class-string $sourceEntity The source entity.
     * @param class-string $targetEntity The target entity.
     * @param string       $propertyName A property name.
=======
     * @param string      $sourceEntity The source entity.
     * @param string      $targetEntity The target entity.
     * @param string|null $propertyName A property name.
>>>>>>> stage
     *
     * @return string A join table name.
     */
    public function joinTableName($sourceEntity, $targetEntity, $propertyName = null);

    /**
     * Returns the foreign key column name for the given parameters.
     *
<<<<<<< HEAD
     * @param class-string $entityName           An entity.
     * @param string|null  $referencedColumnName A property name or null in
     *                                           case of a self-referencing
     *                                           entity with join columns
     *                                           defined in the mapping
=======
     * @param string      $entityName           An entity.
     * @param string|null $referencedColumnName A property.
>>>>>>> stage
     *
     * @return string A join column name.
     */
    public function joinKeyColumnName($entityName, $referencedColumnName = null);
}
