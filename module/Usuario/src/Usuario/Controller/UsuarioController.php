<?php

namespace Usuario\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Usuario\Form\Usuario as UsuarioForm;
use Usuario\Entity\Usuario as UsuarioEntity;
use Usuario\Service\Usuario as UsuarioService;
use Usuario\Form\UsuarioFilter as UsuarioFIlter;

class UsuarioController extends AbstractActionController
{

    /** @var $em  Doctrine\ORM\EntityManager  */
    private $em;
    /** @var $form  Usuario\Form\Usuario  */
    private $form;

    public function __construct()
    {
        $this->form = new UsuarioForm();
        $this->form->setInputFilter(new UsuarioFIlter());
    }

    public function indexAction()
    {

        $listaUsuario = $this->getEm()
                ->getRepository("Usuario\Entity\Usuario")
                ->findAll();

        return new ViewModel(array("data" => $listaUsuario));
    }

    public function adicionarAction()
    {
        $form = $this->form;
        
        $request = $this->getRequest();

        if ($request->isPost()) {
            $form->setData($request->getPost());

            if ($form->isValid()) {
//                $data = $form->getData();

                /** @var $usuarioService Usuario\Service\Usuario */
                $usuarioService = $this->getServiceLocator()->get('UsuarioService');
                $result = $usuarioService->inserir($form->getData());

                if ($result) {
                    return $this->redirect()->toRoute(
                                    'usuario-admin', array('controller' => 'usuarios')
                    );
                }
            }
        }

        return new ViewModel([
            'form' => $form
        ]);
    }

    /**
     * 
     * @return Doctrine\ORM\EntityManager
     */
    public function getEm()
    {
        return $this->getServiceLocator()->get('\Doctrine\ORM\EntityManager');
    }

}
