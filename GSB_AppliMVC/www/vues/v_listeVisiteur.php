<?php
/**
 * Vue Liste des visiteurs
 *
 * @author    JGN
 */
?>
<h2>Valider la fiche de frais</h2>
<div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-4">
            <form action="index.php?uc=validerFrais&action=selectionnerMois" 
                  method="post" role="form">            
            <div class="form-group">
                <!-- Sélection du visiteur -->
                <label for="lstVisiteur" accesskey="n">Choisir le visiteur : </label>
                <select id="lstVisiteur" name="lstVisiteur" class="form-control">
                    <?php
                    foreach ($lesVisiteurs as $unVisiteur) {
                        $nom = $unVisiteur['nom'];
                        $prenom = $unVisiteur['prenom'];
                            ?>
                        <option value="<?php echo $nom ?>">
                                <?php echo $nom . ' ' . $prenom  ?> </option>
                            <?php
                        }
                    ?>    
                </select>
            </div>
        </form>
    </div>
</div>