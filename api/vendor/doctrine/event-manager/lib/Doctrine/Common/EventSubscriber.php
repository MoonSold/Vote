<?php

declare(strict_types=1);

namespace Doctrine\Common;

/**
<<<<<<< HEAD
 * An EventSubscriber knows what events it is interested in.
=======
 * An EventSubscriber knows himself what events he is interested in.
>>>>>>> stage
 * If an EventSubscriber is added to an EventManager, the manager invokes
 * {@link getSubscribedEvents} and registers the subscriber as a listener for all
 * returned events.
 */
interface EventSubscriber
{
    /**
     * Returns an array of events this subscriber wants to listen to.
     *
     * @return string[]
     */
    public function getSubscribedEvents();
}
