<?php

require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'libs' . DIRECTORY_SEPARATOR . 'bootstrap.php');
security_require_login('ADMIN');

$page_title = 'Computers';
$navigation_menu = 'computers';
include(TEMPLATE_PATH . 'header.php');
include(TEMPLATE_PATH . 'navigation.php');
?>

<div class="container mt-3 bg-light p-4">
    <table id="computers-tabel" class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Fabriekant</th>
            <th>Model</th>
            <th>Type</th>
            <th>Inschrijf datum</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<script src="./assets/js/admin/computers/index.js"></script>

<?php include(TEMPLATE_PATH . 'footer.php'); ?>
