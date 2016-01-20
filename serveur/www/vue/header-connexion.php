<?php 
/**
 * Vue: En tête de l'interface de connexion
 *
 * Barre horizontale en haut de page, contient des informations relatives au statut de l'utilisateur courant (connecté, déconnecté)
 *
 */
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>SOS Pr&eacutema - Espace b&eacuten&eacutevoles</title>
<link rel="icon" type="image/png" href="/vue/images/favicon.png">
	<link href="/vue/style/style.css" rel="stylesheet" /> 
    <script language="javascript" type="text/javascript"> 
        $(".user").focusin(function(){
            $(".inputUserIcon").css("color", "#e74c3c");
        }).focusout(function(){
          $(".inputUserIcon").css("color", "white");
        });

        $(".pass").focusin(function(){
          $(".inputPassIcon").css("color", "#e74c3c");
        }).focusout(function(){
          $(".inputPassIcon").css("color", "white");
        });
    </script>
    </head>
    <body>
    <section id="wrapper">
    	<section id="contenu">
    		<section class="box">
    			<?php require_once('content-header.php'); ?>
				<section class="content">

