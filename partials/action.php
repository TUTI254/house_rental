<?php
session_start();
$request=$_GET['request'];
if($request=='logout'){
    unset($_SESSION['id']);
    session_destroy();
    header("Location: ../public/index.php");
}
?>