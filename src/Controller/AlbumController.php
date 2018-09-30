<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Album;
use FOS\RestBundle\Controller\Annotations as FOS;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AlbumController extends AbstractController
{
    /**
     * @FOS\Get("/albums/{token}", name="albums_show")
     * @FOS\View(serializerGroups={"album_show"})
     *
     * @Entity("album", expr="repository.findByToken(token)")
     *
     * @param Album $album
     *
     * @return Album
     */
    public function show(Album $album): Album
    {
        return $album;
    }
}
