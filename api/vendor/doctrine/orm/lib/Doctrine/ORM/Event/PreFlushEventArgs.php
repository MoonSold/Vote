<?php

declare(strict_types=1);

namespace Doctrine\ORM\Event;

<<<<<<< HEAD
use Doctrine\Deprecations\Deprecation;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\Event\ManagerEventArgs;
=======
use Doctrine\Common\EventArgs;
use Doctrine\ORM\EntityManagerInterface;
>>>>>>> stage

/**
 * Provides event arguments for the preFlush event.
 *
 * @link        www.doctrine-project.com
<<<<<<< HEAD
 *
 * @extends ManagerEventArgs<EntityManagerInterface>
 */
class PreFlushEventArgs extends ManagerEventArgs
{
    /**
     * @deprecated 2.13. Use {@see getObjectManager} instead.
     *
=======
 */
class PreFlushEventArgs extends EventArgs
{
    /** @var EntityManagerInterface */
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
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
}
