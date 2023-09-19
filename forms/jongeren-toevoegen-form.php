<?php
session_start();

require_once '../src/class.php';
$jongeren = new jongeren();
$post = $_POST;
$roepnaam = $post['roepnaam'];
$tussenvoegsel = $post['tussenvoegsel'];
$achternaam = $post['achternaam'];
$inschrijfdatum = $post['inschrijfdatum'];
$geboortedatum = $post['geboortedatum'];

$gd = new DateTime($geboortedatum);      
$nu = new DateTime();
$verschil = $nu->diff($gd);
$leeftijd = $verschil->y;
if($leeftijd  < "19"){
    $minderjarig ="ja";
}
else{
    $minderjarig = "nee";
}
// validatie checker
if (isset($_POST['submit'])) {

    //check roepnaam
    if (!empty($roepnaam)) {
        $firstname_subject = $roepnaam;
        $firstname_pattern = '/^[a-zA-Z ]*$/';
        $firstname_match = preg_match($firstname_pattern, $firstname_subject);
        if ($firstname_match !== 1) {
            $error[] = "Roepnaam mag alleen alfabetisch, steepjes en spaties bevatten";
        }
    } else {
        // mag niet leeg zijn
        $error[] = "Roepnaam mag niet leeg.";
    }

    //check achternaam
    if (!empty($achternaam)) {
        $lastname_subject = $achternaam;
        $lastname_pattern = '/^[a-zA-Z ]*$/';
        $lastname_match = preg_match($lastname_pattern, $lastname_subject);
        if ($lastname_match !== 1) {
            $error[] = "Achternaam mag alleen alfabetisch, steepjes en spaties bevatten";
        }
    } else {
        // mag niet leeg zijn
        $error[] = "Achternaam mag niet leeg.";
    }

    //check inschrijfdatum
    if (empty($inschrijfdatum)) {
        $error[] = "inschrijfdatum mag niet leeg.";
    }   

    if (isset($error)) {
        $_SESSION['ERRORS'] = implode('<br> ', $error);
        header('Location:../jongeren-toevoegen.php');
    } else {
        $jongeren->create($roepnaam, $tussenvoegsel, $achternaam, $inschrijfdatum, $geboortedatum, $leeftijd, $minderjarig);
        header('Location:../jongerenlijst.php');
    }
}
