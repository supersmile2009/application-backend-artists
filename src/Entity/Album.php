<?php declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Doctrine\ORM\EntityRepository")
 * @ORM\Table(name="album")
 *
 * @UniqueEntity(fields={"token"})
 */
class Album
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
     */
    private $token;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100)
     *
     * @Assert\NotBlank()
     * @Assert\Length(min="1", max="100")
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="cover", type="string", length=255, nullable=true)
     *
     * @Assert\Url()
     * @Assert\Length(max="255")
     */
    private $cover;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var Artist
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Artist", inversedBy="albums")
     * @ORM\JoinColumn(name="artist_id", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     *
     * @Assert\NotNull()
     */
    protected $artist;

    /**
     * @var Song[]
     *
     * @ORM\OneToMany(
     *     targetEntity="App\Entity\Song",
     *     mappedBy="album",
     *     cascade={"persist"},
     *     orphanRemoval=true
     * )
     */
    private $songs;

    public function __construct()
    {
        $this->songs = new ArrayCollection();
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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): void 
    {
        $this->title = $title;
    }

    public function getCover(): ?string
    {
        return $this->cover;
    }

    public function setCover(?string $cover): void 
    {
        $this->cover = $cover;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void 
    {
        $this->description = $description;
    }

    public function getArtist(): ?Artist
    {
        return $this->artist;
    }

    public function setArtist(Artist $artist): void
    {
        $this->artist = $artist;
    }

    /**
     * @return ArrayCollection|Song[]
     */
    public function getSongs()
    {
        return $this->songs;
    }

    /**
     * @param ArrayCollection|Song[] $songs
     */
    public function setSongs(iterable $songs): void
    {
        foreach ($songs as $song) {
            $song->setAlbum($this);
        }
        $this->songs = $songs;
    }

    public function addSong(Song $song): void
    {
        $song->setAlbum($this);
        $this->songs[] = $song;
    }

    public function removeSong(Song $song): void
    {
        $this->songs->removeElement($song);
    }
}
