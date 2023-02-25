<?php
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'libs' . DIRECTORY_SEPARATOR . 'bootstrap.php');

security_logout();
redirect_to('inloggen.php');

?>
