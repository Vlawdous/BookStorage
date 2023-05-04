<?php

namespace App\DataFixtures\Base;

use App\DataFixtures\FixtureData;
use App\Entity\Base\ProductType as ProductTypeEntity;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductType extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        foreach (FixtureData::PRODUCT_TYPE_LIST as $productType) {
            $productTypeEntity = (new ProductTypeEntity())
                ->setName($productType);

            $manager->persist($productTypeEntity);
            $this->addReference("{$productType}Product", $productTypeEntity);
        }

        $manager->flush();
    }
}
