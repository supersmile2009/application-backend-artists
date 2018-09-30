<?php

declare(strict_types=1);

namespace App\EventListener;

use App\Entity\Album;
use App\Utils\TokenGenerator;
use Doctrine\ORM\Event\LifecycleEventArgs;

class AlbumListener
{
    public function prePersist(Album $album, LifecycleEventArgs $event): void
    {
        $album->setToken(TokenGenerator::generate(6));
    }
}
