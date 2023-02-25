<?php
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'libs' . DIRECTORY_SEPARATOR . 'bootstrap.php');

security_require_login('BALIE');

require_once(REPOSITORY_PATH . 'activiteiten.php');
require_once(REPOSITORY_PATH . 'balie.php');

$found = array();
$search = '';
if (is_get_request()) {
    $search = $_GET['search'] ?? '';

    if ($search != '') {
        $found = repository_balie_zoeken($search);
    }
}

if (is_post_request()) {
    $persoon_aanmelden = $_POST['aanmelden'] ?? '';
    $persoon_activiteit = $_POST['activiteit'] ?? '';
    if ($persoon_aanmelden != '' && $persoon_activiteit != '') {
        repository_balie_aanmelden($persoon_aanmelden, $persoon_activiteit);
        redirect_to('/balie/index.php');
    }
}


$activiteiten = repository_actviteiten_actief();

$page_title = 'Aanmelden | Balie';
$navigation_menu = 'balie';
include(TEMPLATE_PATH . '/header.php');
include(TEMPLATE_PATH . '/navigation.php');

?>
<div class="container mt-2">
    <form class="row mb-3 needs-validation" novalidate method="get">
        <div class="col-10">
            <label for="search" class="visually-hidden">Voor en/of achternaam</label>
            <input type="text"
                   class="form-control"
                   id="search"
                   name="search"
                   placeholder="Voor en/of achternaam"
                   value="<?php echo $search; ?>">
        </div>
        <div class="col-auto">
            <button class="btn btn-primary mb-3" type="submit">Zoeken</button>
        </div>
    </form>

    <?php if ($search != '') { ?>
        <form class="mt-2" method="post" action="/balie/aanmelden.php">
            <div class="row mb-3">
                <select name="activiteit" class="form-select" aria-label="Kies activiteit">
                    <option disabled selected>Kies activiteit</option>
                    <?php foreach ($activiteiten as $activiteit) { ?>
                        <option value="<?php echo $activiteit['nr']; ?>"><?php echo $activiteit['naam']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <table class="table table-hover mt-2">
                <thead>
                <tr>
                    <th style="width:1px" scope="col">#</th>
                    <th scope="col">Voornaam</th>
                    <th scope="col">Tussenvoegsel</th>
                    <th scope="col">Achternaam</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($found as $persoon) { ?>
                    <tr>
                        <th scope="row"><?php echo $persoon['nr']; ?></th>
                        <td><?php echo $persoon['voornaam'] ?></td>
                        <td><?php echo $persoon['tussenvoegsels'] ?></td>
                        <td><?php echo $persoon['achternaam'] ?></td>
                        <td>
                            <button type="submit"
                                    name="aanmelden"
                                    class="btn btn-primary"
                                    value="<?php echo $persoon['nr']; ?>">Aanmelden
                            </button>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </form>
    <?php } ?>
</div>
<?php include(TEMPLATE_PATH . 'footer.php'); ?>
