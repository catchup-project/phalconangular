<?php
/*
 * Define custom routes. File gets included in the router service definition.
 */
$router = new Phalcon\Mvc\Router();

$router->removeExtraSlashes(true);

$router->setDefaultModule('frontend');
$aDefaults = array(
  'namespace'  => 'Frontend\Controllers',
  'module'     => 'frontend',
  'controller' => 'index',
  'action'     => 'index',
);

$aDefaultAction = array(
  'namespace'  => 'Frontend\Controllers',
  'module'     => 'frontend',
  'controller' => 1,
  'action'     => 'index',
);

$aControllerAction = array(
  'namespace'  => 'Frontend\Controllers',
  'module'     => 'frontend',
  'controller' => 1,
  'action'     => 2,
);


$router->add('/', $aDefaults);
$router->add('/:controller', $aDefaultAction);
$router->add('/:controller/:action', $aControllerAction);
$router->add('/:controller/:action/:params', array(
  'namespace'  => 'Frontend\Controllers',
  'module'     => 'frontend',
  'controller' => 1,
  'action'     => 2,
  'params'     => 3
));

return $router;
