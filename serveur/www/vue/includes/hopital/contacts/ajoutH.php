<?php 
/**
 * Vue ajoutH
 *             
 * Permet d'ajouter un contact interne à l'hopital dans un hopital
 *
 */
?>
<div class="form-group" >
    <label>Nom</label>
    <input class="form-control" name="nom" type="text" >
</div>
<div class="form-group" >
    <label>Prénom</label>
    <input class="form-control" name="prenom" type="text">
</div>
<div class="form-group" >
    <label>Profession</label>
    <input class="form-control" name="profession" type="text">
</div>

<div class="form-group" >
    <label>Numéro</label>
    <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-phone"></i> 
            </div>
            
            <input class="form-control" name="numero" type="text">
    </div>
</div>
    
    
</div>
</select>

<button class="form-control" type="submit" class="btn btn-primary" name="enregistrer" value="enregistrer">Ajouter</button>