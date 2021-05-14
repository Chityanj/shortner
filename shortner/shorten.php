<?php
session_start();
require_once(__DIR__."\\functions\\Shortner.php");

$errors = false;
$insertCustom = false;

$shortener = new Shortner();

if (isset($_POST['url']) && !$errors) {
    $originalURL = $_POST['url'];
    $code = NULL;
    if(isset($_POST['onoffswitch'])) if(isset($_POST['code'])) $code = $_POST['code'];
    
    $data = $shortener->registerURL($originalURL, $code);

    if($data[0]){
        $_SESSION['success'] = $shortener->generateLink($data[1]);
    }else{
        $_SESSION['error'] = "There was a problem.";
    }
}

header("Location: ./index.php");
exit();

?>