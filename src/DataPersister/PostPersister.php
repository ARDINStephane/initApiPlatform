<?php

namespace App\DataPersister;

use ApiPlatform\Core\DataPersister\DataPersisterInterface;
use App\Entity\Post;
use Doctrine\ORM\EntityManagerInterface;

class PostPersister implements DataPersisterInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(
        EntityManagerInterface $em
    )
    {
        $this->em = $em;
    }

    /**
     * @inheritDoc
     */
    public function supports($data): bool
    {
        return $data instanceof Post;
    }

    /**
     * @inheritDoc
     */
    public function persist($data)
    {
        $data->setCreatedAt(new \DateTime());

        $this->em->persist($data);
        $this->em->flush();
    }

    /**
     * @inheritDoc
     */
    public function remove($data)
    {
        $this->em->remove();
        $this->em->flush();
    }
}