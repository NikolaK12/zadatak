<?php

class Zadatak
{

    private static $instance = null;

    private $pdo;

    private $host = "localhost";
    private $dbname = "sustav";
    private $user = "root";
    private $password = "root";

    private function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:host=$this->host; dbname=$this->dbname", $this->user, $this->password);

        } catch (PDOException $e) {
            echo "Error:" . $e->getMessage();
        }

    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();

        }
        return self::$instance;

    }


    public function dohvatiZadatke()
    {

        try {
            $sql = "SELECT * FROM zadaci;";

            $stmt = $this->pdo->query($sql);

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "id:" . $row["ID_zadatka"] . "<br>" . "Opis:" . $row["opis_zadatka"] . "<br>" . "Status:" . $row["status"] . "<br>" . "Datum kreiranja:" . $row["datum_kreiranja"] . "<br>" . "Rok:" . $row["rok_za_izvrsenje"] . "<br>";

                echo "<form action='brisanje.php' method='POST'>
                <button name='$row[ID_zadatka]'>Izbriši</button>
                </form>";

                echo "<form action='azuriranje.php' method='POST'>
                <button name='$row[ID_zadatka]'>Ažuriraj status</button>
                </form>";

            }

        } catch (Exception $e) {
            $e->getMessage();
        }

    }



    public function dodajZadatak($opis, $status, $rok)
    {
        try {
            $sql = "INSERT INTO zadaci(opis_zadatka,status,datum_kreiranja,rok_za_izvrsenje) VALUES(:opis,:status,CURDATE(),:rok);";
            $stmt = $this->pdo->prepare($sql);

            $stmt->bindParam(":opis", $opis);
            $stmt->bindParam(":status", $status);
            $stmt->bindParam(":rok", $rok);

            $stmt->execute();



        } catch (Exception $e) {
            $e->getMessage();
        }

    }


    public function izbrisiZadatak($id)
    {
        try {
            $sql = "DELETE FROM zadaci WHERE ID_zadatka=:id;";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":id", $id);

            $stmt->execute();


        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    public function azurirajZadatak($id, $status)
    {
        try {

            $sql = "UPDATE zadaci SET status=:status WHERE ID_zadatka=:id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":status", $status);
            $stmt->execute();


        } catch (Exception $e) {
            $e->getMessage();
        }
    }

}



?>