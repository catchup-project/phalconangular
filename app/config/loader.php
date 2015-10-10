<?php

include_once '../vendor/autoload.php';

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
  array(
    $config->application->controllersDir,
    $config->application->modelsDir,
    $config->application->libraryDir,
    $config->application->pluginsDir,
    $config->application->logDir,
  )
)->register(); /* End Registering Directories */

/**
 * register namespaces
 */
$loader->registerNamespaces(
  array(
    'Frontend\Controllers' => '../app/frontend/controllers/',
    'Frontend\Models'      => '../app/frontend/models/',
    'Admin\Controllers'    => '../app/admin/controllers/',
    'Admin\Models'         => '../app/admin/models/',
    'Libraries'            => $config->application->libraryDir
  )
)->register(); /* End Registering Namespaces */