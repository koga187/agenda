<?php
/**
 * Created by PhpStorm.
 * User: koga
 * Date: 28/02/16
 * Time: 16:33
 */

namespace Common\Service;

use Doctrine\Common\Annotations\AnnotationReader;
use ReflectionObject;
use Doctrine\Common\Util\Inflector;

abstract Class EntityHydrator
{
    static public function hydrate($entityClass, array $data)
    {
        $object = new $entityClass;
        $refObj = new ReflectionObject($object);
        $reader = new AnnotationReader();

        foreach ($refObj->getProperties() as $key => $property) {
            //Dynamically create the setter method name depending on the current property name
            $setter     = sprintf('set%s', ucfirst(Inflector::camelize($property->getName())));
            //Read of the specified annotations in the Property Class, which is just $name in our example
            $annotation = $reader->getPropertyAnnotation($property, $entityClass);
            //The contents of the (name) annotation will be used as a key to the data array received from the data source!
            $object->$setter($data[Inflector::tableize($annotation->name)]);
        }

        return $object;
    }
}