 <?php 
/* Champs informations
*
* Si l'on est dans le cas de l'édition de l'utilisateur:
*    La variable '$utilisateur' de type 'Utilisateur' doit être préalablement définie,
*    pour pouvoir compléter les données déjà enregistrées.
*    
*Si on est dans le cas de l'ajout d'un utilisateur, rien à faire.
*
*Les champs suivants sont définis:
*        nom             Nom de l'utilisateur
*        prenom          Prénom de l'utilisateur
*        email           Adresse email de l'utilisateur
*        
 */
?> 
<div class="box-header with-border">
    <h3 class="box-title">Informations</h3>
    <div class="box-tools pull-right">
        <span class="label label-primary">Requis</span>
    </div>
</div>
<div class="box-body">
    <div class="form-group">
        <label for="nom">Nom</label>
        <input class="form-control" required type="text" name="nom" value="<?php if(isset($utilisateur)) echo $utilisateur->nom; ?>" />
    </div>
    <div class="form-group">
            <label for="prenom">Prénom</label>
            <input class="form-control" required type="text" name="prenom" value="<?php if(isset($utilisateur)) echo $utilisateur->prenom;?>" />
    </div>
    <div class="form-group">
            <label for="email">Adresse Mail</label>
            <input class="form-control" required type="email" name="email" value="<?php if(isset($utilisateur)) echo $utilisateur->email;?>" />
    </div>
    <div class="form-group">
        <label>Téléphones:</label>
        
        <!-- Boucle for pour chaque numéro de cet utilisateur, l'afficher  -->
       <?php if(isset($utilisateur)){
            if($utilisateur->telephones != null){
                foreach($utilisateur->telephones as $telephone){
        ?>
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-phone"></i> 
            </div>
            <div class="input-group-addon">
                <?php echo $telephone->type; ?>
            </div>
            <input class="form-control " data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;" data-mask="" type="text" value="<?php echo $telephone->numero; ?>" readonly>
            <div class="input-group-addon"> 
                <?php if ($_GET["action"]=="profil"){ ?>
                    <a href='?action=supprimerTelephone&idTelephone=<?php echo $telephone->idTelephone; ?>&edit=true'>
                        <i class="fa fa-close btn-danger"></i>
                    </a>
                <?php }else{ ?>
                    <a href='?action=supprimerTelephoneUser&idTelephone=<?php echo $telephone->idTelephone; ?>&edit=true'>
                        <i class="fa fa-close btn-danger"></i>
                    </a>
                <?php } ?>
            </div>    
            
        </div>
        
         <!-- Fin de la boucle-->
       <?php 
                }
            }
       }
        ?>
         <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-phone"></i> 
            </div>
            <div class="input-group-addon" style="padding: 0px;">
                <input class="form-control" type="text" name="intitule" placeholder="Intitulé" style="border: 0px none; height: 30px; width:150px;">
            </div>
             
             <!-- c'est avec le onkeyup qu'on remplace le numéro en ajoutant les espaces -->
             <input class="form-control" type="text" name="numero" placeholder="Numéro" onkeyup="this.value=this.value.replace(/(\d{2})(?=\d)/,'$1 ')">
            <div class="input-group-addon" style="padding: 0px;"> 
                <button class="btn ">
                        <i class="fa fa-plus "></i>
                </button>
            </div>    
        </div>
       

     </div>
</div>