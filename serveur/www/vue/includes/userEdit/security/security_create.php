 <?php 
/* Champs permettants de définir les infos de sécurité à la création d'un utilisateur.

La variable '$niveaux' doit être préalablement définie.

Les champs suivants sont définis:

        prenom          Mot de passe de l'utilisateur
        email           Niveau de l'utilisateur 
        
 */
?> 
<div class="box-header with-border">
    <h3 class="box-title">Sécurité et droits</h3>
    <div class="box-tools pull-right">
        <span class="label label-primary">Requis</span>
    </div><!-- /.box-tools -->
</div><!-- /.box-header -->
<div class="box-body">
    <div class="col-xs-5">
        <div class="form-group">
            <label >Définir un niveau de responsabilité pour l'utilisateur</label>
            <?php foreach($niveaux as $niveau){ ?>
                <div class="radio">
                    <label>
                    <input name="libelle_niveau" id="optionsRadios<?php echo $niveau['idNiveau']; ?>" value="<?php echo $niveau['nom']; ?>" checked="" type="radio">
                        <?php echo $niveau['nom']; ?>
                    </label>
                </div>
            <?php } ?>
        </div>
        </div>
    <div class="col-xs-5">
        <div class="form-group">
            <label for="oldMDP">Définir un mot de passe</label>
            <input class="form-control" required type="password" name="motDePasse" placeholder="mot de passe" />
        </div>
    </div>
</div>