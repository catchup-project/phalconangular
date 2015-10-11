<?php

namespace Modules\Frontend;


use Bitfalls\Phalcon\ModuleConfig;
use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\DiInterface;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Db\Adapter\Pdo\Mysql as MySQLAdapter;

class Module extends ModuleConfig
{
    /**
     * @param \Phalcon\DiInterface $di
     */
<<<<<<< HEAD
    public function registerServices(\Phalcon\DiInterface $di = null) {
=======
    public function registerServices(DiInterface $di) {
>>>>>>> upstream/master
        parent::registerServices($di);
        $view = $di->get('view');
        $view->setVar('bLoadModuleMenu', false);
        $di->set('view', $view);
    }
}