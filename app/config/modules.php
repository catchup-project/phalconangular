<?php

// @todo [phalconbegins][multi modules] register modules here.
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