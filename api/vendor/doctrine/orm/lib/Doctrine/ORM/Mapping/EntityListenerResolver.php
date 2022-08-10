<?php

declare(strict_types=1);

namespace Doctrine\ORM\Mapping;

/**
 * A resolver is used to instantiate an entity listener.
 */
interface EntityListenerResolver
{
    /**
     * Clear all instances from the set, or a specific instance when given its identifier.
     *
<<<<<<< HEAD
     * @param string|null $className May be any arbitrary string. Name kept for BC only.
=======
     * @param string $className May be any arbitrary string. Name kept for BC only.
>>>>>>> stage
     *
     * @return void
     */
    public function clear($className = null);

    /**
     * Returns a entity listener instance for the given identifier.
     *
     * @param string $className May be any arbitrary string. Name kept for BC only.
     *
     * @return object An entity listener
     */
    public function resolve($className);

    /**
     * Register a entity listener instance.
     *
     * @param object $object An entity listener
<<<<<<< HEAD
     *
     * @return void
=======
>>>>>>> stage
     */
    public function register($object);
}
