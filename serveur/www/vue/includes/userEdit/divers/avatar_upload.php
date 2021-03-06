 <?php 
/* Utilisation et configuration du plugin fileinput pour la définition de l'avatar. 
*
* La source du plugin se trouve dans le répertoire vue/style/plugins/fileinput/
*
* Si l'on est dans le cas de l'édition de l'utilisateur:
*   La variable '$utilisateur' de type 'Utilisateur' doit être préalablement définie,
*    pour pouvoir compléter les données déjà enregistrées.
*    
* Si on est dans le cas de l'ajout d'un utilisateur, rien à faire.
*
* Les champs suivants sont définis:
*       avatar          Avatar de l'utilisateur
*        
*/
?> 
<!-- Appel des différents scripts/styles nécssaires pour l'utilisation du plugin  -->
<head>
    <link href="vue/style/plugins/fileinput/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    <script src="vue/style/plugins/fileinput/js/fileinput.js" type="text/javascript"></script>
    <script src="vue/style/plugins/fileinput/js/fileinput_locale_fr.js" type="text/javascript"></script>
    <script src="vue/style/plugins/fileinput/js/fileinput_locale_es.js" type="text/javascript"></script>
</head>

<!-- Ré-écriture de certains éléments de style  -->
<style>
.kv-avatar .file-preview-frame,.kv-avatar .file-preview-frame:hover {
    margin: 0;
    padding: 0;
    border: none;
    box-shadow: none;
    text-align: center;
}
.kv-avatar .file-input {
    display: table-cell;
    max-width: 220px;
}
</style>

<!-- Le champ avatar  -->
<div class="kv-avatar center-block">
    <input id="file" name ="avatar" value="<?php if(isset($utilisateur)) echo $utilisateur->avatar; ?>" type="file">
</div>

