<?php

// @todo [phalconbegins][multi modules] register modules here.
<<<<<<< HEAD
// register modules -------------------------------------------------------------------------
//@todo: Implement APP_DIR .
$application->registerModules(
  array(
    'frontend' => array(
      'namespace' => 'Frontend',
      'className' => 'Frontend\Module',
      'path'      => '../app/frontend/Module.php',
    ),
    'admin'    => array(
      'namespace' => 'Admin',
      'className' => 'Admin\Module',
      'path'      => '../app/admin/Module.php',
    )
  )
); /* End register modules --------------------------------------------------------------------*/
=======
/*
define('APP_PATH', realpath('..') . '/');
define('BASE_DIR', str_replace('\\', '/', dirname(__DIR__)));
define('APP_DIR', BASE_DIR . '/app');
*/
// register modules -------------------------------------------------------------------------

$application->registerModules(
  array(
    'frontend'      => array(
      'namespace' => 'Modules\Frontend',
      'className' => 'Modules\Frontend\Module',
      'path'      => APP_DIR . '/frontend/Module.php',
    ),
    'backend' => array(
      'namespace' => 'Modules\Backend',
      'className' => 'Modules\Backend\Module',
      'path'      => APP_DIR . '/backend/Module.php',
    ),
  )
);  /* End register modules --------------------------------------------------------------------*/
>>>>>>> upstream/master
