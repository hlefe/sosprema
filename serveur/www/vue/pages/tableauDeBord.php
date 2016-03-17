<?php 
/**
 * Vue: Page de connexion
 *
 *
 */
  require_once('vue/layout/header.php');
  ?>
     <link crossorigin="anonymous" href="https://assets-cdn.github.com/assets/github-e3dd2ae433414e240167f740f90ff2599e28804648787933de7c0183fae81c29.css" integrity="sha256-490q5DNBTiQBZ/dA+Q/yWZ4ogEZIeHkz3nwBg/roHCk=" media="all" rel="stylesheet">
    <link crossorigin="anonymous" href="https://assets-cdn.github.com/assets/github2-fd8d48abb9063f51f186b0da98caa88d32b7ca8baecaa10d8a91c18a6f129b7f.css" integrity="sha256-/Y1Iq7kGP1HxhrDamMqojTK3youuyqENipHBim8Sm38=" media="all" rel="stylesheet">
    
<section class="content">
    <div class="row">
        <div class="row"> 
            <div class="col-lg-1">
            </div>
            <div class="col-lg-5" style="padding: 20px;">
                 <div class="box box-warning">
                        <div class="box-header with-border">
                                <h3 class="box-title">Développeurs</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding attachment-block clearfix" >
                                <ul class="timeline" style="margin: 20px;">
                                    <li>
                                        <i class="fa fa-graduation-cap bg-orange"></i>
                                        <div class="timeline-item">
                                            <h3 class="timeline-header">Rapport de projet</h3>
                                            <div class="timeline-body">
                                                <a target="_blank" href="content/rapport.pdf"> Accès au rapport de projet</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <i class="fa fa-book bg-orange"></i>
                                        <div class="timeline-item">
                                            <h3 class="timeline-header">Documentation</h3>
                                            <div class="timeline-body">
                                                <a target="_blank" href="/doc"> Accès à la documentation</a>
                                            </div>
                                            
                                        </div>
                                    </li>
                                    <li>
                                        <i class="fa fa-code-fork bg-orange"></i>
                                        <div class="timeline-item">
                                            <h3 class="timeline-header">Github</h3>
                                            <div class="timeline-body">
                                                <a target="_blank" href="https://github.com/hlefe/sosprema"> Accès au projet sur Github</a>
                                            </div>
                                        </div>
                                    </li>
                                    
                                    
                                    
                                </ul>
                        </div>
                        <!-- /.box-body -->
                </div>
                <div class="box box-primary">
                    <div class="box-header with-border">
                            <h3 class="box-title">Retours utilisateurs</h3>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body attachment-block clearfix" >
                        <a href="/index.php?action=retours_utilisateurs" class="btn pull-right">Accès aux retours utilisateurs</a>
                    </div>
                    <!-- /.box-body -->
                </div>
                
                
            </div>
            <div class="col-lg-5" style="padding: 20px;">
                <div class="box box-primary">
                        <div class="box-header with-border">
                                <h3 class="box-title">À propos</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding attachment-block clearfix" >
                                <ul class="timeline" style="margin: 20px;">
                                    
                                     <li>
                                        <i class="fa fa-graduation-cap bg-blue"></i>
                                        <div class="timeline-item">
                                            <h3 class="timeline-header">Réalisation</h3>
                                            <div class="timeline-body">
                                                Réalisé par <b>Hugo Lefèvre</b>,<b> Nicolas Chaduc</b> & <b>Nicolas Audinat</b> dans le cadre d'un projet étudiant à l'<b>IUT de Clermont-Ferrand</b>.
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <i class="fa fa-users bg-blue"></i>
                                        <div class="timeline-item">
                                            <h3 class="timeline-header">MOA</h3>
                                            <div class="timeline-body">
                                                <b>Vincent DESDOIT</b> Responsable logistique à SosPréma
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <i class="fa fa-user bg-blue"></i>
                                        <div class="timeline-item">
                                            <h3 class="timeline-header">MOE</h3>
                                            <div class="timeline-body">
                                                <b>Harketti BENDAOUD</b> Tuteur de projet, <b>IUT de Clermont-Ferrand</b>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <i class="fa fa-puzzle-piece bg-blue"></i>
                                        <div class="timeline-item">
                                            <h3 class="timeline-header">Numéro de version</h3>
                                            <div class="timeline-body">
                                                <b>0.52</b>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                        </div>
                        <!-- /.box-body -->
                </div>
               
            </div>
    </div>
       
    </div>   
</section>
<?php require_once('vue/layout/footer.php'); ?>