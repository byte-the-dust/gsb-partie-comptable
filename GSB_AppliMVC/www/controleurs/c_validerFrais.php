<?php
/**
 * Gestion de la validation des frais
 * @author    JGN
 */

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
switch ($action) {
case 'selectionnerMois':
    $lesMois = $pdo->getListeMoisValidation();
    // Afin de sélectionner par défaut le dernier mois dans la zone de liste
    // on demande toutes les clés, et on prend la première, les mois étant triés décroissants    
    $lesCles = array_keys($lesMois);    
    $moisASelectionner = $lesCles[0];       
    $lesVisiteurs = $pdo->getListeVisiteur($lesMois[0]['mois']);
    include 'vues/v_listeVisiteur.php';
    include 'vues/v_listeMois.php';   
    break;
}