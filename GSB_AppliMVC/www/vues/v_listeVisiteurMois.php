<?php
/**
 * Vue Liste des visiteurs et des mois disponibles à la validation
 *
 * @author    JGN
 */
?>
<div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-4">
        <form action="index.php?uc=validerFrais&action=voirDetailFrais" 
                  method="post" role="form">            
            <div class="form-group">
                <!-- Sélection du visiteur -->
                <label for="lstVisiteur" accesskey="n">Choisir le visiteur : </label>
                <select id="lstVisiteur" name="lstVisiteur" class="form-control">
                    <?php
                    foreach ($lesVisiteurs as $unVisiteur) {
                        $id = $unVisiteur['id'];
                        $nom = $unVisiteur['nom'];
                        $prenom = $unVisiteur['prenom'];
                        if ($id == $visiteurASelectionner) {
                            // Pour conservation de l'id du visteur après validation
                            setcookie('id', $id, time() + 86400, null, null, false, true);
                            ?>
                            <option selected value="<?php echo $id ?>">
                                <?php echo $nom . ' ' . $prenom  ?> </option>
                            <?php
                        } else {                                                     
                            ?>
                            <option value="<?php echo $id?>">
                                <?php echo $nom . ' ' . $prenom ?> </option>
                            <?php                            
                        }
                    }
                    ?>    
                </select>
                <!-- Sélection du mois -->
                <label for="lstMois" accesskey="n">Mois : </label>
                <select id="lstMois" name="lstMois" class="form-control">
                    <?php
                    foreach ($lesMois as $unMois) {
                        $mois = $unMois['mois'];
                        $numAnnee = $unMois['numAnnee'];
                        $numMois = $unMois['numMois'];
                        if ($mois == $moisASelectionner) {
                            // Pour conservation du mois après validation
                            setcookie('mois', $mois, time() + 86400, null, null, false, true);
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
        </form>
    </div>
</div>
<h2>Valider la fiche de frais</h2>