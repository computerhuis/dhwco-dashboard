<?php

require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'libs' . DIRECTORY_SEPARATOR . 'bootstrap.php');
security_require_login('ADMIN');

require_once(REPOSITORY_PATH . 'bedrijven.php');

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
        <?php
        foreach (repository_all_bedrijven() as $row) {
            echo '<tr>' .
                '<td><a href="./admin/bedrijven/bedrijf.php?id=' . $row['nr'] . '">' . $row['nr'] . '</a></td>' .
                '<td>' . $row['naam'] . '</td>' .
                '<td><a href="mailto:' . $row['email'] . '">' . $row['email'] . '</a></td>' .
                '<td><a target="_blank" href="https://postcodebijadres.nl/' . $row['postcode'] . '">' . $row['postcode'] . '</a></td>' .
                '<td>' . $row['inschrijf_datum'] . '</td>' .
                '</tr>';
        }
        ?>
        </tbody>
    </table>
</div>

<script src="./assets/js/admin/bedrijven/index.js"></script>


<?php include(TEMPLATE_PATH . 'footer.php'); ?>
