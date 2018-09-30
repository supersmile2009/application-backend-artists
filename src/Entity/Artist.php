<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArtistRepository")
 * @ORM\Table(name="artist")
 *
 * @UniqueEntity(fields={"token"})
 */
class Artist
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=6, unique=true)
     *
     * @Assert\NotBlank(groups={"update"})
     * @Assert\Length(min="6", max="6")
     * @Assert\Regex("/^[A-Z0-9]+$/")
     *
     * @Serializer\Groups({"artists_list", "artist_show", "album_show"})
     */
    private $token;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100)
     *
     * @Assert\NotBlank
     * @Assert\Length(min="1", max="100")
     *
     * @Serializer\Groups({"artists_list", "artist_show", "album_show"})
     */
    private $name;

    /**
     * @var Album[]
     *
     * @ORM\OneToMany(
     *     targetEntity="App\Entity\Album",
     *     mappedBy="artist",
     *     cascade={"persist"},
     *     orphanRemoval=true
     * )
     *
     * @Serializer\Groups({"artists_list", "artist_show"})
     */
    private $albums;

    public function __construct()
    {
        $this->albums = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(?string $token): void
    {
        $this->token = $token;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return ArrayCollection|Album[]
     */
    public function getAlbums()
    {
        return $this->albums;
    }

    /**
     * @param ArrayCollection|Album[] $albums
     */
    public function setAlbums(iterable $albums): void
    {
        foreach ($albums as $album) {
            $album->setArtist($this);
        }
        $this->albums = $albums;
    }

    public function addAlbum(Album $album): void
    {
        $album->setArtist($this);
        $this->albums[] = $album;
    }

    public function removeAlbum(Album $album): void
    {
        $this->albums->removeElement($album);
    }
}
