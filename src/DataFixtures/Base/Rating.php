<?php

namespace App\DataFixtures\Base;

use App\DataFixtures\FixtureData;
use App\Entity\Base\Product;
use App\Entity\Base\Rating as RatingEntity;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Rating extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        foreach (FixtureData::PRODUCT_DATA_LIST as $key => $product) {
            if (!$product['rating']) {
                continue;
            }

            /**
             * @var Product $product
             */
            $product = $this->getReference("product{$key}");

            $ratingData = $product['rating'];

            $ratingEntity = (new RatingEntity())
                ->setProduct($product)
                ->setMinusText($ratingData['minusText'])
                ->setPlusText($ratingData['plusText'])
                ->setRatingValue($ratingData['ratingValue'])
                ->setTotalText($ratingData['totalText']);

            $manager->persist($ratingEntity);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            Product::class
        ];
    }
}
