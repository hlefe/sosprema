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
        <div class="col-lg-5" style="padding: 20px;">
            <div class="box box-primary">
                <div class="box-header with-border">
                        <h3 class="box-title">Retours utilisateurs à prendre en compte </h3>
                </div>

                <!-- /.box-header -->
                <div class="box-body no-padding attachment-block clearfix" >
                    <?php 
                            $adresse = "https://github.com/hlefe/sosprema/issues" ; 
                            $page = @file_get_contents ($adresse); // récupérer le contenu de la page   


                            preg_match_all('/<ul class="table-list .*?>(.*?)<\/ul>/si', $page, $matches); 

                            $liste = str_replace("/hlefe", "https://github.com/hlefe", $matches[1][0]); 

                            echo $liste;

                    ?>
                </div>
                <!-- /.box-body -->
            </div> 
        
            <div class="box box-primary">
                <div class="box-header with-border">
                        <h3 class="box-title">Retours utilisateurs résolus </h3>
                </div>

                <!-- /.box-header -->
                <div class="box-body no-padding attachment-block clearfix" >
                    <?php 
                            $adresse = "https://github.com/hlefe/sosprema/issues?q=is%3Aissue+is%3Aclosed" ; 
                            $page = @file_get_contents ($adresse); // récupérer le contenu de la page   


                            preg_match_all('/<ul class="table-list .*?>(.*?)<\/ul>/si', $page, $matches); 

                            $liste = str_replace("/hlefe", "https://github.com/hlefe", $matches[1][0]); 

                            echo $liste;

                    ?>
                </div>
                <!-- /.box-body -->
            </div> 
        </div>
        <div class="col-lg-5" style="padding: 20px;">
            <div class="box box-primary">
                <div class="box-header with-border">
                        <h3 class="box-title">Dernières modifications </h3>
                </div>

                <!-- /.box-header -->
                <div class="box-body no-padding attachment-block clearfix" >
                    <?php 
                            $adresse = "https://github.com/hlefe/sosprema/commits/master" ; 
                            $page = @file_get_contents ($adresse); // récupérer le contenu de la page   


                            preg_match_all('/<ol .*?>(.*?)<\/ol>/si', $page, $matches); 

                            $liste = str_replace("/hlefe", "https://github.com/hlefe", $matches[1][0]); 

                            echo $liste;
                        
                    ?>
                </div>
                <!-- /.box-body -->
            </div> 
        </div>
    </div>
        
</section>
<?php require_once('vue/layout/footer.php'); ?>










