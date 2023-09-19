<?php

class DB
{

    protected $conn;

    public function conn()
    {
        try {
            //Database username
            $medewerkername = 'root';
            //Database password
            $wachwoord = '';
            //PDO Configuratie
            $options = [
                PDO::ATTR_EMULATE_PREPARES => false, // Zet emulatie uit voor echte prepared statements
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //Zet errors aan voor debuggen
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //Zet fetch automatisch op array
            ];
            //Host configuratie
            $dsn = "mysql:host=localhost;dbname=jeugdbetrokkenen;charset=utf8mb4";
            //Maak PDO
            $this->conn = new PDO($dsn, $medewerkername, $wachwoord, $options);
            //return value boolean
            return true;
            //Zet variable conn op NULL
            $this->conn = NULL;
        } catch (PDOException $e) {
            //Database verbinding error
            exit('Er ging iets mis...');
            //Stuur variable terug
            return $e;
        }
    }
}

class Jongeren extends DB
{

    public $id;
    public $roepnaam;
    public $tussenvoegsel;
    public $achternaam;
    public $inschrijfdatum;
    public $geboortedatum;
    public $leeftijd;
    public $minderjarig;
  

    public function create($roepnaam, $tussenvoegsel, $achternaam, $inschrijfdatum, $geboortedatum, $leeftijd, $minderjarig)
    {
        
        try {
            // maak een connectie met de database
            $this->conn();
            // sql query defineren
            $sql = "INSERT INTO jongeren (roepnaam, tussenvoegsel, achternaam, inschrijfdatum, geboortedatum, leeftijd, minderjarig) VALUES (:roepnaam, :tussenvoegsel, :achternaam, :inschrijfdatum, :geboortedatum, :leeftijd, :minderjarig)";
            // sql voorbereiden
            $stmt = $this->conn->prepare($sql);
            // waardes verbinden met de named placeholders
            $stmt->bindParam(":roepnaam", $roepnaam);
            $stmt->bindParam(":tussenvoegsel", $tussenvoegsel);
            $stmt->bindParam(":achternaam", $achternaam);
            $stmt->bindParam(":inschrijfdatum", $inschrijfdatum);
            $stmt->bindParam(":geboortedatum", $geboortedatum);
            $stmt->bindParam(":leeftijd", $leeftijd);
            $stmt->bindParam(":minderjarig", $minderjarig);
            //SQL query daadwerkelijk uitvoeren
            $stmt->execute();
            //Zet verbinding op NULL
            $this->conn = NULL;
        } catch (PDOException $e) {

            return $e;
        }
    }

    public function getJongeren()
    {
        try {
            // maak een connectie met de database
            $this->conn();
            // sql query defineren
            $sql = "SELECT * FROM jongeren ORDER BY geboortedatum ASC";
            // sql voorbereiden
            $stmt = $this->conn->prepare($sql);
            //Voer SQL uit
            $stmt->execute();
            // data ophalen
            $data = $stmt->fetchAll();
            // database connectie sluiten
            $this->conn = NULL;

            // opgehaalde rijen terugsturen
            return $data;
        } catch (PDOException $e) {
            // database connectie sluiten
            $this->conn = NULL;
            //stuur variable terug
            return $e;
        }
    }
    
    public function getJonger($jid)
    {
        try {
            // maak een connectie met de database
            $this->conn();
            // sql query defineren
            $sql = "SELECT * FROM jongeren WHERE jongerencode = :jongerencode";
            // sql voorbereiden
            $stmt = $this->conn->prepare($sql);
            // waardes verbinden met de named placeholders
            $stmt->bindParam(":jongerencode", $jid);
            // sql query daadwerkelijk uitvoeren
            $stmt->execute();
            // data ophalen
            $data = $stmt->fetch();

            $this->conn = NULL;
           
                // class variabelen invullen
                $this->id = $data['jongerencode'];
                $this->roepnaam = $data['roepnaam'];
                $this->tussenvoegsel = $data['tussenvoegsel'];
                $this->achternaam = $data['achternaam'];
                $this->inschrijfdatum = $data['inschrijfdatum'];
                $this->geboortedatum = $data['geboortedatum'];
                $this->leeftijd = $data['leeftijd'];
                $this->minderjarig = $data['minderjarig'];
                return $data;
        } catch (PDOException $e) {
            $this->conn = NULL;
            // status terugsturen
            return $e;
        }
    }

}
class Activiteiten extends DB{

    public function getActiviteiten(){
        try {
            // maak een connectie met de database
            $this->conn();
            // sql query defineren
            $sql = "SELECT * FROM activiteit";
            // sql voorbereiden
            $stmt = $this->conn->prepare($sql);
            //Voer SQL uit
            $stmt->execute();
            // data ophalen
            $data = $stmt->fetchAll();
            // database connectie sluiten
            $this->conn = NULL;

            // opgehaalde rijen terugsturen
            return $data;
        } catch (PDOException $e) {
            // database connectie sluiten
            $this->conn = NULL;
            //stuur variable terug
            return $e;
        }
    }
}
class Jongerenactiviteit extends DB{
    public function setJongerenActiviteit($startdatum, $actiecode, $jongeren_id, $afgerond)
    {
        $this->conn();
        $sql2 = "SELECT * FROM activiteit WHERE actiecode = :actiecode";
        // sql voorbereiden
        $stmt2 = $this->conn->prepare($sql2);
        // waardes verbinden met de named placeholders
        $stmt2->bindParam(":actiecode", $actiecode);
        // sql query daadwerkelijk uitvoeren
        $stmt2->execute();
        // data ophalen
        $data = $stmt2->fetch();

        // maak een connectie met de database
        if ($actiecode !== $data['actiecode']){
        // sql query defineren
        $sql = "INSERT INTO `jongerenactiviteit` (jongerencode, actiecode, startdatum, afgerond) VALUES (:jongerencode, :actiecode, :startdatum, :afgerond)";
        // sql voorbereiden
        $stmt = $this->conn->prepare($sql);
        // waardes verbinden met de named placeholders	
        $stmt->bindParam(':jongerencode', $jongeren_id);
        $stmt->bindParam(':actiecode', $actiecode);
        $stmt->bindParam(':startdatum', $startdatum);
        $stmt->bindParam(':afgerond', $afgerond);
        // sql query daadwerkelijk uitvoeren
        $stmt->execute();
        //sluit verbinding
        $this->conn = NULL;
        return true;
    }
    else{
        return "De jongere staat al ingeschreven voor het gekozen activiteit";
    }
    }
    public function getJongerenActiviteiten($jongerid)
    {
        
        try {
            // maak een connectie met de database
            $this->conn();
            // sql query defineren
            $sql = "SELECT * FROM jongerenactiviteit WHERE jongerencode = :id";
            // sql voorbereiden
            $stmt = $this->conn->prepare($sql);
            // waardes verbinden met de named placeholders
            $stmt->bindParam(':id', $jongerid);
            //Voer SQL uit
            $stmt->execute();
            // data ophalen
            $data = $stmt->fetchAll();
            // database connectie sluiten
            $this->conn = NULL;

            // opgehaalde rijen terugsturen
            return $data;
        } catch (PDOException $e) {
            // database connectie sluiten
            $this->conn = NULL;
            //stuur variable terug
            return $e;
        }
    }
}
 