<?php
/*
 * Define custom routes. File gets included in the router service definition.
 */
$router = new Phalcon\Mvc\Router();

$router->removeExtraSlashes(true);

<<<<<<< HEAD
$router->setDefaultModule('frontend');
/*
 *  Example with all possible options:
 * $router->add('/:module/:controller/:action/:params', array(
    'module'     => 1,
    'controller' => 2,
    'action'     => 3,
    'params'     => 4
));
 *
 **/

/*
 * Let's divide the routes up in Core Routes (NameSpace Vokuro) en Modules Routes (Modules\(module name))
 */

/*
 * Core Routes (NameSpace Frontend)
 */
$router->add('/confirm/{code}/{email}', array(
  'namespace'  => 'Frontend\Controllers',
  'module'     => 'frontend',
  'controller' => 'user_control',
  'action'     => 'confirmEmail'
));

$router->add('/notexist', array(
  'namespace'  => 'Frontend\Controllers',
  'module'     => 'frontend',
  'controller' => 'index',
  'action'     => 'notexist'
));

$router->add('/reset-password/{code}/{email}', array(
  'namespace'  => 'Frontend\Controllers',
  'module'     => 'frontend',
  'controller' => 'user_control',
  'action'     => 'resetPassword'
));

$router->add('/users', array(
  'namespace'  => 'Frontend\Controllers',
  'module'     => 'frontend',
  'controller' => 'users',
  'action'     => 'index'
));

$router->add('/users/:action/:params', array(
  'namespace'  => 'Frontend\Controllers',
  'module'     => 'frontend',
  'controller' => 'users',
  'action'     => 1,
  'params'     => 2
));

$router->add('/profiles', array(
  'namespace'  => 'Frontend\Controllers',
  'module'     => 'frontend',
  'controller' => 'profiles',
  'action'     => 'search'
));

$router->add('/profiles/:action/:params', array(
  'namespace'  => 'Frontend\Controllers',
  'module'     => 'frontend',
  'controller' => 'profiles',
  'action'     => 1,
  'params'     => 2
));

$router->add('/permissions', array(
  'namespace'  => 'Frontend\Controllers',
  'module'     => 'frontend',
  'controller' => 'permissions',
  'action'     => 'index'
));


$router->add('/session/:action', array(
  'namespace'  => 'Frontend\Controllers',
  'module'     => 'frontend',
  'controller' => 'session',
  'action'     => 1
));

$router->add('/profiles/:action', array(
  'namespace'  => 'Frontend\Controllers',
  'module'     => 'frontend',
  'controller' => 'profiles',
  'action'     => 1
));

$router->add("/login", array(
  'namespace'  => 'Frontend\Controllers',
  'module'     => 'frontend',
  'controller' => 'users',
  'action'     => 'login',
));

$router->add('/', array(
  'namespace'  => 'Frontend\Controllers',
  'module'     => 'frontend',
  'controller' => 'index',
  'action'     => 'index'
));


$router->add('/admin', array(
  'namespace'  => 'Admin\Controllers',
  'module'     => 'admin',
  'controller' => 'index',
  'action'     => 'index'
));


=======
$sModule = 'frontend';

$router->setDefaults(array(
  'namespace'  => 'Frontend\Controllers',
  'module'     => 'frontend',
  'controller' => 'index',
  'action' => 'index'
));

$router->add('/', array(
  'namespace'  => 'Frontend\Controllers',
  'module'     => 'frontend',
  'controller' => 'index',
  'action'     => 'index',
));

$router->add('/:controller', array(
  'namespace'  => 'Frontend\Controllers',
  'module'     => 'frontend',
  'controller' => 1,
  'action'     => 'index',
));

$router->add('/:controller/:action', array(
  'namespace'  => 'Frontend\Controllers',
  'module'     => 'frontend',
  'controller' => 1,
  'action'     => 2,
));
$router->add('/:controller/:action/:params', array(
  'namespace'  => 'Frontend\Controllers',
  'module'     => 'frontend',
  'controller' => 1,
  'action'     => 2,
  'params'     => 3
));

>>>>>>> upstream/master
return $router;
