<?php
/*
 * Define custom routes. File gets included in the router service definition.
 */
$router = new Phalcon\Mvc\Router();

$router->removeExtraSlashes(true);

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

return $router;
