<form action="kreiranje.php" method="POST">
    <label for="opis">Opis:</label>
    <input type="text" name="opis" placeholder="Unesite novi zadatak" autocomplete="off"/>


    <label for="rok">Rok:</label>
    <input type="date" name="rok" />

    <button type="submit" name="dodaj">
        Dodaj
    </button>
</form>



<?php
include("Zadatak.php");


$db = Zadatak::getInstance();

$db->dohvatiZadatke();



?>