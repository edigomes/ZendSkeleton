<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

return array(
    'router' => array(
        'routes' => array(
            /*'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '[/:action]',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            'lista' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/lista',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'lista',
                    ),
                ),
            ),
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            /*'application' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/application',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),*/
            'clientes' => array(
                'type' => 'Segment',
                'options' => array(
                    //'route' => '/system[/:table][/:id][/:data]',
                    'route' => '/clientes[/:id]',
                    'constraints' => array(
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Controller\Clientes',
                    ),
                ),
            ),
            'fornecedor' => array(
                'type' => 'Segment',
                'options' => array(
                    //'route' => '/system[/:table][/:id][/:data]',
                    'route' => '/fornecedor[/:id]',
                    'constraints' => array(
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Controller\Fornecedor',
                    ),
                ),
            ),
            'contatofornecedor' => array(
                'type' => 'Segment',
                'options' => array(
                    //'route' => '/system[/:table][/:id][/:data]',
                    'route' => '/contatofornecedor[/:id]',
                    'constraints' => array(
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Controller\ContatoFornecedor',
                    ),
                ),
            ),
            'estoque' => array(
                'type' => 'Segment',
                'options' => array(
                    //'route' => '/system[/:table][/:id][/:data]',
                    'route' => '/estoque[/:id]',
                    'constraints' => array(
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Controller\Estoque',
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'factories' => array(
            'translator' => 'Zend\Mvc\Service\TranslatorServiceFactory',
            'Application\Service\Content' => function($sm){
                $ContentService = new \Application\Service\Content();
                $ContentService->setServiceLocator($sm);
                
                return $ContentService;
            }
        ),
        'invokables' => array(
            'Application\ContentService' => "Application\Service\Content"
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            //'Application\Controller\Index' => 'Application\Controller\IndexController',
            //'Application\Controller\Abstract' => 'Application\Controller\AbstractController',
            'Application\Controller\Clientes' => 'Application\Controller\ClientesController',
            'Application\Controller\Fornecedor' => 'Application\Controller\FornecedorController',
            'Application\Controller\ContatoFornecedor' => 'Application\Controller\ContatoFornecedorController',
            'Application\Controller\Estoque' => 'Application\Controller\EstoqueController'
        ),
    ),
    /*'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    )*/
    // Saída somente em JSON
    'view_manager' => array(//Add this config
        'strategies' => array(
            'ViewJsonStrategy',
        ),   
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
    // Doctrine config
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
            )
        )
    )
    // Fim do Doctrine config
);
