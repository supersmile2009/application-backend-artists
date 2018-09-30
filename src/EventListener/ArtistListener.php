<?php declare(strict_types=1);

namespace App\EventListener;

use App\Entity\Artist;
use App\Utils\TokenGenerator;
use Doctrine\ORM\Event\LifecycleEventArgs;

class ArtistListener
{
    public function prePersist(Artist $artist, LifecycleEventArgs $event): void
    {
        $artist->setToken(TokenGenerator::generate(6));
    }

}
