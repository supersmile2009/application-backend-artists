<?php declare(strict_types=1);

namespace App\Repository;

use App\Entity\Artist;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method null|Artist find($id, $lockMode = null, $lockVersion = null)
 * @method null|Artist findOneBy(array $criteria, array $orderBy = null)
 * @method Artist[]    findAll()
 * @method Artist[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArtistRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Artist::class);
    }

    /**
     * @param int $page
     * @param int $perPage
     *
     * @return Artist[]
     */
    public function findPaginated(int $page, int $perPage): array
    {
        return $this->createQueryBuilder('a')
            ->select('a', 'al')
            ->leftJoin('a.albums', 'al')
            ->setFirstResult(($page - 1) * $perPage)
            ->setMaxResults($perPage)
            ->orderBy('a.name', 'ASC')
            ->getQuery()
            ->useQueryCache(true)
            ->getResult();
    }

    public function findByToken(string $token): ?Artist
    {
        return $this->createQueryBuilder('a')
            ->select('a', 'al')
            ->leftJoin('a.albums', 'al')
            ->where('a.token = :token')->setParameter('token', $token)
            ->getQuery()
            ->useQueryCache(true)
            ->getOneOrNullResult();
    }
}
