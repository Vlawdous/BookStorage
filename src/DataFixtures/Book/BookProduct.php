<?php

namespace App\DataFixtures\Book;

use App\DataFixtures\FixtureData;
use App\Entity\Base\Product;
use App\Entity\Book\BookProduct as BookProductEntity;
use App\Entity\Book\CoverType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BookProduct extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        foreach (FixtureData::PRODUCT_DATA_LIST as $key => $product) {
            if (!$product['book']) {
                continue;
            }

            /**
             * @var Product $product
             */
            $product = $this->getReference("product{$key}");

            $bookData = $product['book'];

            /**
             * @var CoverType $coverType
             */
            $coverType = $this->getReference("{$bookData['coverType']}Cover");

            $bookProductEntity = (new BookProductEntity())
                ->setProduct($product)
                ->setPublisher($bookData['publisher'])
                ->setCirculation($bookData['circulation'])
                ->setCoverType($coverType)
                ->setAgeLimit($bookData['ageLimit'])
                ->setDatePublicate($bookData['datePublicate'])
                ->setHorizontalLength($bookData['horizontalLength'])
                ->setNumberOfPages($bookData['numberOfPages'])
                ->setVerticalLength($bookData['verticalLength'])
                ->setWeight($bookData['weight'])
                ->setWidth($bookData['width']);

            $manager->persist($bookProductEntity);
            $this->addReference("book{$key}", $bookProductEntity);
        }

        $manager->flush();
    }
}