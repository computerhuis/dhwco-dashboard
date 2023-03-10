<?php

//    The argument may be one of four types:
//i - integer
//d - double
//s - string
//b - BLOB
function repository_all_postcodes(): array
{
    global $db;
    $stmt = mysqli_prepare($db, "SELECT * FROM postcodes");
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
