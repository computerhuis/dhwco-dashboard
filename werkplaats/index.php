<?php
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'libs' . DIRECTORY_SEPARATOR . 'bootstrap.php');

security_require_login('WERKPLAATS');

$page_title = 'Werkplaats';
$navigation_menu = 'werkplaats';
include(TEMPLATE_PATH . '/header.php');
include(TEMPLATE_PATH . 'navigation.php');
?>

<?php include(TEMPLATE_PATH . 'footer.php'); ?>
