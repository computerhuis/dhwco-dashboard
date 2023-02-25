<?php

require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'libs' . DIRECTORY_SEPARATOR . 'bootstrap.php');

security_require_login('BALIE');

require_once(REPOSITORY_PATH . 'activiteiten.php');
require_once(REPOSITORY_PATH . 'balie.php');
require_once(TEMPLATE_PATH . 'fragments.php');

$aangemelden = array();
if (security_has_role('ADMIN')) {
    $datum = $_GET['datum'] ?? '';
    if ($datum != '') {
        $aangemelden = repository_balie_aanwezigen($datum);
    } else {
        $aangemelden = repository_balie_alle_aanwezigen();
    }
}

$page_title = 'Balie';
$navigation_menu = 'balie';
include(TEMPLATE_PATH . 'header.php');
include(TEMPLATE_PATH . 'navigation.php');

?>
<div class="container pt-3">

    <form method="get">
        <div class="row">
            <div class="col-5">
                <a class="btn btn-primary" aria-current="page" href="./balie/aanmelden.php">Aanmelden</a>
            </div>
            <div class="col-4"></div>
            <?php if (security_has_role('ADMIN')) { ?>
                <div class="col-2">
                    <input name="datum" class="form-control" type="date" value="<?php echo $datum ?>">
                </div>
                <div class="col-1">
                    <button class="btn btn-outline-primary" type="submit">Zoeken</button>
                </div>
            <?php } ?>
        </div>
    </form>

    <form class="mt-3" method="post" action="/balie/index.php">
        <input name="datum" type="hidden" value="<?php echo $datum ?>">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Persoon</th>
                <th scope="col">Activiteit</th>
                <th scope="col">Datum</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($aangemelden as $gebruiker) { ?>
                <tr>
                    <td><?php echo $gebruiker->volledig_naam() ?></td>
                    <td><?php echo $gebruiker->activiteit; ?></td>
                    <td><?php echo $gebruiker->datum; ?></td>
                    <td>
                        <a href="<?php echo './personen/persoon.php?id=' . $gebruiker->persoon_nr ?>"
                           class="btn btn-primary"
                           data-bs-toggle="tooltip"
                           data-bs-placement="top"
                           data-bs-custom-class="custom-tooltip"
                           title="Bekijk hier de gegevens van de persoon">
                            <i class="bi bi-info-circle"></i>
                        </a>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary"
                                data-bs-toggle="modal"
                                data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip"
                                data-bs-target="#balie-verwijder-<?php echo $gebruiker->persoon_nr; ?>"
                                title="Verwijder deze activiteit">
                            <i class="bi bi-trash"></i>
                        </button>
                        <?php fragment_sure('balie-verwijder-' . $gebruiker->persoon_nr,
                            'Weet u zeker dat u de actieviteit "' . $gebruiker->activiteit . '" voor "' .
                            $gebruiker->volledig_naam()
                            . '" wilt verwijderen?',
                            'balie-verwijder',
                            $gebruiker->persoon_nr) ?>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </form>
</div>

<?php include(TEMPLATE_PATH . 'footer.php'); ?>
