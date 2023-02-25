<?php

require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'libs' . DIRECTORY_SEPARATOR . 'bootstrap.php');

security_require_login('ADMIN');

require_once(REPOSITORY_PATH . 'personen.php');

$page_title = 'Persoon';
$navigation_menu = 'personen';
include(TEMPLATE_PATH . 'header.php');
include(TEMPLATE_PATH . 'navigation.php');

$persoon = repository_persoon($_GET["id"]);
function leeftijd($geboortedatum)
{
    $date = new DateTime($geboortedatum);
    $now = new DateTime();
    $interval = $now->diff($date);
    return $interval->y;
}

?>
<div class="container mt-3 bg-light p-4">
    <form>
        <h1>Persoonsgegevens</h1>
        <hr/>
        <div class="row">
            <label class="col-4 col-form-label" for="nr">Gebruikersnummer:</label>
            <div class="col-8">
                <input class="form-control" id="nr" disabled value="<?php echo $persoon['nr']; ?>">
            </div>
        </div>
        <div class="row mt-1">
            <label class="col-4 col-form-label" for="inschrijf_datum">Datum inschrijving:</label>
            <div class="col-8">
                <input class="form-control" id="inschrijf_datum" disabled type="datetime-local"
                       value="<?php echo $persoon['inschrijf_datum']; ?>">
            </div>
        </div>
        <div class="row mt-1">
            <label class="col-4 col-form-label" for="voorletters">Voorletters:</label>
            <div class="col-8">
                <input class="form-control" id="voorletters" value="<?php echo $persoon['voorletters']; ?>">
            </div>
        </div>
        <div class="row mt-1">
            <label class="col-4 col-form-label" for="voornaam">Voornaam:</label>
            <div class="col-8">
                <input class="form-control" id="voornaam" value="<?php echo $persoon['voornaam']; ?>">
            </div>
        </div>
        <div class="row mt-1">
            <label class="col-4 col-form-label" for="tussenvoegsels">Tussenvoegsels:</label>
            <div class="col-8">
                <input class="form-control" id="tussenvoegsels" value="<?php echo $persoon['tussenvoegsels']; ?>">
            </div>
        </div>
        <div class="row mt-1">
            <label class="col-4 col-form-label" for="achternaam">Achternaam:</label>
            <div class="col-8">
                <input class="form-control" id="achternaam" value="<?php echo $persoon['achternaam']; ?>">
            </div>
        </div>
        <div class="row mt-1">
            <label class="col-4 col-form-label" for="geboortedatum">Geboortedatum:</label>
            <div class="col-6">
                <input class="form-control" type="date" id="geboortedatum"
                       value="<?php echo $persoon['geboortedatum']; ?>">
            </div>
            <label class="col-1 col-form-label text-end" for="leeftijd">Leeftijd:</label>
            <div class="col-1">
                <input class="form-control" id="leeftijd" disabled
                       value="<?php echo leeftijd($persoon['geboortedatum']); ?>">
            </div>
        </div>
        <div class="row mt-1">
            <label class="col-4 col-form-label" for="uitschrijf_datum">Uitschrijf datum:</label>
            <div class="col-8">
                <input class="form-control" id="uitschrijf_datum" type="datetime-local"
                       value="<?php echo $persoon['uitschrijf_datum']; ?>">
            </div>
        </div>
        <hr/>
        <div class="row mt-1">
            <label class="col-4 col-form-label" for="telefoon">telefoon:</label>
            <div class="col-8">
                <input class="form-control" id="telefoon" value="<?php echo $persoon['telefoon']; ?>">
            </div>
        </div>
        <div class="row mt-1">
            <label class="col-4 col-form-label" for="mobile">mobile:</label>
            <div class="col-8">
                <input class="form-control" id="mobile" value="<?php echo $persoon['mobile']; ?>">
            </div>
        </div>
        <div class="row mt-1">
            <label class="col-4 col-form-label" for="email">email:</label>
            <div class="col-8">
                <input class="form-control" id="email" value="<?php echo $persoon['email']; ?>">
            </div>
        </div>
        <hr/>
        <div class="row mt-1">
            <label class="col-4 col-form-label" for="straat">Straat:</label>
            <div class="col-8">
                <input class="form-control" id="straat" value="<?php echo $persoon['straat']; ?>">
            </div>
        </div>
        <div class="row mt-1">
            <label class="col-4 col-form-label" for="huisnummer">huisnummer:</label>
            <div class="col-8">
                <input class="form-control" id="huisnummer" value="<?php echo $persoon['huisnummer']; ?>">
            </div>
        </div>
        <div class="row mt-1">
            <label class="col-4 col-form-label" for="huisnummertoevoeging">huisnummertoevoeging:</label>
            <div class="col-8">
                <input class="form-control" id="huisnummertoevoeging"
                       value="<?php echo $persoon['huisnummertoevoeging']; ?>">
            </div>
        </div>
        <div class="row mt-1">
            <label class="col-4 col-form-label" for="postcode">postcode:</label>
            <div class="col-8">
                <input class="form-control" id="postcode" value="<?php echo $persoon['postcode']; ?>">
            </div>
        </div>
        <div class="row mt-1">
            <label class="col-4 col-form-label" for="woonplaats">Woonplaats:</label>
            <div class="col-8">
                <input class="form-control" id="woonplaats" value="<?php echo $persoon['woonplaats']; ?>">
            </div>
        </div>
        <hr/>
        <div class="row mt-1">
            <label class="col-4 col-form-label" for="opmerkingen">Opmerking:</label>
            <div class="col-8">
                <textarea class="form-control" id="opmerkingen"
                          rows="6"><?php echo $persoon['opmerkingen']; ?></textarea>
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
