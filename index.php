<?php
session_start();
    require_once 'config.php';
    $layout = $defaultLayout;
    $title = 'QLNV';
    require_once 'app.php';
    require_once $layout;
?>