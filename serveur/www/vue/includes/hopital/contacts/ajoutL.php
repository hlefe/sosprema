<p> Associer un contact local à l'hôpital</p>
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