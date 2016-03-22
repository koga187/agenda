<?php
/**
 * Created by PhpStorm.
 * User: koga
 * Date: 28/02/16
 * Time: 16:17
 */
namespace Common\Services;

use Common\Services\EntityHydrator;
use Doctrine\ORM\EntityManager;

abstract class AbstractCRUD
{
    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * AbstractCRUD constructor.
     * @param EntityManager $em
     */
    public final function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @param $entityClass
     * @param array $data
     * @return mixed
     */
    public function create($entityClass, array $data)
    {
        $objectHydrated = EntityHydrator::hydrate($entityClass, $data);
        $this->em->persist($objectHydrated);
        $this->em->flush();

        return $objectHydrated;
    }

    /**
     * @param $entityClass
     * @return array
     */
    public function read($entityClass)
    {
        $repo = $this->em->getRepository($entityClass);
        return $repo->findAll();
    }

    /**
     * @param $entityClass
     * @param array $data
     * @return mixed
     * @throws \Doctrine\ORM\ORMException
     */
    public function update($entityClass, array $data)
    {
        $entity = $this->em->find($entityClass, $data['id']);

        $objectHydrated = EntityHydrator::hydrate($entity, $data);

        $this->em->persist($objectHydrated);
        $this->em->flush();

        return $objectHydrated;
    }

    /**
     * @param $entityClass
     * @param array $data
     * @return bool
     * @throws \Doctrine\ORM\ORMException
     */
    public function delete($entityClass, array $data)
    {
        $entity = $this->em->getReference($entityClass, $data['id']);
        $this->em->remove($entity);
        $this->em->flush();

        return true;
    }

    public function logicDelete($entityClass, array $data)
    {
        $entity = $this->em->find($entityClass, $data['id']);
        $entity->setDataDelete(new \DateTime('now'));

        $this->em->persist($entity);
        $this->em->flush();

        return $entity;
    }
}