<?php
/*
 * Define custom routes. File gets included in the router service definition.
 */
$router = new Phalcon\Mvc\Router();

$router->removeExtraSlashes(true);

$router->setDefaults(array(
  'namespace'  => 'Admin\Controllers',
  'module'     => 'admin',
  'controller' => 'index',
  'action' => 'index'
));

$aDefaults = array(
  'namespace'  => 'Admin\Controllers',
  'module'     => 'admin',
  'controller' => 'index',
  'action'     => 'index',
);

$aDefaultAction = array(
  'namespace'  => 'Admin\Controllers',
  'module'     => 'admin',
  'controller' => 2,
  'action'     => 'index',
);

$aControllerAction = array(
  'namespace'  => 'Admin\Controllers',
  'module'     => 'admin',
  'controller' => 2,
  'action'     => 3,
);


$router->add('/admin/', $aDefaults);



$router->add('/admin/:controller', $aDefaultAction);



$router->add('/admin/:controller/:action', $aControllerAction);




$router->add('/admin/:controller/:action/:params', array(
  'namespace'  => 'Admin\Controllers',
  'module'     => 'admin',
  'controller' => 1,
  'action'     => 2,
  'params'     => 3
));

return $router;
