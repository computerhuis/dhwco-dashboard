<?php

//    The argument may be one of four types:
//i - integer
//d - double
//s - string
//b - BLOB
function repository_all_bedrijven()
{
    global $db;
    $stmt = mysqli_prepare($db, "SELECT nr, naam, email, postcode, inschrijf_datum FROM bedrijven");
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


function repository_bedrijf($id): bool|array|null
{
    global $db;
    $stmt = mysqli_prepare($db, "SELECT * FROM bedrijven WHERE nr=?;");
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    $stmt_result = mysqli_stmt_get_result($stmt);
    $result = mysqli_fetch_assoc($stmt_result);
    mysqli_free_result($stmt_result);
    mysqli_stmt_close($stmt);
    return $result;
}

?>
