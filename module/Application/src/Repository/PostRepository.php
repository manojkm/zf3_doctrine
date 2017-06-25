<?php
namespace Application\Repository;

use Doctrine\ORM\EntityRepository;
use Application\Entity\Post;

// This is the custom repository class for Post entity.
class PostRepository extends EntityRepository
{
    // Finds all published posts having any tag.
    public function findPostsHavingAnyTag()
    {
        $entityManager = $this->getEntityManager();

        $queryBuilder = $entityManager->createQueryBuilder();

        $queryBuilder->select('p')
            ->from(Post::class, 'p')
            ->join('p.tags', 't')
            ->where('p.status = ?1')
            ->orderBy('p.dateCreated', 'DESC')
            ->setParameter('1', Post::STATUS_PUBLISHED);

        $posts = $queryBuilder->getQuery()->getResult();

        return $posts;
    }


}
