<?php declare(strict_types=1);

namespace App\Repository;

use App\Entity\Album;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method null|Album find($id, $lockMode = null, $lockVersion = null)
 * @method null|Album findOneBy(array $criteria, array $orderBy = null)
 * @method Album[]    findAll()
 * @method Album[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AlbumRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Album::class);
    }

    public function findByToken(string $token): ?Album
    {
        return $this->createQueryBuilder('a')
            ->select('a', 's')
            ->leftJoin('a.songs', 's')
            ->where('a.token = :token')->setParameter('token', $token)
            ->orderBy('s.position', 'ASC')
            ->getQuery()
            ->useQueryCache(true)
            ->getOneOrNullResult();
    }
}
