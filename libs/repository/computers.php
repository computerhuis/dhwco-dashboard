<?php

//    The argument may be one of four types:
//i - integer
//d - double
//s - string
//b - BLOB
function repository_all_computers(): array
{
    global $db;
    $stmt = mysqli_prepare($db, "SELECT nr, fabrikant, model, type, inboek_datum FROM computers");
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

function repository_computer($id): bool|array|null
{
    global $db;
    $stmt = mysqli_prepare($db, "SELECT c.*, p.voornaam, p.tussenvoegsels, p.achternaam, b.naam AS 'bedrijfsnaam'
                                        FROM computers c
                                                 LEFT JOIN personen p ON c.persoon_nr = p.nr
                                                 LEFT JOIN bedrijven b on b.nr = c.bedrijf_nr
                                        WHERE c.nr=?");
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    $stmt_result = mysqli_stmt_get_result($stmt);
    $result = mysqli_fetch_assoc($stmt_result);
    mysqli_free_result($stmt_result);
    mysqli_stmt_close($stmt);
    return $result;
}

?>
