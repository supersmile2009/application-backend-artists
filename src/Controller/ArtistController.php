<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Artist;
use App\Repository\ArtistRepository;
use FOS\RestBundle\Controller\Annotations as FOS;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArtistController extends AbstractController
{
    /**
     * @FOS\Get("/artists", name="artists_list")
     * @FOS\QueryParam(name="page", requirements="\d+", default="1")
     * @FOS\QueryParam(name="perPage", requirements="\d+", default="30")
     * @FOS\View(serializerGroups={"artists_list"})
     *
     * @param int              $page
     * @param int              $perPage
     * @param ArtistRepository $artistRepository
     *
     * @return Artist[]
     */
    public function list(int $page, int $perPage, ArtistRepository $artistRepository): array
    {
        return $artistRepository->findPaginated($page, $perPage);
    }

    /**
     * @FOS\Get("/artists/{token}", name="artists_show")
     * @FOS\View(serializerGroups={"artist_show"})
     *
     * @Entity("artist", expr="repository.findByToken(token)")
     *
     * @param Artist $artist
     *
     * @return Artist
     */
    public function show(Artist $artist): Artist
    {
        return $artist;
    }
}
