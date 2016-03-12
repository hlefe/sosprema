<h4> Associer un contact local à l'hôpital</h4>
<p><b>Créer un contact local</b></br>Transformer d'abord l'utilisateur en contact local via sa fiche: </br><a href="index.php?action=listeUtilisateurs">Accès aux fiches utilisateurs</a></p>
<p><b>Associer un contact local</b></br>Pour cela, le sélectionner dans la liste ci-dessous puis valider:</p>
<select class="form-control" name="idContact">
    <?php foreach($contacts as $contact){ ?>
        <?php if (!ModelRelation::rechercherContactLocalInHopital($idHopital, $contact["idContact"])){  ?>
            <option value="<?php echo $contact["idContact"]; ?>"> 
                <?php 
                $contact=UtilisateurGateway::rechercheUtilisateurId($contact["idUtilisateur"]);
                echo $contact->prenom . ' ';
                echo $contact->nom; 
                ?>
            </option>
        <?php } ?>
    <?php } ?>
</select>
<button class="form-control" type="submit" class="btn btn-primary" name="enregistrer" value="enregistrer">Associer</button>