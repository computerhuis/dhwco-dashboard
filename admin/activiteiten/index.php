<?php

require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'libs' . DIRECTORY_SEPARATOR . 'bootstrap.php');
security_require_login('ADMIN');

$page_title = 'Activiteiten';
$navigation_menu = 'activiteiten';
include(TEMPLATE_PATH . 'header.php');
include(TEMPLATE_PATH . 'navigation.php');
?>

<div class="container mt-3 bg-light p-4">
    <table id="activiteiten-tabel" class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Naam</th>
            <th>Rapportage</th>
            <th>Actief vanaf</th>
            <th>Actief tot</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<script src="./assets/js/admin/activiteiten/index.js"></script>

<?php include(TEMPLATE_PATH . 'footer.php'); ?>
