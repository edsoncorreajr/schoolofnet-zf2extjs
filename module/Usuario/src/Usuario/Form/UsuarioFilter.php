<?php

namespace Usuario\Form;

use Zend\InputFilter\InputFilter;

class UsuarioFilter extends InputFilter
{

    public function __construct()
    {
        $this->add(
                [
                    'name'       => 'cpf',
                    'required'   => true,
                    'filters'    => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim'),
                    ),
                    'validators' => [
                        [
                            'name'    => 'NotEmpty',
                            'options' => [
                                'messages' => array(
                                    'isEmpty' => "O campo não pode estar em branco."
                                )
                            ]
                        ],
                        [
                            'name'    => 'Zend\Validator\StringLength',
                            'options' => [
                                'min'      => 11,
                                'max'      => 11,
                                'messages' => [
                                    \Zend\Validator\StringLength::INVALID   => 'Preenchimento inadequado.',
                                    \Zend\Validator\StringLength::TOO_LONG  => 'Informe apenas os digitos do CPF (11 caracteres)',
                                    \Zend\Validator\StringLength::TOO_SHORT => 'Informe apenas os digitos do CPF (11 caracteres)'
                                ]
                            ],
                        ],
                    ]
        ]);

        $this->add(
                [
                    'name'       => 'email',
                    'required'   => true,
                    'filters'    => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim'),
                    ),
                    'validators' => [
                        [
                            'name'    => 'NotEmpty',
                            'options' => [
                                'messages' => array(
                                    'isEmpty' => "O campo não pode estar em branco."
                                )
                            ]
                        ],
                        [
                            'name'    => 'EmailAddress',
                            'options' => [
                                'domain'   => false,
                                'messages' => [
                                    \Zend\Validator\EmailAddress::INVALID => "E-mail invalido",
                                ]
                            ]
                        ],
                        [
                            'name'    => 'Zend\Validator\StringLength',
                            'options' => [
                                'min'      => 6,
                                'max'      => 100,
                                'messages' => [
                                    \Zend\Validator\StringLength::TOO_LONG  => 'E-mail deve ter no minimo 6 carecteres.',
                                    \Zend\Validator\StringLength::TOO_SHORT => 'E-mail deve ter no maximo 100 carecteres.'
                                ]
                            ],
                        ],
                    ]
        ]);

        $this->add(
                [
                    'name'       => 'login',
                    'required'   => true,
                    'filters'    => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim'),
                    ),
                    'validators' => [
                        [
                            'name'    => 'NotEmpty',
                            'options' => [
                                'messages' => array(
                                    'isEmpty' => "O login não pode estar em branco."
                                )
                            ]
                        ],
                        [
                            'name'    => 'Zend\Validator\StringLength',
                            'options' => [
                                'min'      => 6,
                                'max'      => 10,
                                'messages' => [
                                    \Zend\Validator\StringLength::TOO_LONG  => 'Login (RG) deve ter no minimo 6 carecteres - apenas digitos',
                                    \Zend\Validator\StringLength::TOO_SHORT => 'Login (RG) deve ter no maximo 10 carecteres - apenas digitos'
                                ]
                            ],
                        ],
                    ]
        ]);

        $this->add(
                [
                    'name'       => 'senha',
                    'required'   => true,
                    'filters'    => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim'),
                    ),
                    'validators' => [
                        [
                            'name'    => 'NotEmpty',
                            'options' => [
                                'messages' => array(
                                    'isEmpty' => "Senha não pode estar em branco."
                                )
                            ]
                        ],
                        [
                            'name'    => 'Zend\Validator\StringLength',
                            'options' => [
                                'min'      => 5,
                                'max'      => 20,
                                'messages' => [
                                    \Zend\Validator\StringLength::TOO_LONG  => 'Senha deve ter no minimo 5 carecteres',
                                    \Zend\Validator\StringLength::TOO_SHORT => 'Senha deve ter no maximo 20 carecteres'
                                ]
                            ],
                        ],
                    ]
        ]);
    }

}
