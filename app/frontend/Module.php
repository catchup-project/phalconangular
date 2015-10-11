<?php

namespace Frontend;


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
    public function registerServices(DiInterface $di) {
        parent::registerServices($di);
        $view = $di->get('view');
        $view->setVar('bLoadModuleMenu', false);
        $di->set('view', $view);
    }
}