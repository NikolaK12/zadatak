<?php

include("Zadatak.php");

$db = Zadatak::getInstance();



    $opis = $_POST["opis"];
    $status = "Nezavršen";

    $rok = date("Y-m-d", strtotime($_POST["rok"]));

    $db->dodajZadatak($opis, $status, $rok);

    header("Location:lista.php");




?>



