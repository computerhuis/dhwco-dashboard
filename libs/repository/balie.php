<?php

require_once(MODEL_PATH . 'persoon.php');

function repository_balie_alle_aanwezigen()
{
    global $db;
    $stmt = mysqli_prepare($db, "select t.*, a.naam as activiteit, p.voornaam, p.achternaam, p.tussenvoegsels from tijdregistratie t left join personen p on t.persoon_nr = p.nr left join activiteiten a on a.nr = t.activiteit_nr where t.vertrokken='0000-00-00 00:00:00' order by p.voornaam,p.achternaam");
    mysqli_stmt_execute($stmt);
    $stmt_result = mysqli_stmt_get_result($stmt);
    $result = array();
    while ($row = mysqli_fetch_assoc($stmt_result)) {
        array_push($result, new BaliePersoon($row));
    }
    mysqli_free_result($stmt_result);
    mysqli_stmt_close($stmt);
    return $result;
}

function repository_balie_aanwezigen($date)
{
    global $db;
    $stmt = mysqli_prepare($db, "select t.*, a.naam as activiteit, p.voornaam, p.achternaam, p.tussenvoegsels from tijdregistratie t left join personen p on t.persoon_nr = p.nr left join activiteiten a on a.nr = t.activiteit_nr where t.datum = ? order by p.voornaam,p.achternaam");
    mysqli_stmt_bind_param($stmt, "s", $date);
    mysqli_stmt_execute($stmt);
    $stmt_result = mysqli_stmt_get_result($stmt);
    $result = array();
    while ($row = mysqli_fetch_assoc($stmt_result)) {
        array_push($result, new BaliePersoon($row));
    }
    mysqli_free_result($stmt_result);
    mysqli_stmt_close($stmt);
    return $result;
}


function repository_balie_aanmelden($persoon_nr, $activiteit_nr)
{
    global $db;

    // controlleer of personen al is aangemeld
    $stmt = mysqli_prepare($db, "SELECT 1 FROM tijdregistratie WHERE persoon_nr=? and activiteit_nr=? AND vertrokken is null");
    mysqli_stmt_bind_param($stmt, "ii", $persoon_nr, $activiteit_nr);
    mysqli_stmt_execute($stmt);
    $stmt_result = mysqli_stmt_get_result($stmt);
    $result = mysqli_fetch_assoc($stmt_result);
    mysqli_free_result($stmt_result);
    mysqli_stmt_close($stmt);

    // Als personen niet is aangemeld, meld die aan
    if ($result == null) {
        $stmt = mysqli_prepare($db, "INSERT INTO tijdregistratie (persoon_nr, activiteit_nr) VALUES (?, ?)");
        mysqli_stmt_bind_param($stmt, "ii", $persoon_nr, $activiteit_nr);
        mysqli_stmt_execute($stmt);
    }
}


function repository_balie_zoeken($search)
{
    global $db;
    $search_parameter = "%" . $search . "%";
    $stmt = mysqli_prepare($db, "SELECT nr, voornaam, tussenvoegsels,achternaam  from personen where achternaam like ? or voornaam like ? or geboortedatum like ?;");
    mysqli_stmt_bind_param($stmt, "sss", $search_parameter, $search_parameter, $search_parameter);
    mysqli_stmt_execute($stmt);
    $stmt_result = mysqli_stmt_get_result($stmt);

    $result = array();
    while ($row = mysqli_fetch_assoc($stmt_result)) {
        array_push($result, $row);
    }
    mysqli_free_result($stmt_result);
    mysqli_stmt_close($stmt);
    return $result;
}
