<?php

namespace App\Tests\Repository;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ProductRepositoryTest extends KernelTestCase
{

    public function setup(): void
    {
        self::bootKernel();
        $entityManager = static::getContainer()->get('doctrine')->getManager();

        foreach($entityManager->getRepository(Product::class)->findAll() as $product) {
            $entityManager->remove($product);
        }

    }

    public function testFindProductsByMinPrice(): void
    {
        $this->markTestSkipped('This test is skipped because it requires a database connection.');
        self::bootKernel();
        $entityManager = static::getContainer()->get('doctrine')->getManager();

        // Ajouter des produits pour le test
        $product1 = new Product();
        $product1->setName('Product 1')->setPrice(50);
        $entityManager->persist($product1);

        $product2 = new Product();
        $product2->setName('Product 2')->setPrice(150);
        $entityManager->persist($product2);

        $entityManager->flush();

        // Tester le repository
        $repository = $entityManager->getRepository(Product::class);
        $results = $repository->findProductsByMinPrice(100);

        $this->assertCount(1, $results);
        $this->assertEquals('Product 2', $results[0]->getName());
    }
}
