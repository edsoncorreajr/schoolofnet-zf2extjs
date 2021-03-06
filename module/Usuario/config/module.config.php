<?php

namespace Usuario;

return array(
    'router' => array(
        'routes' => array(
            'usuario-home' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/usuario',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Usuario\Controller',
                        'controller' => 'Index',
                        'action' => 'index',
                    ),
                ),
            ),
            'usuario-admin' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/admin/[:controller[/][:action[/][:id]]]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Usuario\Controller',
                        'controller' => 'usuarios',
                        'action' => 'index',
                    ),
                    'constraints' => array(
                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*'
                        
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Usuario\Controller\Index'      => 'Usuario\Controller\IndexController',
            'Usuario\Controller\Usuarios'   => 'Usuario\Controller\UsuarioController'
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'usuario/index/index' => __DIR__ . '/../view/usuario/index/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                )
            ),

            'configuration' => array(
                        'orm_default' => array(
                            'metadata_cache' => 'array',
                            'query_cache' => 'array',
                            'result_cache' => 'array',
                            'hydration_cache' => 'array',
                            'generate_proxies' => true,
                            'proxy_dir' => 'data/DoctrineORMModule/Proxy',
                            'proxy_namespace' => 'DoctrineORMModule\Proxy',
                        ),
                    ),
        ),
    ),
    'data-fixture' => array(
        __NAMESPACE__ . '_fixture' => __DIR__ . '/../src/' . __NAMESPACE__ . '/Fixture',
    ),
);
