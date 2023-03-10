<?php

require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'libs' . DIRECTORY_SEPARATOR . 'bootstrap.php');
security_require_login('ADMIN');

require_once(REPOSITORY_PATH . 'personen.php');

$array = array('data' => repository_all_personen());

header('Content-type: application/json');
echo json_encode($array);
?>
