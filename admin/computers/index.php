<?php

require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'libs' . DIRECTORY_SEPARATOR . 'bootstrap.php');
security_require_login('ADMIN');

require_once(REPOSITORY_PATH . 'computers.php');

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
        <?php
        foreach (repository_all_computers() as $row) {
            echo '<tr>' .
                '<td><a href="./admin/computers/computer.php?id=' . $row['nr'] . '">' . $row['nr'] . '</a></td>' .
                '<td>' . $row['fabrikant'] . '</td>' .
                '<td>' . $row['model'] . '</td>' .
                '<td>' . $row['type'] . '</td>' .
                '<td>' . $row['inboek_datum'] . '</td>' .
                '</tr>';
        }
        ?>
        </tbody>
    </table>
</div>

<script src="./assets/js/admin/computers/index.js"></script>


<?php include(TEMPLATE_PATH . 'footer.php'); ?>
