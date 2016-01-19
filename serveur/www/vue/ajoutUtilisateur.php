<?php require_once('header.php');
require_once('erreur.php');
require_once('confirmation.php');
?>
 <div class="contenuteSansFond ">
        <div class="colonneGauche wtitre">
            <h2> Ajouter un utilisateur </h2>
        </div>
        <div class="colonneDroite wtitre">
            <div class="green">
                <button id="boutonAjouter" class="submit" name="boutonAjouter" type="hidden" value="ajouterUtilisateur"><span class="entypo-check">&nbsp;Ajouter</span></button>

            </div>
        </div>
    </div>
  <form method="post" action="index.php?action=ajouterUtilisateur">
    <div class="colonneGauche infosAccueil">
        <div id="contenute" class="Caccueil">
                <h3>Informations</h3>
                <label for="nom">Nom</label>
                <input required type="text" name="nom" placeholder="nom" />
                
                <label for="prenom">Prénom</label>
                <input required type="text" name="prenom" placeholder="prenom" />
                
                <label for="email">Adresse Mail</label>
                <input required type="text" name="email" placeholder="exemple@gmail.com" />
        </div>  
    </div> 

    <div class="colonneDroite infosAccueil">
        <div id="contenute" class="Caccueil">
            <h3>Adresse</h3>
            <label for="num_rue">Numéro de rue</label>
            <input type="text" name="num_rue" placeholder="52" />
            
            <label for="nom_rue">Nom de rue</label>
            <input type="text" name="nom_rue" placeholder="nom de rue" />
            
            <label for="code_postal">Code postal</label>
            <input type="text" name="code_postal" placeholder="63000" />

            <label for="ville">Ville</label>
            <input type="text" name="ville" placeholder="ville" />

            <h3>Niveau de l'utilisateur</h3>
            <input type="text" name="libelle_niveau" list="niveauUser">
            <datalist id="niveauUser">
                <?php
                    foreach ($allNiveau as $niveau) {
                        echo "<option value=".$niveau["libelle"].">".$niveau["libelle"]."</option>";
                    }
                ?>
            </datalist>
        </div>
    </div>
</form>

<?php require_once('footer.php'); ?>