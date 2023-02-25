<?php

require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'libs' . DIRECTORY_SEPARATOR . 'bootstrap.php');
security_require_login('ADMIN');

require_once(REPOSITORY_PATH . 'personen.php');

$page_title = 'Personen';
$navigation_menu = 'personen';
include(TEMPLATE_PATH . 'header.php');
include(TEMPLATE_PATH . 'navigation.php');
?>

<div class="container mt-3 bg-light p-4">
    <table id="peronen-tabel" class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Voorletters</th>
            <th>Tussenvoegsels</th>
            <th>Achternaam</th>
            <th>Email</th>
            <th>Postcode</th>
            <th>Inschrijf datum</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach (repository_all_personen() as $row) {
            echo '<tr>' .
                '<td><a href="./admin/personen/persoon.php?id=' . $row['nr'] . '">' . $row['nr'] . '</a></td>' .
                '<td>' . $row['voorletters'] . '</td>' .
                '<td>' . $row['tussenvoegsels'] . '</td>' .
                '<td>' . $row['achternaam'] . '</td>' .
                '<td><a href="mailto:' . $row['email'] . '">' . $row['email'] . '</a></td>' .
                '<td><a target="_blank" href="https://postcodebijadres.nl/' . $row['postcode'] . '">' . $row['postcode'] . '</a></td>' .
                '<td>' . $row['inschrijf_datum'] . '</td>' .
                '</tr>';
        }
        ?>
        </tbody>
    </table>
</div>

<script src="./assets/js/admin/personen/index.js"></script>


<?php include(TEMPLATE_PATH . 'footer.php'); ?>
