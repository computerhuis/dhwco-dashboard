<?php
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'libs' . DIRECTORY_SEPARATOR . 'bootstrap.php');

security_require_login();

$page_title = 'Dashboard';
$navigation_menu = 'dashboard';
include(TEMPLATE_PATH . 'header.php');
include(TEMPLATE_PATH . 'navigation.php');
?>


<?php include(TEMPLATE_PATH . 'footer.php'); ?>
