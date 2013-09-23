<?php

namespace Hexmedia\UserBundle\EventListener;

use Doctrine\ORM\Event\LoadClassMetadataEventArgs;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\ORM\Mapping\ClassMetadataInfo;

/**
 * Listens to loadClassMetadata event and sets
 * the discriminator map if needed
 */
class DiscriminatorListener
{
    private $className;

    /**
     * Constructor
     *
     * @param array $discriminatorMap
     */
    public function __construct($className)
    {
        $this->className = $className;
    }

    /**
     * Sets the discriminator map according to the config
     *
     * @param LoadClassMetadataEventArgs $eventArgs
     */
    public function loadClassMetadata(LoadClassMetadataEventArgs $eventArgs)
    {
        $metadata = $eventArgs->getClassMetadata();
        $class = $metadata->getReflectionClass();

        if ($class === null) {
            $class = new \ReflectionClass($metadata->getName());
        }

        if ($class->getName() == "Hexmedia\\UserBundle\\Entity\\User") {
            $reader = new AnnotationReader();
            $discriminatorMap = [];
            $discriminatorMapAnnotation = $reader->getClassAnnotation($class, 'Doctrine\ORM\Mapping\DiscriminatorMap');

            if ($discriminatorMapAnnotation) {
                $discriminatorMap = $discriminatorMapAnnotation->value;
            }

            $discriminatorMap['users'] = $this->className;
            $discriminatorMap['users_base'] = "Hexmedia\\UserBundle\\Entity\\User";

            $metadata->setDiscriminatorColumn(["name" => "type", "length" => 255]);
            $metadata->setInheritanceType(ClassMetadataInfo::INHERITANCE_TYPE_SINGLE_TABLE);
            $metadata->setDiscriminatorMap($discriminatorMap);

        }
    }
}