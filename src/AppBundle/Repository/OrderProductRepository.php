<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * OrderProductRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class OrderProductRepository extends EntityRepository
{

    public function removeOrderProductsByOrderId($orderId)
    {
        $isDeleted = $this->createQueryBuilder("orderProduct")
            ->delete()
            ->where('orderProduct.orderId = :orderId')->setParameter("orderId", $orderId)
            ->getQuery()->execute();

        return $isDeleted;
    }
}
