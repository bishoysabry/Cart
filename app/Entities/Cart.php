<?php
namespace App\Entities;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Cart
 *
 * @package App\Entities
 *
 * @ORM\Entity
 * @ORM\Table(name="cart")
 */
class Cart
{
  /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\Column(type="string")
     */
    protected $description;
    /**
     * @ORM\ManyToMany(targetEntity="Product",inversedBy="cart")
     * @var ArrayCollection|Cart[]
     */
    protected $products;
    /**
   * Tag constructor.
   *
   * @param $name
   */
  public function __construct($name)
  {
      $this->name = $name;

      $this->products = new ArrayCollection();
  }
  /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return Product[]|ArrayCollection
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
    * @param $product
    * @return Cart
     */
    public function addProduct(Product $product)
    {
        if (!$this->hasProduct($product)) {
            $this->products->add($product);
        }
        return $this;
    }

    /**
     * @param Product $product
     * @return boolean
     */
    public function hasProduct(Product $product)
    {
        return $this->products->contains($product);
    }

    /**
     * @param Product $product
     * @return bool
     */
    public function removeProduct(Product $product)
    {
        if ($this->hasProduct($product)) {
            return $this->products->removeElement($product);
        }
        return false;
    }

        /**
         * @param Product $product
         * @return bool
         */
    public function removeAllProducts()
    {
      $cartproducts = $this->products;
      foreach ($cartproducts as $cartproduct) {
         $this->products->removeElement($cartproduct);
        }

  }
  
}
