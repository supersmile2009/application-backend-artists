<?php declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Artist;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ArtistFixtures extends Fixture
{
    public const RADIOHEAD_REFERENCE = 'artist_radiohead';
    public const PORTISHEAD_REFERENCE = 'artist_portishead';
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $radiohead = new Artist();
        $radiohead->setName('Radiohead');
        $this->addReference(static::RADIOHEAD_REFERENCE, $radiohead);
        $manager->persist($radiohead);

        $portishead = new Artist();
        $portishead->setName('Portishead');
        $this->addReference(static::PORTISHEAD_REFERENCE, $portishead);
        $manager->persist($portishead);

        $manager->flush();
    }

}
