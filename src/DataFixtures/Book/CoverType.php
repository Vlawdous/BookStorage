<?php

namespace App\DataFixtures\Book;

use App\DataFixtures\FixtureData;
use App\Entity\Book\CoverType as CoverTypeEntity;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CoverType extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        foreach (FixtureData::COVER_TYPE_LIST as $coverType) {
            $coverTypeEntity = (new CoverTypeEntity())
                ->setName($coverType);

            $manager->persist($coverTypeEntity);
            $this->addReference("{$coverType}Cover", $coverTypeEntity);
        }

        $manager->flush();
    }
}
