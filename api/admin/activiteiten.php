<?php

require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'libs' . DIRECTORY_SEPARATOR . 'bootstrap.php');
security_require_login('ADMIN');

require_once(REPOSITORY_PATH . 'activiteiten.php');

$array = array('data' => repository_actviteiten_all());

header('Content-type: application/json');
echo json_encode($array);

