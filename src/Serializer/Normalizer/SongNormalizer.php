<?php declare(strict_types=1);

namespace App\Serializer\Normalizer;

use App\Entity\Song;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class SongNormalizer implements NormalizerInterface
{
    /**
     * {@inheritdoc}
     */
    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof Song;
    }

    /**
     * {@inheritdoc}
     * @param Song $object
     */
    public function normalize($object, $format = null, array $context = array())
    {
        if (true === \in_array('album_show', $context['groups'], true)) {
            return [
                'title' => $object->getId(),
                'length' => $object->getLengthAsString(),
            ];
        }

        return [];
    }
}
