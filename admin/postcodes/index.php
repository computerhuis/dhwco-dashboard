<?php

require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'libs' . DIRECTORY_SEPARATOR . 'bootstrap.php');
security_require_login('ADMIN');

//require_once(REPOSITORY_PATH . 'postcodes.php');

$page_title = 'Postcodes';
$navigation_menu = 'postcodes';
include(TEMPLATE_PATH . 'header.php');
include(TEMPLATE_PATH . 'navigation.php');
?>

<div class="container mt-3 bg-light p-4">
    Postcodes
</div>

<?php include(TEMPLATE_PATH . 'footer.php'); ?>
