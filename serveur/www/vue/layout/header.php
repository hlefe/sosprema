<?php 
/**
 * Vue: En tête du site 
 *          + inclusion des classes bootstrap
 *          + vérification du type d'écran, etc...
 *          + appel des menus / sidebar)
 */
$pageActuelle =  ModelPage::rechercherPage($_GET['action']);
?>
<script src="//d1ks1friyst4m3.cloudfront.net/toolbar/prod/td.js" async data-trackduck-id="56afbc363c5a000f1734a9c3"></script>
<!DOCTYPE html>
<html>
  <head>
    <!-- Utilisation de UTF-8 -->
    <meta charset="utf-8">
    
    <!-- Vérification concernant internet explorer -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Titre du site -->
    <title>SOS Pr&eacutema - Espace b&eacuten&eacutevoles</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/vue/images/favicon.png">
    
    <!-- Paramètres pour que l'affichage soit responsive -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <!-- Chargement des éléments de Bootstrap -->
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="vue/style/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="vue/style/dist/css/AdminLTE.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="vue/style/plugins/iCheck/flat/blue.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="vue/style/plugins/morris/morris.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="vue/style/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <!-- Date Picker -->
        <link rel="stylesheet" href="vue/style/plugins/datepicker/datepicker3.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="vue/style/plugins/daterangepicker/daterangepicker-bs3.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="vue/style/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- Chargement du skin SOSPréma  -->
    <link rel="stylesheet" href="vue/style/dist/css/skins/skin-sosPrema.css">
    

    <!-- Support du "HTML5 Shim" et de "Respond.js" pour que IE8 supporte le HTML5 et les 'media queries' -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
  </head>
  <body class="hold-transition skin-sosPrema sidebar-mini">
    <div class="wrapper">
        <!-- Appel du menu latéral  -->
        <?php  require_once('vue/layout/content-header.php'); ?>
        <?php if(isset($utilisateurConnecter)){ ?>
        <!-- Appel de la sidebar  -->
            <?php  require_once('vue/layout/sidebar.php'); ?>
        <?php } ?>
        <!-- Contenu de la page -->
        <div class="content-wrapper">
            <!-- En tête du contenu -->
            <section class="content-header">
                <h1>
                <?php echo $pageActuelle->nom; ?>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php?action=accueil"><i class="fa fa-dashboard"></i> Accueil</a></li>
                    <li class="active"><?php echo $pageActuelle->nom; ?></li>
                </ol>
            </section>