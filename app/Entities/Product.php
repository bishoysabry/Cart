<?php
namespace App\Entities;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Prdouct
 *
 * @package App\Entities
 *
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepo")
 * @ORM\Table(name="product")
 */
class Product
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
     * @ORM\ManyToMany(targetEntity="Cart",  mappedBy="product", cascade={"persist"})
     * @var Cart
     */
    protected $cart;


    /**
 * Product constructor.
 *
 * @param $name
 * @param $description
 */

    public function __construct($name = null, $description = null)
    {
      if ($name) {
          $this->name = $name;
      }
      if ($description) {
          $this->description = $description;
      }
    }
    /**
     * @return int
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
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
}
