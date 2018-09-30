<?php declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Doctrine\ORM\EntityRepository")
 * @ORM\Table(
 *     name="song",
 *     uniqueConstraints={@ORM\UniqueConstraint(name="album_position", columns={"album_id", "position"})}
 * )
 *
 * @UniqueEntity(fields={"album", "position"})
 */
class Song
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
     * @ORM\Column(name="title", type="string", length=255)
     *
     * @Assert\NotBlank()
     * @Assert\Length(max="255")
     */
    private $title;

    /**
     * Song length in seconds.
     *
     * @var int
     *
     * @ORM\Column(name="length", type="smallint")
     *
     * @Assert\NotNull()
     * @Assert\Range(min="1", max="32767")
     */
    private $length;

    /**
     * Song position in an album.
     *
     * TODO: Add sortable behaviour.
     *
     * @var int
     *
     * @ORM\Column(name="position", type="smallint")
     */
    private $position;

    /**
     * @var Album
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Album", inversedBy="songs")
     * @ORM\JoinColumn(name="album_id", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     *
     * @Assert\NotNull()
     */
    protected $album;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    public function getLength(): ?int
    {
        return $this->length;
    }

    public function setLength(int $length): void
    {
        $this->length = $length;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(?int $position): void
    {
        $this->position = $position;
    }

    public function getAlbum(): ?Album
    {
        return $this->album;
    }

    public function setAlbum(Album $album): void
    {
        $this->album = $album;
    }

    /**
     * Set song length from string formatted as "mm:ss"
     *
     * @param string $length
     */
    public function setLengthFromString(string $length): void
    {
        $parts = \explode(':', $length);
        if (2 !== \count($parts)) {
            throw new \RuntimeException('Invalid song length format. Expected format id "mm:ss".');
        }
        $this->length = $parts[0] * 60 + $parts[1];
    }

    /**
     * Returns song length as string formatted as "mm:ss".
     *
     * @return string
     */
    public function getLengthAsString(): string
    {
        return gmdate('i:s', $this->length);
    }
}
