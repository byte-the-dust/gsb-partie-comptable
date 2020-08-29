<?php
/**
 * Vue Liste des mois
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
<?php
// Visiteur
if ($_SESSION['typeProfil'] == 'Visiteur') {
    ?>
<h2>Mes fiches de frais</h2>
    <?php
} 
?>
<div class="row">
    <div class="col-md-4">
        <?php
        // Visiteur
        if ($_SESSION['typeProfil'] == 'Visiteur') {
            ?>
        <h3>Sélectionner un mois : </h3>
            <?php  
        } 
        ?>
    </div>
    <div class="col-md-4">
        <?php
        // Visiteur
        if ($_SESSION['typeProfil'] == 'Visiteur') { 
            ?>
        <form action="index.php?uc=etatFrais&action=voirEtatFrais" 
              method="post" role="form">
            <?php
        // Comptable
        } elseif ($_SESSION['typeProfil'] == 'Comptable') {
            ?>
            <form action="index.php?uc=validerFrais&action=selectionnerMois" 
                  method="post" role="form">            
            <?php
        }
        ?>
            <div class="form-group">
                <label for="lstMois" accesskey="n">Mois : </label>
                <select id="lstMois" name="lstMois" class="form-control">
                    <?php
                    foreach ($lesMois as $unMois) {
                        $mois = $unMois['mois'];
                        $numAnnee = $unMois['numAnnee'];
                        $numMois = $unMois['numMois'];
                        if ($mois == $moisASelectionner) {
                            ?>
                            <option selected value="<?php echo $mois ?>">
                                <?php echo $numMois . '/' . $numAnnee ?> </option>
                            <?php
                        } else {
                            ?>
                            <option value="<?php echo $mois ?>">
                                <?php echo $numMois . '/' . $numAnnee ?> </option>
                            <?php
                        }
                    }
                    ?>    
                </select>
            </div>
            <input id="ok" type="submit" value="Valider" class="btn btn-success" 
                   role="button">
            <input id="annuler" type="reset" value="Effacer" class="btn btn-danger" 
                   role="button">
        </form>
    </div>
</div>