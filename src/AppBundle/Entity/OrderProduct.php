<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrderProduct
 *
 * @ORM\Table(name="order_product")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OrderProductRepository")
 */
class OrderProduct
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Orders", inversedBy="orderProducts")
     * @ORM\JoinColumn(name="OrderId", referencedColumnName="id")
     */
    private $orderId;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Products", inversedBy="orderProducts")
     * @ORM\JoinColumn(name="ProductId", referencedColumnName="id")
     */
    private $productId;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set orderId
     *
     * @param integer $orderId
     * @return OrderProduct
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * Get orderId
     *
     * @return integer 
     */
    public function getOrder()
    {
        return $this->orderId;
    }

    /**
     * Set productId
     *
     * @param integer $productId
     * @return OrderProduct
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * Get productId
     *
     * @return integer 
     */
    public function getProduct()
    {
        return $this->productId;
    }
}
