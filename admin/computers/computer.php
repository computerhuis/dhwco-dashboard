<?php

require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'libs' . DIRECTORY_SEPARATOR . 'bootstrap.php');

security_require_login('ADMIN');

require_once(REPOSITORY_PATH . 'computers.php');

$page_title = 'Computers';
$navigation_menu = 'Computer';
include(TEMPLATE_PATH . 'header.php');
include(TEMPLATE_PATH . 'navigation.php');

$computer = repository_computer($_GET["id"]);
?>
<div class="container mt-3 bg-light p-4">
    <form>
        <h1>Details van Computer</h1>
        <hr/>
        <div class="row mt-1">
            <label class="col-4 col-form-label" for="eigenaar">Eigenaar:</label>
            <div class="col-8">
                <a href="<?php echo "./admin/personen/persoon.php?id=" . $computer['persoon_nr']; ?>"><?php echo $computer['voornaam'] . " " . $computer['tussenvoegsels'] . " " . $computer['achternaam']; ?></a>
            </div>
        </div>
        <div class="row mt-1">
            <label class="col-4 col-form-label" for="gedoneerd">Gedoneerd door:</label>
            <div class="col-8">
                <a href="<?php echo "./admin/bedrijven/bedrijf.php?id=" . $computer['bedrijf_nr']; ?>"><?php echo $computer['bedrijfsnaam']; ?></a>
            </div>
        </div>

        <div class="row mt-1">
            <label class="col-4 col-form-label" for="type">Type:</label>
            <div class="col-8">
                <select class="form-select">
                    <option <?php if ($computer['type'] == 'desktop') echo 'selected'; ?> value="desktop">Desktop
                    </option>
                    <option <?php if ($computer['type'] == 'laptop') echo 'selected'; ?> value="laptop">Laptop</option>
                </select>
            </div>
        </div>
        <div class="row">
            <label class="col-4 col-form-label" for="nr">nummer:</label>
            <div class="col-8">
                <input class="form-control" id="nr" disabled value="<?php echo $computer['nr']; ?>">
            </div>
        </div>
        <div class="row mt-1">
            <label class="col-4 col-form-label" for="inboek_datum">Inboek datum:</label>
            <div class="col-8">
                <input class="form-control" id="inboek_datum" type="datetime-local" disabled
                       value="<?php echo $computer['inboek_datum']; ?>">
            </div>
        </div>
        <div class="row mt-1">
            <label class="col-4 col-form-label" for="fabrikant">fabrikant:</label>
            <div class="col-8">
                <input class="form-control" id="fabrikant" value="<?php echo $computer['fabrikant']; ?>">
            </div>
        </div>
        <div class="row mt-1">
            <label class="col-4 col-form-label" for="model">model:</label>
            <div class="col-8">
                <input class="form-control" id="model" value="<?php echo $computer['model']; ?>">
            </div>
        </div>
        <div class="row mt-1">
            <label class="col-4 col-form-label" for="uitboek_datum">Uitboek datum:</label>
            <div class="col-8">
                <input class="form-control" id="uitboek_datum" type="datetime-local"
                       value="<?php echo $computer['uitboek_datum']; ?>">
            </div>
        </div>
        <hr/>
        <div class="row mt-1">
            <label class="col-4 col-form-label" for="specificatie">Specificatie:</label>
            <div class="col-8">
                <textarea class="form-control" id="specificatie"
                          rows="6"><?php echo $computer['specificatie']; ?></textarea>
            </div>
        </div>
        <div class="row mt-5 mb-3">
            <div class="col-6 text-center">
                <button type="reset" class="btn btn-outline-primary">Reset</button>
            </div>
            <div class="col-6 text-center">
                <button type="submit" class="btn btn-primary">Opslaan</button>
            </div>
        </div>
    </form>
</div>
<?php include(TEMPLATE_PATH . 'footer.php'); ?>
