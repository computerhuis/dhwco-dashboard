<?php

function database_connect()
{
    $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    if (mysqli_connect_errno()) {
        if (mysqli_connect_errno()) {
            $msg = "Database connection failed: ";
            $msg .= mysqli_connect_error();
            $msg .= " (" . mysqli_connect_errno() . ")";
            exit($msg);
        }
    }

    return $conn;
}

function database_disconnect($conn)
{
    if (isset($conn)) {
        mysqli_close($conn);
    }
}

?>
