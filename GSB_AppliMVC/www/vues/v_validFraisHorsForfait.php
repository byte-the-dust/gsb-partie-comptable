<?php
/**
 * Vue Liste des frais hors forfait à valider
 *
 * @author    JGN
 *
 */
?>
<hr>
<div class="row">
    <div class="panel panel-info">
        <div class="panel-heading">Descriptif des éléments hors forfait</div>
        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <th class="date">Date</th>
                    <th class="libelle">Libellé</th>  
                    <th class="montant">Montant</th>  
                    <th class="action">&nbsp;</th> 
                </tr>
            </thead>  
            <tbody>
            <?php
            foreach ($lesFraisHorsForfait as $unFraisHorsForfait) {
                $libelle = htmlspecialchars($unFraisHorsForfait['libelle']);
                $date = $unFraisHorsForfait['date'];
                $montant = $unFraisHorsForfait['montant'];
                $id = $unFraisHorsForfait['id']; ?>           
                <tr>
                    <td> <input id="date" 
                               name="lesDate[<?php echo $date ?>]"
                               size="5" maxlength="10" 
                               value="<?php echo $date ?>" 
                               class="form-control"></td>

                    <td><input id="libelle" 
                               name="lesLibelle[<?php echo $libelle ?>]"
                               size="45" maxlength="70" 
                               value="<?php echo $libelle ?>" 
                               class="form-control"></td>
                    <td><input id="montant" 
                               name="lesLibelle[<?php echo $montant ?>]"
                               size="5" maxlength="6" 
                               value="<?php echo $montant ?>" 
                               class="form-control"></td>
                    <td><button class="btn btn-success" 
                                <a href="index.php?uc=gererFrais&action=supprimerFrais&idFrais=<?php echo $id ?>" 
                               onclick="return;">Corriger</a></button></td>
                    <td><button class="btn btn-danger" <a href="index.php?uc=validerFrais&action=supprimerFrais&idFrais=<?php echo $id ?>" 
                               onclick="return confirm('Voulez-vous vraiment supprimer ce frais?');">Supprimer</a></button></td>
                </tr>
                <?php
            }
            ?>
            </tbody>  
        </table>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <form action="index.php?uc=gererFrais&action=validerCreationFrais" 
              method="post" role="form">
            <div class="form-group">
                <label for="txtDateHF">Nombre de justifiactifs : </label>
                <input type="text" id="txtDateHF" name="nbJustif" 
                       class="form-control" id="text">
            </div>
            <button class="btn btn-success" type="submit">Valider</button>
            <button class="btn btn-danger" type="reset">Reinitialiser</button>
        </form>
    </div>
</div>