<?php
header("Content-Security-Policy: default-src 'self'; img-src * 'self' data:");
?><!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <base href="<?php echo WWW_ROOT . '/'; ?>">

    <title><?php echo h($page_title); ?> | Werkgroep Computerhuis Oost</title>
    <link rel="shortcut icon" href="./assets/images/logo-ct.png" type="image/x-icon">

    <script src="./assets/js/jquery-3.6.1.min.js"></script>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/bootstrap-initialization.js"></script>
    <script src="./assets/js/datatable/jquery.dataTables.min.js"></script>
    <script src="./assets/js/datatable/dataTables.bootstrap5.min.js"></script>

    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/bootstrap-icons.css">
    <link rel="stylesheet" href="./assets/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="./assets/css/computerhuis.css">
    <link rel="stylesheet" href="./assets/css/login.css">


</head>
<body class="d-flex flex-column min-vh-100">
