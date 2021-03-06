<?php
/**
 * Vue Liste des frais au forfait
 *
 * PHP Version 7
 *
 * @category  PPE
 * @package   GSB
 * @author    Réseau CERTA <contact@reseaucerta.org>
 * @author    José GIL <jgil@ac-nice.fr>
 * @copyright 2017 Réseau CERTA
 * @license   Réseau CERTA
 * @version   GIT: <0>
 * @link      http://www.reseaucerta.org Contexte « Laboratoire GSB »
 */
?>
<div class="row">    
<?php
// Visiteur
if ($_SESSION['typeProfil'] == 'Visiteur') {
    ?>
    <h2>Renseigner ma fiche de frais du mois 
        <?php echo $numMois . '-' . $numAnnee ?>
    </h2>
    <?php
} 
?>    
    <h3>Eléments forfaitisés</h3>
    <div class="col-md-4">
    <?php 
    // Visiteur
    if ($_SESSION['typeProfil'] == 'Visiteur') {
        ?>      
        <form method="post" 
              action="index.php?uc=gererFrais&action=validerMajFraisForfait" 
              role="form">
    <?php
    // Comptable
    } elseif ($_SESSION['typeProfil'] == 'Comptable') {
        ?>
        <form name="fraisForfait" method="post" 
        action="index.php?uc=validerFrais&action=corrigerFraisForfait" 
        role="form">
        <?php
    }
    ?>
            <fieldset>       
                <?php
                foreach ($lesFraisForfait as $unFrais) {
                    $idFrais = $unFrais['idfrais'];
                    $libelle = htmlspecialchars($unFrais['libelle']);
                    $quantite = $unFrais['quantite']; ?>
                    <div class="form-group">
                        <label for="idFrais"><?php echo $libelle ?></label>
                        <input type="text" id="idFrais" 
                               name="lesFrais[<?php echo $idFrais ?>]"
                               size="10" maxlength="5" 
                               value="<?php echo $quantite ?>" 
                               class="form-control">
                    </div>
                    <?php
                }
                // Visiteur
                if ($_SESSION['typeProfil'] == 'Visiteur') {
                ?>
                    <button class="btn btn-success" type="submit">Ajouter</button>
                    <button class="btn btn-danger" type="reset">Effacer</button>
                    <?php
                // Comptable
                } elseif ($_SESSION['typeProfil'] == 'Comptable') {
                    ?>
                    <button class="btn btn-success" type="submit">Corriger</button>
                    <button class="btn btn-danger" type="reset">Réinitialiser</button> 
                    <?php                                  
                }
                ?>
            </fieldset>
        </form>
    </div>
</div>
