<?php
namespace App\Repository;
use App\Entities\Product;
use Doctrine\ORM\EntityManager;

class ProductRepo
{

    /**
     * @var string
     */
    private $class = 'App\Entities\Product';
    /**
     * @var EntityManager
     */
    private $em;


    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }


    public function create(Product $product)
    {
        $this->em->persist($product);
        $this->em->flush();
    }

    public function update(Product $product, $data)
    {
        $post->setName($data['name']);
        $post->setDescription($data['description']);
        $this->em->persist($product);
        $this->em->flush();
    }

    public function ProductOfId($id)
    {
        return $this->em->getRepository($this->class)->findOneBy([
            'id' => $id
        ]);
    }

    public function delete(Product $product)
    {
        $this->em->remove( $product);
        $this->em->flush();
    }

    /**
     * create Post
     * @return Product
     */
    private function prepareData($data)
    {
        return new Product($data);
    }
}
