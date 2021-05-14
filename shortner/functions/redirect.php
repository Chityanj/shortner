<?php
require_once("Shortner.php");

$shortner = new Shortner();

if (isset($_GET['secret'])) {
    $uniqueCode = $_GET['secret'];
    $originalUrl = $shortner->getLink($uniqueCode);
    header("Location: {$originalUrl}");
    die();
}

header("Location: index.php");
die();

?>