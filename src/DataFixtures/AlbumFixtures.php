<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Album;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class AlbumFixtures extends Fixture implements DependentFixtureInterface
{
    public const KING_OF_LIMBS_REFERENCE = 'album_king-of-limbs';
    public const OK_COMPUTER_REFERENCE = 'album_ok-computer';
    public const DUMMY_REFERENCE = 'album_dummy';
    public const THIRD_REFERENCE = 'album_third';

    /**
     * {@inheritdoc}
     */
    public function getDependencies()
    {
        return [
            ArtistFixtures::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $album1 = new Album();
        $album1->setTitle('The King of Limbs');
        $album1->setCover('https://goo.gl/CsDNgQ');
        $album1->setDescription('The King of Limbs is the eighth studio album by English rock band Radiohead, produced by Nigel Godrich. It was self-released on 18 February 2011 as a download in MP3 and WAV formats, followed by physical CD and 12\" vinyl releases on 28 March, a wider digital release via AWAL, and a special \"newspaper\" edition on 9 May 2011. The physical editions were released through the band\'s Ticker Tape imprint on XL in the United Kingdom, TBD in the United States, and Hostess Entertainment in Japan.');
        $album1->setArtist($this->getReference(ArtistFixtures::RADIOHEAD_REFERENCE));
        $this->addReference(static::KING_OF_LIMBS_REFERENCE, $album1);
        $manager->persist($album1);

        $album2 = new Album();
        $album2->setTitle('OK Computer');
        $album2->setCover('https://goo.gl/tJZYkB');
        $album2->setDescription('OK Computer is the third studio album by the English alternative rock band Radiohead, released on 16 June 1997 on Parlophone in the United Kingdom and 1 July 1997 by Capitol Records in the United States. It marks a deliberate attempt by the band to move away from the introspective guitar-oriented sound of their previous album The Bends. Its layered sound and wide range of influences set it apart from many of the Britpop and alternative rock bands popular at the time and laid the groundwork for Radiohead\'s later, more experimental work.');
        $album2->setArtist($this->getReference(ArtistFixtures::RADIOHEAD_REFERENCE));
        $this->addReference(static::OK_COMPUTER_REFERENCE, $album2);
        $manager->persist($album2);

        $album3 = new Album();
        $album3->setTitle('Dummy');
        $album3->setCover('https://goo.gl/evUdcY');
        $album3->setDescription('Dummy is the debut album of the Bristol-based group Portishead. Released in August 22, 1994 on Go! Discs, the album earned critical acclaim, winning the 1995 Mercury Music Prize. It is often credited with popularizing the trip-hop genre and is frequently cited in lists of the best albums of the 1990s. Although it achieved modest chart success overseas, it peaked at #2 on the UK Album Chart and saw two of its three singles reach #13. The album was certified gold in 1997 and has sold two million copies in Europe. As of September 2011, the album was certified double-platinum in the United Kingdom and has sold as of September 2011 825,000 copies.');
        $album3->setArtist($this->getReference(ArtistFixtures::PORTISHEAD_REFERENCE));
        $this->addReference(static::DUMMY_REFERENCE, $album3);
        $manager->persist($album3);

        $album4 = new Album();
        $album4->setTitle('Third');
        $album4->setCover('https://goo.gl/9fmjsi');
        $album4->setDescription('Third is the third studio album by English musical group Portishead, released on 27 April 2008, on Island Records in the United Kingdom, two days after on Mercury Records in the United States, and on 30 April 2008 on Universal Music Japan in Japan. It is their first release in 10 years, and their first studio album in eleven years. Third entered the UK Album Chart at #2, and became the band\'s first-ever American Top 10 album on the Billboard 200, reaching #7 in its entry week.');
        $album4->setArtist($this->getReference(ArtistFixtures::PORTISHEAD_REFERENCE));
        $this->addReference(static::THIRD_REFERENCE, $album4);
        $manager->persist($album4);

        $manager->flush();
    }
}
