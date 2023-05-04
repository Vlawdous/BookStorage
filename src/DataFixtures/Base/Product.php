<?php

namespace App\DataFixtures\Base;

use App\DataFixtures\FixtureData;
use App\Entity\Base\Product as ProductEntity;
use App\Entity\Base\ProductType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Product extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        /**
         * @var ProductType $productTypeBook
         */
        $productTypeBook = $this->getReference('bookProduct');

        foreach (FixtureData::PRODUCT_DATA_LIST as $key => $product) {
            $productEntity = (new ProductEntity())
                ->setName($product['product']['name'])
                ->setImageSrc($product['product']['imagePrice'])
                ->setAlias($product['product']['alias'])
                ->setDescription($product['product']['alias'])
                ->setPrice($product['product']['price'])
                ->setProductType($productTypeBook);

            $manager->persist($productEntity);
            $this->addReference("product{$key}", $productEntity);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ProductType::class
        ];
    }
}
