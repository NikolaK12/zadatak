<?php

include("Zadatak.php");

$db = Zadatak::getInstance();


foreach ($_POST as $name => $value) {
    $db->azurirajZadatak($name,"Završen");
}

header("Location:lista.php");


?>

