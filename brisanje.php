<?php

include("Zadatak.php");

$db = Zadatak::getInstance();

foreach ($_POST as $name => $value) {
    $db->izbrisiZadatak($name);
}

header("Location:lista.php");




?>