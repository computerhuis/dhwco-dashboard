<?php

//    The argument may be one of four types:
//i - integer
//d - double
//s - string
//b - BLOB
function repository_all_tijdregistraties(): array
{
    global $db;
    $stmt = mysqli_prepare($db, "SELECT t.datum, t.vertrokken, p.nr, p.voornaam, p.tussenvoegsels, p.achternaam, a.naam AS activiteit FROM tijdregistratie t LEFT JOIN personen p ON t.persoon_nr = p.nr LEFT JOIN activiteiten a on t.activiteit_nr = a.nr;");
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
