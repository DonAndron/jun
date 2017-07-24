<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Orders
 *
 * @ORM\Table(name="orders")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OrdersRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Orders
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
     * @ORM\Column(name="UserId", type="integer")
     */
    private $userId;

    /**
     * @var int
     *
     * @ORM\Column(name="Sum", type="integer")
     */
    private $sum;

    /**
     * One Order has Many OrderProduct.
     * @ORM\OneToMany(targetEntity="OrderProduct", mappedBy="orderId", cascade={"all"})
     */
    private $orderProducts;

    /**
     * Products
     * @var ArrayCollection
     */
    private $products;

    public function __construct()
    {
        $this->orderProducts = new ArrayCollection();
        $this->product = new ArrayCollection();
    }

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
     * Set userId
     *
     * @return Orders
     * @ORM\PrePersist
     */
    public function setUserId()
    {
        $this->userId = 2;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set sum
     *
     * @return Orders
     * @ORM\PrePersist
     */
    public function setSum()
    {
        $this->sum = 22;

        return $this;
    }

    /**
     * Get sum
     *
     * @return integer
     */
    public function getSum()
    {
        return $this->sum;
    }

    /**
     * Get products
     *
     * @return ArrayCollection|string
     */
    public function getProduct()
    {
        $products = new ArrayCollection();

        foreach ($this->orderProducts as $product) {
            $products[] = $product->getProduct();
        }

        return $products;
    }

    /**
     * Get Order
     * @return $this
     */
    public function getOrder()
    {
        return $this;
    }

    /**
     * Set products
     * @param $products
     */
    public function setProduct($products)
    {
        foreach ($products as $product) {
            $orderProducts = new OrderProduct();

            $orderProducts->setOrderId($this);
            $orderProducts->setProductId($product);

            $this->addOrderProduct($orderProducts);
        }

    }

    /**
     * Add
     * @param $orderProduct
     */
    public function addOrderProduct($orderProduct)
    {
        $this->orderProducts[] = $orderProduct;
    }

    /**
     *
     * @param $orderProduct
     * @return mixed
     */
    public function removePo($orderProduct)
    {
        return $this->orderProducts->removeElement($orderProduct);
    }
}
