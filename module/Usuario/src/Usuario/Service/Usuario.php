<?php

namespace Usuario\Service;

use Usuario\Entity\Usuario as UsuarioEntity;
use Doctrine\ORM\EntityManager;
use Zend\Stdlib\Hydrator\ClassMethods;

class Usuario
{

    /** @var $em  Doctrine\ORM\EntityManager */
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * 
     * @param array $data
     * @return UsuarioEntity
     */
    public function inserir(array $data)
    {
        /** @var $usuario Usuario\Entity\Usuario  */
        $usuario = new UsuarioEntity();
        (new ClassMethods)->hydrate($data, $usuario);

        $this->em->persist($usuario);
        $this->em->flush();

        return $usuario;
    }

    public function update(array $data)
    {
        /** @var $usuario Usuario\Entity\Usuario  */
        $usuario = $this->em->getReference('Usuario\Entity\Usuario', $data['idusuario']);
        
        (new ClassMethods)->hydrate($data, $usuario);
        $usuario->setIdUsuario($data['idusuario']);
        $usuario->setRegtime(new \DateTime("now"));

        $this->em->persist($usuario);
        $this->em->flush();

        return $usuario;
    }

    public function delete($id)
    {
        /** @var $usuario Usuario\Entity\Usuario  */
        $usuario = $this->em->getReference("Usuario\Entity\Usuario", $id);

        $this->em->remove($usuario);
        $this->em->flush();

        return $id;
    }

}
