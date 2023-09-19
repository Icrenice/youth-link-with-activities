<?php
//Sessie starten
session_start();
//Roep class bestand op
require_once '../src/class.php';
//Pak sessie data uit
$jongeren = unserialize($_SESSION['jongeren_data']);
//Pass POST variable
$post = $_POST;
$startdatum = $post['begindatum'];
$actiecode = $post['actiecode'];
$afgerond = $post['afgerond'];
$Jactiviteit = new Jongerenactiviteit();
//Zet sessie id in user id
$jongeren_id = $jongeren['jongerencode'];
// validatie checker
if (isset($_POST['submit'])) {

    if (isset($error)) {
        $_SESSION['ERRORS'] = implode('<br> ', $error);
        var_dump($_SESSION['ERRORS']);
        header('Location:../jongeren-koppelen.php');
    } else {
        $setActiviteit = $Jactiviteit->setJongerenActiviteit($startdatum, $actiecode, $jongeren_id, $afgerond);
        if (is_bool($setActiviteit)) {
                // terug naar begin pagina
                header('Location: ../jongerenlijst.php');
        } 
        elseif (is_string($setActiviteit)) {
            $_SESSION['ERRORS'] = $setActiviteit;
            header('Location: ../jongeren-koppelen.php');
        }
    }
}