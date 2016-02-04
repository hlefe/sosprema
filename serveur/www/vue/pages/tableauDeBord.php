<?php 
/**
 * Vue: Page de connexion
 *
 *
 */
  require_once('vue/layout/header-connexion.php');
  require_once('vue/includes/erreur.php');
  ?>
<body class="hold-transition login-page">
<div class="col-lg-1">
    <a href="index.php" class="btn btn-app">
                <i class="fa fa-home"></i>Retour</a>
    
</div>  
<div class="col-lg-3" style="padding: 20px;">
    <div class="box box-primary">
            <div class="box-header with-border">
                    <h3 class="box-title">À faire</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding" >
                    <ul class="timeline" style="margin: 20px;">
                        <li class="time-label">
                            <span class="bg-red">
                                Avant le 19 mars
                            </span>
                        </li>
                        <li>
                            <i class="fa fa-puzzle-piece bg-blue"></i>
                            <div class="timeline-item">
                                <h3 class="timeline-header">Gestionnaire des contacts</h3>
                                <div class="timeline-body">
                                    Réalisation d'un annuaire des différents contacts locaux.
                                </div>
                            </div>
                        </li>
                        <li>
                            <i class="fa fa-puzzle-piece bg-blue"></i>
                            <div class="timeline-item">
                                <h3 class="timeline-header">Soutenance</h3>
                                <div class="timeline-body">
                                    Réalisation du compte rendu + préparation soutenance
                                </div>
                            </div>
                        </li>
                    </ul>
            </div>
            <!-- /.box-body -->
    </div>
</div>   
            
<div class="col-lg-3" style="padding: 20px;">
    <div class="box box-warning">
            <div class="box-header with-border">
                    <h3 class="box-title">En cours</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding" >
                    <ul class="timeline" style="margin: 20px;">
                        <li class="time-label">
                            <span class="bg-red">
                                Pour le 5 février
                            </span>
                        </li>
                         <li>
                            <i class="fa fa-pencil bg-orange"></i>
                            <div class="timeline-item">
                                <h3 class="timeline-header">Interface de personnalisation</h3>
                                <div class="timeline-body">
                                    Interface donnant la possibilité de modifier des éléments de style et de design.
                                </div>
                                <div class="progress progress-sm active">
                                    <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                    <span class="sr-only">40% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <i class="fa fa-pencil bg-orange"></i>
                            <div class="timeline-item">
                                <h3 class="timeline-header">Simplification du modèle</h3>
                                <div class="timeline-body">
                                    Travail pour simplifier des éléments de programmation.
                                </div>
                                <div class="progress progress-sm active">
                                    <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                    <span class="sr-only">60% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="time-label">
                            <span class="bg-red">
                                Pour le 7 février
                            </span>
                        </li>
                        <li>
                            <i class="fa fa-pencil bg-orange"></i>
                            <div class="timeline-item">
                                <h3 class="timeline-header">Commenter le code</h3>
                                <div class="timeline-body">
                                    Réaliser les commentaires du code pour simplifier la documentation
                                </div>
                                <div class="progress progress-sm active">
                                    <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%">
                                    <span class="sr-only">10% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="time-label">
                            <span class="bg-red">
                                Pour le 8 février
                            </span>
                        </li>
                        <li>
                            <i class="fa fa-pencil bg-orange"></i>
                            <div class="timeline-item">
                                <h3 class="timeline-header">Gestionnaire des hôpitaux</h3>
                                <div class="timeline-body">
                                    Création d'un gestionnaire des différents hôpitaux en relation avec l'association.
                                </div>
                                <div class="progress progress-sm active">
                                    <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 5%">
                                    <span class="sr-only">5% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        
                    </ul>
            </div>
            <!-- /.box-body -->
    </div>
</div>

<div class="col-lg-3" style="padding: 20px;">
    <div class="box box-success">
            <div class="box-header with-border">
                    <h3 class="box-title">Terminé</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding" >
                    <ul class="timeline" style="margin: 20px;">
                        <li class="time-label">
                            <span class="bg-red">
                                Aujourd'hui
                            </span>
                        </li>
                        <li>
                            <i class="fa fa-check bg-green"></i>
                            <div class="timeline-item">
                                <h3 class="timeline-header">Analyse initiale</h3>
                                <div class="timeline-body">
                                   Réalisation du cahier des charges.
                                </div>
                            </div>
                        </li>
                        <li>
                            <i class="fa fa-check bg-green"></i>
                            <div class="timeline-item">
                                <h3 class="timeline-header">Interface de connexion</h3>
                                <div class="timeline-body">
                                   Réalisation de l'interface de connexion et des contrôleurs utilisateurs
                                </div>
                            </div>
                        </li>
                        <li>
                            <i class="fa fa-check bg-green"></i>
                            <div class="timeline-item">
                                <h3 class="timeline-header">Finalisation interface de connexion</h3>

                            </div>
                        </li>
                        <li>
                            <i class="fa fa-check bg-green"></i>
                            <div class="timeline-item">
                                <h3 class="timeline-header">Mise en place serveur web</h3>
                                <div class="timeline-body">
                                   Installation d'un serveur git pour simplifier la communication.
                                </div>
                            </div>
                        </li>
                        <li>
                            <i class="fa fa-check bg-green"></i>
                            <div class="timeline-item">
                                <h3 class="timeline-header">Gestionnaire des utilisateurs</h3>
                                <div class="timeline-body">
                                   Réalistion d'un gestionnaire utilisateurs pour permettre la modifications des données utilisateurs.
                                </div>
                            </div>
                        </li>
                        <li>
                            <i class="fa fa-check bg-green"></i>
                            <div class="timeline-item">
                                <h3 class="timeline-header">Mise en place du framework bootstrap</h3>
                                <div class="timeline-body">
                                   Pour simplifier la mise en place de belles interfaces.
                                </div>
                            </div>
                        </li>
                    </ul>
            </div>
            <!-- /.box-body -->
    </div>
</div>

</body>