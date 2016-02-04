 <?php 
/* Utilisation et configuration du plugin fileinput pour la définition de l'avatar. 

La source du plugin se trouve dans le répertoire vue/style/plugins/fileinput/

Si l'on est dans le cas de l'édition de l'utilisateur:
    La variable '$utilisateur' de type 'Utilisateur' doit être préalablement définie,
    pour pouvoir compléter les données déjà enregistrées.
    
Si on est dans le cas de l'ajout d'un utilisateur, rien à faire.

Les champs suivants sont définis:
        avatar          Avatar de l'utilisateur
        
 */
?> 
<!-- Appel des différents scripts/styles nécssaires pour l'utilisation du plugin  -->
<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript"></script>
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
    <input id="file" name ="avatar" value="<?php echo $utilisateur->avatar; ?>" type="file" multiple>
</div>

<!-- Configuration du plugin fileInput  -->
<script>
$("#file").fileinput({
    showClose: false,
    language: 'fr',
    showUpload: false,
    showCaption: false,
    browseClass: "btn btn-primary btn-lg",
    fileType: "image",
    previewFileType: "image",
    defaultPreviewContent: '<img style="max-height: 100px" src="<?php  echo $utilisateur->avatar; ?>">',
    browseLabel: '',
    removeLabel: '',
    maxFileSize: 1500,

    previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
    allowedFileExtensions: ["jpg", "png", "gif"]
});
    
</script>