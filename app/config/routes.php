<?php
/*
 * Define custom routes. File gets included in the router service definition.
 */
$router = new Phalcon\Mvc\Router();

$router->removeExtraSlashes(true);

$router->setDefaultModule('frontend');

$sModule = 'frontend';

$router->setDefaults(array(
  'namespace'  => 'Frontend\Controllers',
  'module'     => 'frontend',
  'controller' => 'index',
  'action' => 'index'
));



$aDefaults = array(
  'namespace'  => 'Frontend\Controllers',
  'module'     => $sModule,
  'controller' => 'index',
  'action'     => 'index',
);

$aDefaultAction = array(
  'namespace'  => 'Frontend\Controllers',
  'module'     => $sModule,
  'controller' => 1,
  'action'     => 'index',
);

$aControllerAction = array(
  'namespace'  => 'Frontend\Controllers',
  'module'     => $sModule,
  'controller' => 1,
  'action'     => 2,
);

$router->add('/:controller/:action', array(
  'namespace'  => 'Frontend\Controllers',
  'module'     => 'frontend',
  'controller' => 1,
  'action'     => 2,
));

$router->add('/' . $sModule, $aDefaults);
$router->add('/' . $sModule . '/:controller', $aDefaultAction);
$router->add('/' . $sModule . '/:controller/:action', $aControllerAction);
$router->add('/' . $sModule . '/:controller/:action/:params', array(
  'module'     => $sModule,
  'controller' => 1,
  'action'     => 2,
  'params'     => 3
));

return $router;
