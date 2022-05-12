<?php
    if (!isset($_SESSION)) session_start();
    if (!isset($_SESSION['admin']))
    {
	    header('location:login.php'); 
	    exit;
    }
?>
<?php require_once __DIR__. "/layouts/header.php" ?>
                
<?php require_once __DIR__. "/layouts/footer.php"?>