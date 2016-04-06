<?php
/**
 * Created by PhpStorm.
 * User: koga
 * Date: 05/03/16
 * Time: 16:00
 */

namespace Area\Services;


use Common\Services\AbstractCRUD;

class AreaService extends AbstractCRUD
{
    public function getAreaAndEmailsByAreaId($idArea)
    {
        $repository = $this->em->getRepository('Common\Entity\Area');
        $arrayAreas = $repository->getAreaAndEmailsByAreaId($idArea);

        return $arrayAreas;
    }
}