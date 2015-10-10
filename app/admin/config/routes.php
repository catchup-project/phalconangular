<?php

/**
 * This file can be used to register custom routes for this module
 */


/*
 * Define custom routes. File gets included in the router service definition.
 */
$router = new Phalcon\Mvc\Router();

$router->removeExtraSlashes(true);


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
 * Admin Routes (NameSpace Frontend)
 */
$router->add('/admin/:controller', array(
  'namespace'  => 'Admin\Controllers',
  'module' => 'admin',
  'controller' => 1,
  'action' => 'index',
));

$router->add('/admin/:controller/:action', array(
  'namespace'  => 'Admin\Controllers',
  'module' => 'admin',
  'controller' => 1,
  'action' => 2,
));

$router->add('/admin/:controller/:action/:params', array(
  'namespace'  => 'Admin\Controllers',
  'module' => 'admin',
  'controller' => 1,
  'action' => 2,
  'params' => 3
));

$router->add('/admin/roles/upsert', array(
  'namespace'  => 'Admin\Controllers',
  'module'     => 'admin',
  'controller' => 'roles',
  'action'     => 'upsert'
));

$router->add('/admin/roles/list', array(
    'namespace'  => 'Admin\Controllers',
    'module'     => 'admin',
    'controller' => 'roles',
    'action'     => 'list'
));

$router->add('/admin/contacts/upsert', array(
  'namespace'  => 'Admin\Controllers',
  'module'     => 'admin',
  'controller' => 'contacts',
  'action'     => 'upsert'
));

$router->add('/admin/contacts/list', array(
  'namespace'  => 'Admin\Controllers',
  'module'     => 'admin',
  'controller' => 'contacts',
  'action'     => 'list'
));

$router->add('/admin/users/upsert', array(
  'namespace'  => 'Admin\Controllers',
  'module'     => 'admin',
  'controller' => 'users',
  'action'     => 'upsert'
));

$router->add('/admin/users/list', array(
  'namespace'  => 'Admin\Controllers',
  'module'     => 'admin',
  'controller' => 'users',
  'action'     => 'list'
));

$router->add('/admin', array(
  'namespace'  => 'Admin\Controllers',
  'module'     => 'admin',
  'controller' => 'index',
  'action'     => 'index'
));


return $router;