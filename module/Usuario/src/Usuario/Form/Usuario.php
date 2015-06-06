<?php

namespace Usuario\Form;

use Zend\Form\Form;

class Usuario extends Form {

    public function __construct($name = null) {
        parent::__construct('usuario');

        $this->setAttributes([
            'method' => 'POST',
            'class' => 'form-horizontal',
        ]);

//        $idUsuario = new \Zend\Form\Element\Hidden('idUsuario');
//        $this->add($idUsuario);

        $this->add(
                array(
                    'name'       => 'idUsuario',
                    'type'       => 'Zend\Form\Element\Hidden',
                    'attributes' => array(
                        'id'       => 'idUsuario',
                    )
                )
        );

        $this->add(
                array(
                    'name' => 'cpf',
                    'type' => 'Zend\Form\Element\Text',
                    'options' => array(
                        'label' => 'CPF:',
                    ),
                    'attributes' => array(
                        'id' => 'cpf', 
                        'class' => 'form-control',
//                        'required' => 'required',
                    )
                )
        );

        $this->add(
                array(
                    'name' => 'email',
                    'type' => 'Zend\Form\Element\Email',
                    'options' => array(
                        'label' => 'E-mail:',
                    ),
                    'attributes' => array(
                        'id' => 'email',
                        'class' => 'form-control',
//                        'required' => 'required',
                    )
                )
        );

        $this->add(
                array(
                    'name' => 'login',
                    'type' => 'Zend\Form\Element\Text',
                    'options' => array(
                        'label' => 'Login:',
                    ),
                    'attributes' => array(
                        'id' => 'login',
                        'class' => 'form-control',
//                        'required' => 'required',
                    )
                )
        );

        $this->add(
                array(
                    'name' => 'senha',
                    'type' => 'Zend\Form\Element\Password',
                    'options' => array(
                        'label' => 'Senha:',
                    ),
                    'attributes' => array(
                        'id' => 'senha',
                        'class' => 'form-control',
//                        'required' => 'required',
                    )
                )
        );

        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);

        $this->add(
                [
                    'name' => 'submit',
                    'type' => 'Zend\Form\Element\Submit',
                    'attributes' => [
                        'value' => 'Salvar',
                        'class' => 'btn btn-primary'
                    ]
                ]
        );
    }

}
