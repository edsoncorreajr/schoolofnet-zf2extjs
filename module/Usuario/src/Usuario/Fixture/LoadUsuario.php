<?php

namespace Usuario\Fixture;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Usuario\Entity\Usuario;

class LoadUsuario extends AbstractFixture implements OrderedFixtureInterface {

    public function getOrder() {
        return 1;
    }

    public function load(ObjectManager $manager) {
        $usuario = new Usuario();

        $usuario->setCpf('01457057905')
                ->setLogin('63972010')
                ->setSenha('8gb6397')
                ->setEmail('edsoncjr@hotmail.com');

        $manager->persist($usuario);
        $manager->flush;
    }

}
