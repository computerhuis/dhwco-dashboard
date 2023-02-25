<?php

require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'libs' . DIRECTORY_SEPARATOR . 'bootstrap.php');

security_require_login('ADMIN');

require_once(REPOSITORY_PATH . 'bedrijven.php');

$page_title = 'Bedrijf';
$navigation_menu = 'bedrijven';
include(TEMPLATE_PATH . 'header.php');
include(TEMPLATE_PATH . 'navigation.php');

$bedrijf = repository_bedrijf($_GET["id"]);
?>
<div class="container mt-3 bg-light p-4">
    <form>
        <h1>Details van Bedrijf</h1>
        <hr/>
        <div class="row">
            <label class="col-4 col-form-label" for="nr">Nummer:</label>
            <div class="col-8">
                <input class="form-control" id="nr" disabled value="<?php echo $bedrijf['nr']; ?>">
            </div>
        </div>
        <div class="row mt-1">
            <label class="col-4 col-form-label" for="inschrijf_datum">Inschrijf datum:</label>
            <div class="col-8">
                <input class="form-control" id="inschrijf_datum" type="datetime-local" disabled
                       value="<?php echo $bedrijf['inschrijf_datum']; ?>">
            </div>
        </div>
        <div class="row mt-1">
            <label class="col-4 col-form-label" for="naam">Naam:</label>
            <div class="col-8">
                <input class="form-control" id="naam" value="<?php echo $bedrijf['naam']; ?>">
            </div>
        </div>
        <div class="row mt-1">
            <label class="col-4 col-form-label" for="kvk_nummer">KvK nummer:</label>
            <div class="col-8">
                <input class="form-control" id="kvk_nummer" value="<?php echo $bedrijf['kvk_nummer']; ?>">
            </div>
        </div>
        <div class="row mt-1">
            <label class="col-4 col-form-label" for="btw_nummer">BTW nummer:</label>
            <div class="col-8">
                <input class="form-control" id="btw_nummer" value="<?php echo $bedrijf['btw_nummer']; ?>">
            </div>
        </div>
        <div class="row mt-1">
            <label class="col-4 col-form-label" for="uitschrijf_datum">Uitschrijf datum:</label>
            <div class="col-8">
                <input class="form-control" id="uitschrijf_datum" type="datetime-local"
                       value="<?php echo $bedrijf['uitschrijf_datum']; ?>">
            </div>
        </div>
        <hr/>
        <div class="row mt-1">
            <label class="col-4 col-form-label" for="telefoon">Telefoon:</label>
            <div class="col-8">
                <input class="form-control" id="telefoon" value="<?php echo $bedrijf['telefoon']; ?>">
            </div>
        </div>
        <div class="row mt-1">
            <label class="col-4 col-form-label" for="email">Email-adres:</label>
            <div class="col-8">
                <input class="form-control" id="email" value="<?php echo $bedrijf['email']; ?>">
            </div>
        </div>
        <div class="row mt-1">
            <label class="col-4 col-form-label" for="website">Website:</label>
            <div class="col-8">
                <input class="form-control" id="website" value="<?php echo $bedrijf['website']; ?>">
            </div>
        </div>
        <hr/>
        <div class="row mt-1">
            <label class="col-4 col-form-label" for="straat">Straat:</label>
            <div class="col-8">
                <input class="form-control" id="straat" value="<?php echo $bedrijf['straat']; ?>">
            </div>
        </div>
        <div class="row mt-1">
            <label class="col-4 col-form-label" for="huisnummer">huisnummer:</label>
            <div class="col-8">
                <input class="form-control" id="huisnummer" value="<?php echo $bedrijf['huisnummer']; ?>">
            </div>
        </div>
        <div class="row mt-1">
            <label class="col-4 col-form-label" for="huisnummertoevoeging">huisnummertoevoeging:</label>
            <div class="col-8">
                <input class="form-control" id="huisnummertoevoeging"
                       value="<?php echo $bedrijf['huisnummertoevoeging']; ?>">
            </div>
        </div>
        <div class="row mt-1">
            <label class="col-4 col-form-label" for="postcode">postcode:</label>
            <div class="col-8">
                <input class="form-control" id="postcode" value="<?php echo $bedrijf['postcode']; ?>">
            </div>
        </div>
        <div class="row mt-1">
            <label class="col-4 col-form-label" for="woonplaats">Woonplaats:</label>
            <div class="col-8">
                <input class="form-control" id="woonplaats" value="<?php echo $bedrijf['woonplaats']; ?>">
            </div>
        </div>
        <hr/>
        <div class="row mt-1">
            <label class="col-4 col-form-label" for="opmerkingen">Opmerking:</label>
            <div class="col-8">
                <textarea class="form-control" id="opmerkingen"
                          rows="6"><?php echo $bedrijf['opmerkingen']; ?></textarea>
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
