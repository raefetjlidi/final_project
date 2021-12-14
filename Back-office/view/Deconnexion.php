<?php
session_start();
session_destroy();
echo ('VOUS ETES DECONNECTE..');
header('location: index.php');
?>