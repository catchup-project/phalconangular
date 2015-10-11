<?php

error_reporting(E_ALL);

try {

    /**
     * Read the configuration
     */
    $config = include __DIR__ . "/../app/config/config.php";

    /**
     * Read auto-loader
     */
    include __DIR__ . "/../app/config/loader.php";

    /**
     * Read services
     */
    include __DIR__ . "/../app/config/services.php";

    /**
     * Handle the request
     */
    $application = new \Phalcon\Mvc\Application();
    $application->setDI($di);

    $application->registerModules(
        array(
            'frontend' => array(
                'className' => 'Frontend\Module',
                'path' => '../app/frontend/Module.php',
            ),
            'admin' => array(
                'className' => 'Admin\Module',
                'path' => '../app/admin/Module.php',
            )
        )
    );

    set_exception_handler('\Bitfalls\Exceptions\Handler::handle');

    echo $application->handle()->getContent();

} catch (PDOException $e) {

  echo "<!DOCTYPE html>\n<html>\n<head>\n";
  echo "<link href='/css/bootstrap.min.css' media='screen' rel='stylesheet' type='text/css' />\n";
  echo "</head>\n";
  echo "<body>\n";
  echo "<div class='jumbotron'>\n";
  echo "<h2>PhalconPDO Exception" . $e->getMessage() . "</h2><br />";
  echo "<strong>TraceAsString:</strong><br />\n";
  echo nl2br(htmlentities($e->getTraceAsString()));
  echo "
    </div>\n\n";
  echo "</body>\n</html>";
  exit;
} catch (Phalcon\Exception $e){

  if (preg_match("/Module (.*) isn't registered/ius", $e->getMessage()) == 1) {
    // caught module is not registered error!
    // @todo [phalconbegins][multi modules] find the way to use error controller.
    header('HTTP/1.0 404 Not Found');
    echo "<!DOCTYPE html>\n<html>\n<head>\n";
    echo "<link href='/css/bootstrap.min.css' media='screen' rel='stylesheet' type='text/css' />\n";
    echo "</head>\n";
    echo "<body>\n";
    echo "<div class='jumbotron'>\n";
    // another error!
    echo "<h1>Module (.*) isn't registered/h1>";
    echo "<h2>" . get_class($e), ": ", $e->getMessage(), "</h2><br />\n";
    //echo " File=", $e->getFile(), "<br />\n";
    //echo " Line=", $e->getLine(), "<br />\n";
    echo "<strong>TraceAsString:</strong><br />\n";
    echo nl2br(htmlentities($e->getTraceAsString()));
    echo "
    </div>\n\n";
    echo "</body>\n</html>";
    exit;
  } else {
    echo "<!DOCTYPE html>\n<html>\n<head>\n";
    echo "<link href='/css/bootstrap.min.css' media='screen' rel='stylesheet' type='text/css' />\n";
    echo "</head>\n";
    echo "<body>\n";
    echo "<div class='jumbotron'>\n";
    echo "<h1>Hellloooow Custom error handler please</h1>";
    echo $e->getMessage(), '<br>';
    echo nl2br(htmlentities($e->getTraceAsString()));
    echo "
    </div>\n\n";
    echo "</body>\n</html>";
  }
}
