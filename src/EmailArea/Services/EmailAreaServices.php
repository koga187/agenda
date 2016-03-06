<?php
/**
 * Created by PhpStorm.
 * User: koga
 * Date: 05/03/16
 * Time: 16:15
 */

namespace EmailArea\Services;

use Common\Entity\Email;
use Common\Services\AbstractCRUD;

class EmailAreaServices extends AbstractCRUD
{
    public function create(Email $emailEntity, array $data)
    {
        $areaReference = $this->em->find('Common\Entity\Area', $data['idArea']);
        $emailEntity->setNome($data['nome'])
            ->setEmail($data['email'])
            ->setAreaId($areaReference);

        $this->em->persist($emailEntity);
        $this->em->flush();

        return $emailEntity;
    }
}