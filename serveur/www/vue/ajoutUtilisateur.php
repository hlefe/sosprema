<?php require_once('header.php');
require_once('erreur.php');
require_once('confirmation.php');
?>
<h2> Ajouter un utilisateur </h2>
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
        <div id="contenute" class="Caccueil">
            <table>
                <td>
                    <h3>Ajouter cet utilisateur</h3>
                </td>
                <td>
                    <button id="boutonAjouter" class="submit" name="boutonAjouter" type="hidden" value="ajouterUtilisateur"><span class="entypo-plus"></span></button>
                </td>
                </table>
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
        </div>
    </div>
</form>

<?php require_once('footer.php'); ?>


