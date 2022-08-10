<?php

declare(strict_types=1);

namespace Doctrine\ORM\Event;

<<<<<<< HEAD
use Doctrine\Deprecations\Deprecation;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\Event\OnClearEventArgs as BaseOnClearEventArgs;
=======
use Doctrine\Common\EventArgs;
use Doctrine\ORM\EntityManagerInterface;
>>>>>>> stage

/**
 * Provides event arguments for the onClear event.
 *
 * @link        www.doctrine-project.org
<<<<<<< HEAD
 *
 * @extends BaseOnClearEventArgs<EntityManagerInterface>
 */
class OnClearEventArgs extends BaseOnClearEventArgs
{
=======
 */
class OnClearEventArgs extends EventArgs
{
    /** @var EntityManagerInterface */
    private $em;

>>>>>>> stage
    /** @var string|null */
    private $entityClass;

    /**
     * @param string|null $entityClass Optional entity class.
     */
    public function __construct(EntityManagerInterface $em, $entityClass = null)
    {
<<<<<<< HEAD
        parent::__construct($em);

=======
        $this->em          = $em;
>>>>>>> stage
        $this->entityClass = $entityClass;
    }

    /**
     * Retrieves associated EntityManager.
     *
<<<<<<< HEAD
     * @deprecated 2.13. Use {@see getObjectManager} instead.
     *
=======
>>>>>>> stage
     * @return EntityManagerInterface
     */
    public function getEntityManager()
    {
<<<<<<< HEAD
        Deprecation::trigger(
            'doctrine/orm',
            'https://github.com/doctrine/orm/issues/9875',
            'Method %s() is deprecated and will be removed in Doctrine ORM 3.0. Use getObjectManager() instead.',
            __METHOD__
        );

        return $this->getObjectManager();
=======
        return $this->em;
>>>>>>> stage
    }

    /**
     * Name of the entity class that is cleared, or empty if all are cleared.
     *
     * @deprecated Clearing the entity manager partially is deprecated. This method will be removed in 3.0.
     *
     * @return string|null
     */
    public function getEntityClass()
    {
        return $this->entityClass;
    }

    /**
     * Checks if event clears all entities.
     *
     * @deprecated Clearing the entity manager partially is deprecated. This method will be removed in 3.0.
     *
     * @return bool
     */
    public function clearsAllEntities()
    {
        return $this->entityClass === null;
    }
}
