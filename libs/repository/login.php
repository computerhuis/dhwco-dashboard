<?php

//    The argument may be one of four types:
//i - integer
//d - double
//s - string
//b - BLOB

function repository_login($username)
{
    global $db;
    $stmt = mysqli_prepare($db, "SELECT * FROM gebruikers WHERE naam=?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $stmt_result = mysqli_stmt_get_result($stmt);
    $result = mysqli_fetch_assoc($stmt_result);
    mysqli_free_result($stmt_result);
    mysqli_stmt_close($stmt);

    if (!empty($result)) {
        $result['roles'] = repository_login_roles($result['persoon_nr']);
    }
    return $result;
}

function repository_login_roles($user_id)
{
    global $db;
    $stmt = mysqli_prepare($db, "SELECT rol FROM gebruiker_rollen WHERE persoon_nr=?");
    mysqli_stmt_bind_param($stmt, "s", $user_id);
    mysqli_stmt_execute($stmt);
    $stmt_result = mysqli_stmt_get_result($stmt);

    $result = array();
    while ($row = mysqli_fetch_assoc($stmt_result)) {
        $result[] = $row['rol'];
    }
    mysqli_free_result($stmt_result);
    mysqli_stmt_close($stmt);
    return $result;
}

?>
