<?php
session_start();

if (!isset($_SESSION['account'])) {
    header('Location: '.URLROOT.'/views/sign-up.php');
    exit;
}
