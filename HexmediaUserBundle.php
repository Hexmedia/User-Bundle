<?php

namespace Hexmedia\UserBundle;

use Doctrine\ORM\Events;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class HexmediaUserBundle extends Bundle
{

    public function getParent()
    {
        return "FOSUserBundle";
    }

    /**
     * {@inheritDoc}
     * @see Symfony\Component\HttpKernel\Bundle.Bundle::boot()
     */
    public function boot()
    {
        $em = $this->container->get('doctrine.orm.default_entity_manager');
        $discriminatorMapListener = $this->container->get('hexmedia_user.discriminator');

        $evm = $em->getEventManager();
        $evm->addEventListener(Events::loadClassMetadata, $discriminatorMapListener);

        parent::boot();
    }

}
