<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Song;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class SongFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function getDependencies()
    {
        return [
            AlbumFixtures::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        // King Of Limbs start
        $song1 = new Song();
        $song1->setTitle('Bloom');
        $song1->setLengthFromString('5:15');
        $song1->setPosition(1);
        $song1->setAlbum($this->getReference(AlbumFixtures::KING_OF_LIMBS_REFERENCE));
        $manager->persist($song1);

        $song2 = new Song();
        $song2->setTitle('Morning Mr Magpie');
        $song2->setLengthFromString('4:41');
        $song2->setPosition(2);
        $song2->setAlbum($this->getReference(AlbumFixtures::KING_OF_LIMBS_REFERENCE));
        $manager->persist($song2);

        $song3 = new Song();
        $song3->setTitle('Little by Little');
        $song3->setLengthFromString('4:27');
        $song3->setPosition(3);
        $song3->setAlbum($this->getReference(AlbumFixtures::KING_OF_LIMBS_REFERENCE));
        $manager->persist($song3);

        $song4 = new Song();
        $song4->setTitle('Feral');
        $song4->setLengthFromString('3:13');
        $song4->setPosition(4);
        $song4->setAlbum($this->getReference(AlbumFixtures::KING_OF_LIMBS_REFERENCE));
        $manager->persist($song4);

        $song5 = new Song();
        $song5->setTitle('Lotus Flower');
        $song5->setLengthFromString('5:01');
        $song5->setPosition(5);
        $song5->setAlbum($this->getReference(AlbumFixtures::KING_OF_LIMBS_REFERENCE));
        $manager->persist($song5);

        $song6 = new Song();
        $song6->setTitle('Codex');
        $song6->setLengthFromString('4:47');
        $song6->setPosition(6);
        $song6->setAlbum($this->getReference(AlbumFixtures::KING_OF_LIMBS_REFERENCE));
        $manager->persist($song6);

        $song7 = new Song();
        $song7->setTitle('Give Up the Ghost');
        $song7->setLengthFromString('4:50');
        $song7->setPosition(7);
        $song7->setAlbum($this->getReference(AlbumFixtures::KING_OF_LIMBS_REFERENCE));
        $manager->persist($song7);

        $song8 = new Song();
        $song8->setTitle('Separator');
        $song8->setLengthFromString('5:20');
        $song8->setPosition(8);
        $song8->setAlbum($this->getReference(AlbumFixtures::KING_OF_LIMBS_REFERENCE));
        $manager->persist($song8);
        // King Of Limbs end

        // OK Computer start
        $song9 = new Song();
        $song9->setTitle('Airbag');
        $song9->setLengthFromString('4:44');
        $song9->setPosition(1);
        $song9->setAlbum($this->getReference(AlbumFixtures::OK_COMPUTER_REFERENCE));
        $manager->persist($song9);

        $song10 = new Song();
        $song10->setTitle('Paranoid Android');
        $song10->setLengthFromString('6:23');
        $song10->setPosition(2);
        $song10->setAlbum($this->getReference(AlbumFixtures::OK_COMPUTER_REFERENCE));
        $manager->persist($song10);

        $song11 = new Song();
        $song11->setTitle('Subterranean Homesick Alien');
        $song11->setLengthFromString('4:27');
        $song11->setPosition(3);
        $song11->setAlbum($this->getReference(AlbumFixtures::OK_COMPUTER_REFERENCE));
        $manager->persist($song11);
        // OK Computer end

        // Dummy start
        $song12 = new Song();
        $song12->setTitle('Mysterons');
        $song12->setLengthFromString('5:02');
        $song12->setPosition(1);
        $song12->setAlbum($this->getReference(AlbumFixtures::DUMMY_REFERENCE));
        $manager->persist($song12);

        $song13 = new Song();
        $song13->setTitle('Sour Times');
        $song13->setLengthFromString('4:11');
        $song13->setPosition(2);
        $song13->setAlbum($this->getReference(AlbumFixtures::DUMMY_REFERENCE));
        $manager->persist($song13);

        $song14 = new Song();
        $song14->setTitle('Strangers');
        $song14->setLengthFromString('3:55');
        $song14->setPosition(3);
        $song14->setAlbum($this->getReference(AlbumFixtures::DUMMY_REFERENCE));
        $manager->persist($song14);
        // Dummy end

        // Third start
        $song12 = new Song();
        $song12->setTitle('Silence');
        $song12->setLengthFromString('4:58');
        $song12->setPosition(1);
        $song12->setAlbum($this->getReference(AlbumFixtures::THIRD_REFERENCE));
        $manager->persist($song12);

        $song13 = new Song();
        $song13->setTitle('Hunter');
        $song13->setLengthFromString('3:57');
        $song13->setPosition(2);
        $song13->setAlbum($this->getReference(AlbumFixtures::THIRD_REFERENCE));
        $manager->persist($song13);

        $song14 = new Song();
        $song14->setTitle('Nylon Smile');
        $song14->setLengthFromString('3:16');
        $song14->setPosition(3);
        $song14->setAlbum($this->getReference(AlbumFixtures::THIRD_REFERENCE));
        $manager->persist($song14);
        // Third end

        $manager->flush();
    }
}
