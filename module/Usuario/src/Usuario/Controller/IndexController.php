<?php

namespace Usuario\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController {

    public function indexAction() {
        /**
         * @var $em  Doctrine\ORM\EntityManager
         */
        $em = $this->getServiceLocator()->get('\Doctrine\ORM\EntityManager');

        /** @var $usuariosRepository \Doctrine\ORM\EntityRepository   */
        $usuariosRepository = $em->getRepository("Usuario\Entity\Usuario")
                ->findAll();
//        // FindBy pesquisa campo da Entity e não da tabela no BD
//                   ->findBy(array( 'email' => "rafael.robales@pm.pr.gov.br" ));
//                   ->findByCpf("01457057905");


        return new ViewModel(array("usuarios" => $usuariosRepository));
    }


}
