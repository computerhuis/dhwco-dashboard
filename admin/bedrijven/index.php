<?php

require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'libs' . DIRECTORY_SEPARATOR . 'bootstrap.php');
security_require_login('ADMIN');

$page_title = 'Bedrijven';
$navigation_menu = 'bedrijven';
include(TEMPLATE_PATH . 'header.php');
include(TEMPLATE_PATH . 'navigation.php');
?>

<div class="container mt-3 bg-light p-4">
    <table id="bedrijven-tabel" class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Naam</th>
            <th>Email</th>
            <th>Postcode</th>
            <th>Inschrijf datum</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<script src="./assets/js/admin/bedrijven/index.js"></script>

<?php include(TEMPLATE_PATH . 'footer.php'); ?>
