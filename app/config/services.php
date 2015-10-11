<?php

use Phalcon\DI\FactoryDefault,
<<<<<<< HEAD
    Phalcon\Mvc\View,
    Phalcon\Mvc\Url as UrlResolver,
    Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter,
    Phalcon\Mvc\View\Engine\Volt as VoltEngine,
    Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter,
    Phalcon\Session\Adapter\Files as SessionAdapter;
=======
  Phalcon\Mvc\View,
  Bitfalls\Phalcon\Security,
  Phalcon\Mvc\Url as UrlResolver,
  Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter,
  Phalcon\Mvc\View\Engine\Volt as VoltEngine,
  Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter,
  Phalcon\Session\Adapter\Files as SessionAdapter;
>>>>>>> upstream/master

/**
 * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
 */
$di = new FactoryDefault();

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->set('url', function () use ($config) {
  $url = new UrlResolver();
  $url->setBaseUri($config->application->baseUri);

  return $url;
}, true);

/**
 * Setting up the view component
 */
$di->set('view', function () use ($config) {

  $view = new View();

  $view->setLayoutsDir($config->application->viewsDir . 'layouts/');
  $view->setLayout('main');

  $view->registerEngines(array(
    '.volt'  => function ($view, $di) use ($config) {

      $volt = new VoltEngine($view, $di);

      $volt->setOptions(array(
        'compiledPath'      => $config->application->cacheDir,
        'compiledSeparator' => '_'
      ));

      return $volt;
    },
    '.phtml' => 'Phalcon\Mvc\View\Engine\Php'
  ));

  return $view;
}, true);

/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->set('db', function () use ($config) {
  $dbAdapter = new DbAdapter(array(
    'host'     => $config->database->host,
    'username' => $config->database->username,
    'password' => $config->database->password,
    'dbname'   => $config->database->dbname
  ));
  $dbAdapter->execute('SET NAMES utf8');

  return $dbAdapter;
});

/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->set('modelsMetadata', function () use ($config) {
  return new MetaDataAdapter();
});

/**
 * Start the session the first time some component request the session service
 */
$di->set('session', function () {
  $session = new SessionAdapter();
  $session->start();

  return $session;
});

<<<<<<< HEAD

/**
 * Dispatcher use a default namespace
 */
$di->set('dispatcher', function () use ($di) {

    $eventsManager = $di->getShared('eventsManager');

  $security = new Bitfalls\Phalcon\Security($di);

    /**
     * We listen for events in the dispatcher using the Security plugin
     */
    $eventsManager->attach('dispatch', $security);

    $dispatcher = new Phalcon\Mvc\Dispatcher();
  	$dispatcher->setDefaultNamespace('Frontend\Controllers');
    $dispatcher->setEventsManager($eventsManager);
=======
$di->set('cookies', function () {
  $oCookies = new \Phalcon\Http\Response\Cookies();
>>>>>>> upstream/master

  return $oCookies;
});

<<<<<<< HEAD

/**
 * add router support.
 */
$di->set('router', function () {
  $router = require __DIR__ . '/routes.php';

  $sFilePath = __DIR__ . '/../admin/config/routes.php';
  if (is_readable($sFilePath)) {
    include_once $sFilePath;
  }

  /*
  $sFilePath = __DIR__ . '/../frontend/config/routes.php';
  if (is_readable($sFilePath)) {
    include_once $sFilePath;
  }
  */

  return $router;
}); /* End the Router Support */



=======
/**
 * Dispatcher use a default namespace
 */
$di->set('dispatcher', function () {
  $dispatcher = new Dispatcher();
  $dispatcher->setDefaultNamespace('Vokuro\Controllers');
  return $dispatcher;
});



$di->set('dispatcher', function () use ($di) {

  $eventsManager = $di->getShared('eventsManager');

  $security = new Security($di);

  /**
   * We listen for events in the dispatcher using the Security plugin
   */
  $eventsManager->attach('dispatch', $security);

  $dispatcher = new Phalcon\Mvc\Dispatcher();
  $dispatcher->setDefaultNamespace('Vokuro\Controllers');
  $dispatcher->setEventsManager($eventsManager);

  return $dispatcher;
});


/**
 * add router support.
 */
$di->set('router', function () {
  $router = require __DIR__ . '/routes.php';

  $sFilePath = __DIR__ . '/../backend/config/routes.php';
  if (is_readable($sFilePath)) {
    include_once $sFilePath;
  }
  /*
  $sFilePath = __DIR__ . '/../frontend/config/routes.php';
  if (is_readable($sFilePath)) {
    include_once $sFilePath;
  }
  */
  $router->add('/', array(
    'namespace'  => 'Modules\Frontend\Controllers',
    'module'     => 'frontend',
    'controller' => 'index',
    'action'     => 'index',
  ));

  $router->add('/users/login', array(
    'namespace'  => 'Modules\Frontend\Controllers',
    'module'     => 'frontend',
    'controller' => 'users',
    'action'     => 'login',
  ));

  $router->add('/users/logout', array(
    'namespace'  => 'Modules\Frontend\Controllers',
    'module'     => 'frontend',
    'controller' => 'users',
    'action'     => 'logout',
  ));

  $router->add('/users/myaccount', array(
    'namespace'  => 'Modules\Frontend\Controllers',
    'module'     => 'frontend',
    'controller' => 'users',
    'action'     => 'myaccount',
  ));

  $router->setDefaultModule('frontend');
  return $router;
}); /* End the Router Support */
>>>>>>> upstream/master

$aServices = array(
  // Generic
  'contacts',
  'users',
  'roles',
  'mailer',
  'tag',
  'geo',
  'address',

  // App specific
  'orders',
  'product',
  'sku');

foreach ($aServices as $sService) {
  $di->setShared($sService . 'Service', function () use ($sService) {
    $sClassName = '\Services\\' . ucfirst($sService) . 'Service';

    return new $sClassName();
  });
}

$di->setShared('mailer', function () use ($di) {
  \Bitfalls\Mailer\Mailer::setDefaultSender('info@tekapo.co');
  $m = new \Bitfalls\Mailer\Mailer($di->get('mailerService'));

  return $m->setDefaultBccActive(false);
});

$di->setShared('fileManager', function () use ($di) {
  return new \Bitfalls\Utilities\FileManager();
});

$di->setShared('config', $config);
$di->setShared('baseUri', function () use ($config) {
  $sBaseUri = $config->application->baseUri;
  if (strpos($sBaseUri, 'http://')) {
    $sBaseUri = str_replace('http://', '', $sBaseUri);
  }
  if (strpos($sBaseUri, 'https://')) {
    $sBaseUri = str_replace('https://', '', $sBaseUri);
  }

  return 'http://' . trim($sBaseUri, '/');
});