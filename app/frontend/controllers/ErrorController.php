<?php

namespace Modules\Frontend\Controllers;

use Bitfalls\Phalcon\ControllerBase;

/**
 * Class ErrorController
 */
class ErrorController extends ControllerBase
{

    public function indexAction()
    {
        die("Hello");
    }

}

