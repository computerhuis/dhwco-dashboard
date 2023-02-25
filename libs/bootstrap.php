<?php

require_once('configure.php');
require_once('std.php');
require_once('security.php');
require_once('database.php');

session_start(); // turn on sessions

define("TEMPLATE_PATH", dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'template' . DIRECTORY_SEPARATOR);
define("REPOSITORY_PATH", dirname(__FILE__) . DIRECTORY_SEPARATOR . 'repository' . DIRECTORY_SEPARATOR);
define("MODEL_PATH", dirname(__FILE__) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR);
define("SERVICE_PATH", dirname(__FILE__) . DIRECTORY_SEPARATOR . 'service' . DIRECTORY_SEPARATOR);
define("VALIDATION_PATH", dirname(__FILE__) . DIRECTORY_SEPARATOR . 'validation' . DIRECTORY_SEPARATOR);

$contextRoot = implode('/', array_intersect(explode(DIRECTORY_SEPARATOR, substr(dirname(__FILE__), 0, -5)), explode('/', $_SERVER['SCRIPT_NAME'])));
if (!is_blank($contextRoot) && substr($contextRoot, 0, 1) != '/') {
    $contextRoot = '/' . $contextRoot;
}
define("WWW_ROOT", $contextRoot);
$db = database_connect();

?>
