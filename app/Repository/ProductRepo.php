<?php // i could connect repo with entity but couldnt know what is the purpose as i can do that directly (no time to figure out)
namespace App\Repository;
use App\Entities\Product;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManager;

class ProductRepo extends EntityRepository
{




    public function create(Product $product)
    {
        $this->em->persist($product);
        $this->em->flush();
    }

    public function update(Product $product, $data)
    {
        $product->setName($data['name']);
        $product->setDescription($data['description']);
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
     * create product
     * @return Product
     */
    private function prepareData($data)
    {
        return new Product($data);
    }
}
