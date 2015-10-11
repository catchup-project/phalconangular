<?php

// @todo [phalconbegins][multi modules] register modules here.
// register modules -------------------------------------------------------------------------

$application->registerModules(
  array(
    'admin' => array(
      'namespace' => 'Modules\Companies',
      'className' => 'Modules\Companies\Module',
      'path'      => APP_DIR . '/../modules/companies/Module.php',
    ),
    'backend' => array(
      'namespace' => 'Modules\Companies',
      'className' => 'Modules\Companies\Module',
      'path'      => APP_DIR . '/../modules/companies/Module.php',
    ),
    'frontend'      => array(
      'namespace' => 'Vokuro',
      'className' => 'Vokuro\Module',
      'path'      => APP_DIR . '/../app/Module.php',
    ),
  )
);  /* End register modules --------------------------------------------------------------------*/