<?php

namespace Usuario\Service;

use Usuario\Entity\Usuario as UsuarioEntity;
use Doctrine\ORM\EntityManager;

class Usuario {
    
    /**
     * @var $em  Doctrine\ORM\EntityManager
     */
    private $em;


    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    /**
     * 
     * @param array $data
     * @return UsuarioEntity
     */
    public function inserir(array $data) {
        /**
         * @var $usuario Usuario\Entity\Usuario
         */
        $usuario = new UsuarioEntity();
        $usuario->setCpf($data['cpf'])
                ->setEmail($data['email'])
                ->setLogin($data['login'])
                ->setSenha($data['senha'])
                ->setActive(true);

        $this->em->persist($usuario);
        $this->em->flush();
        
        return $usuario;
    }

}
