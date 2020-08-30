<?php
/**
 * Gestion de la validation des frais
 * 
 * @author    JGN
 */
$moisASelectionner;
$visiteurASelectionner;
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
switch ($action) {
// Sélection du mois et du visiteur    
case 'selectionnerMois':
    $lesMois = $pdo->getListeMoisValidation();
    // Afin de sélectionner par défaut le dernier mois dans la zone de liste
    // on demande toutes les clés, et on prend la première, les mois étant triés décroissants    
    $lesCles = array_keys($lesMois);    
    $moisParDefaut = $lesCles[0];       
    $lesVisiteurs = $pdo->getListeVisiteur($lesMois[0]['mois']);
    include 'vues/v_listeVisiteurMois.php';
    break;

// Validation de la sélection : affichage des frais saisis pour le visiteur le mois concerné
case 'voirDetailFrais':
    $idVisiteur = filter_input(INPUT_POST, 'lstVisiteur', FILTER_DEFAULT, FILTER_SANITIZE_STRING);
    $idMois = filter_input(INPUT_POST, 'lstMois', FILTER_DEFAULT, FILTER_SANITIZE_STRING);
    
    // Liste des mois sélectionnables
    $lesMois = $pdo->getListeMoisValidation();
    // Mois sélectionné dans la liste
    if (!isset($_COOKIE['mois'])){
        $moisASelectionner = $idMois;
    } else {
       $moisASelectionner = $_COOKIE['mois'];
}
    
    // Liste des visiteurs sélectionnables
    $lesVisiteurs = $pdo->getListeVisiteur($lesMois[0]['mois']);    
    // Visiteur sélectionné dans la liste 
    if (!isset($_COOKIE['id'])){
        $visiteurASelectionner = $idVisiteur;
    } else {
        $visiteurASelectionner = $_COOKIE['id'];            
    }    
        
    $lesFraisForfait = $pdo->getLesFraisForfait($visiteurASelectionner, $moisASelectionner);
    $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($visiteurASelectionner, $moisASelectionner);    
    include 'vues/v_listeVisiteurMois.php';
    include 'vues/v_listeFraisForfait.php';    
    include 'vues/v_validFraisHorsForfait.php';
    break;
    
// Correction des frais forfaitisés
case 'corrigerFraisForfait':
    $lesMois = $pdo->getListeMoisValidation();
    $moisASelectionner = $_COOKIE['mois'];
    
    $lesVisiteurs = $pdo->getListeVisiteur($lesMois[0]['mois']);
    $visiteurASelectionner = $_COOKIE['id'];

    $lesFrais = filter_input(INPUT_POST, 'lesFrais', FILTER_DEFAULT, FILTER_FORCE_ARRAY);
    
    if (lesQteFraisValides($lesFrais)) {
        $pdo->majFraisForfait($_COOKIE['id'], $_COOKIE['mois'], $lesFrais);
    } else {
        ajouterErreur('Les valeurs des frais doivent être numériques');
        include 'vues/v_erreurs.php';
    } 

    break;
// Validation d'une fiche de frais    
case 'validerFiche': 
    $pdo->majEtatFicheFrais($idVisiteur, $mois, 'VA');
    break;
}