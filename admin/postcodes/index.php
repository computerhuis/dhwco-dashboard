<?php

require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'libs' . DIRECTORY_SEPARATOR . 'bootstrap.php');
security_require_login('ADMIN');

$page_title = 'Postcodes';
$navigation_menu = 'postcodes';
include(TEMPLATE_PATH . 'header.php');
include(TEMPLATE_PATH . 'navigation.php');
?>

<div class="container mt-3 bg-light p-4">
    <table id="postcodes-tabel" class="table table-hover">
        <thead>
        <tr>
            <th>Postcode</th>
            <th>Huisnummer van</th>
            <th>Huisnummer tot</th>
            <th>Straat</th>
            <th>Buurt</th>
            <th>Wijk</th>
            <th>Plaats</th>
            <th>Provincie</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<script src="./assets/js/admin/postcodes/index.js"></script>

<?php include(TEMPLATE_PATH . 'footer.php'); ?>
