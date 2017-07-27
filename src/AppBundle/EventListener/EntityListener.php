<?php
namespace AppBundle\EventListener;

use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Doctrine\ORM\Event\LifecycleEventArgs;
use AppBundle\Entity\Orders;
use AppBundle\Repository\OrderProductRepository;

/**
 * Created by PhpStorm.
 * User: dron
 * Date: 25.07.17
 * Time: 6:28
 */
class EntityListener
{
    private $tokenStorage;

    public function __construct(TokenStorageInterface $tokenStorage = null)
    {
        $this->tokenStorage = $tokenStorage;
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if (!$entity instanceof Orders) {
            return;
        }

        if (null !== $currentUser = $this->getUser()) {
            $entity->setUserId($currentUser);
        } else {
            $entity->setUserId(0);
        }
    }

    public function getUser()
    {
        if (!$this->tokenStorage) {
            throw new \LogicException('The SecurityBundle is not registered in your application.');
        }

        if (null === $token = $this->tokenStorage->getToken()) {
            return;
        }

        if (!is_object($user = $token->getUser())) {
            return;
        }

        return $user;
    }

}