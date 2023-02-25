<?php

function repository_actviteiten_actief()
{
    global $db;
    $stmt = mysqli_prepare($db, "select * from activiteiten where actief_tot ='0000-00-00 00:00:00';");
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

?>
