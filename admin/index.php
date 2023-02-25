<?php

require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'libs' . DIRECTORY_SEPARATOR . 'bootstrap.php');
security_require_login('ADMIN');

require_once(REPOSITORY_PATH . 'gebruikers.php');

$page_title = 'Admin';
$navigation_menu = 'admin';
include(TEMPLATE_PATH . 'header.php');
include(TEMPLATE_PATH . 'navigation.php');
?>

<div class="container mt-3">

    <form>
        <table class="table table-hover">
            <thead>
            <tr>
                <th style="width:1px" scope="col">#</th>
                <th scope="col">Naam</th>
                <th scope="col">Lid sinds</th>
                <th style="width:1px" scope="col"></th>
                <th style="width:1px">Werkplaats</th>
                <th style="width:1px">Balie</th>
                <th style="width:1px">Educatie</th>
                <th style="width:1px">Monitor</th>
                <th style="width:1px">Administrator</th>
                <th style="width:1px"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach (repository_gebruikers() as $gebruiker) { ?>
                <tr>
                    <th scope="row"><?php echo $gebruiker['nr'] ?></th>
                    <td><?php
                        echo $gebruiker['voornaam'];
                        if (isset($gebruiker['tussenvoegels']) && !is_blank($gebruiker['tussenvoegels'])) {
                            echo ' ' . $gebruiker['tussenvoegels'];
                        }
                        echo ' ' . $gebruiker['achternaam'];
                        ?></td>
                    <td><?php echo date("d-m-Y", strtotime($gebruiker['inschrijf_datum'])); ?></td>
                    <td>
                        <button type="button" class="btn btn-primary"
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip"
                                title="Stel wachtwoord opnieuw in">
                            <i class="bi bi-unlock"></i>
                        </button>
                    </td>
                    <td>
                        <?php if (security_has_role('WERKPLAATS')) { ?>
                            <button type="button" class="btn btn-primary"><i class="bi bi-check2-square"></i></button>
                        <?php } else { ?>
                            <button type="button" class="btn btn-primary"><i class="bi bi-square"></i></button>
                        <?php } ?>
                    </td>
                    <td>
                        <?php if (security_has_role('BALIE')) { ?>
                            <button type="button" class="btn btn-primary"><i class="bi bi-check2-square"></i></button>
                        <?php } else { ?>
                            <button type="button" class="btn btn-primary"><i class="bi bi-square"></i></button>
                        <?php } ?>
                    </td>
                    <td>
                        <?php if (security_has_role('EDUCATIE')) { ?>
                            <button type="button" class="btn btn-primary"><i class="bi bi-check2-square"></i></button>
                        <?php } else { ?>
                            <button type="button" class="btn btn-primary"><i class="bi bi-square"></i></button>
                        <?php } ?>
                    </td>
                    <td>
                        <?php if (security_has_role('MONITOR')) { ?>
                            <button type="button" class="btn btn-primary"><i class="bi bi-check2-square"></i></button>
                        <?php } else { ?>
                            <button type="button" class="btn btn-primary"><i class="bi bi-square"></i></button>
                        <?php } ?>
                    </td>
                    <td>
                        <?php if (security_has_role('ADMIN')) { ?>
                            <button type="button" class="btn btn-primary"><i class="bi bi-check2-square"></i></button>
                        <?php } else { ?>
                            <button type="button" class="btn btn-primary"><i class="bi bi-square"></i></button>
                        <?php } ?>
                    </td>
                    <td>
                        <button type="button"
                                class="btn btn-primary"
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip"
                                title="Verwijder account">
                            <i class="bi bi-trash3"></i>
                        </button>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

    </form>
</div>

<?php include(TEMPLATE_PATH . 'footer.php'); ?>
