<?php 
/**
 * Vue: Page principale
 *
 * Barre horizontale en haut de page, contient des informations relatives au statut de l'utilisateur courant (connecté, déconnecté)
 * 
 *
 *
 */
require('vue/layout/header.php');
?>
<!-- Main content -->
<section class="content">
    <!-- Main row -->
    <div class="row">
    <!-- Left col -->
    <section class="col-lg-7 ">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">L'engagement SOSPréma</h3>
                <div class="box-tools pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
                <span class="label label-primary">À lire</span>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body">
                <img style="width:80%" src="vue/images/photobandeau.png">
            </div><!-- /.box-body -->
            <div class="box-footer">
                Tout savoir sur le fonctionnement de l'association...
            </div><!-- box-footer -->
        </div><!-- /.box -->

    </section><!-- /.Left col -->
    <!-- right col (We are only adding the ID to make the widgets )-->
    <section class="col-lg-3 ">

       <div class="box box-solid box-info">
           <div class="box-header with-border">
                <h3 class="box-title">Twitter</h3>
                <div class="box-tools pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
                <span class="label label-primary">Social</span>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body">
                <a class="twitter-timeline"  href="https://twitter.com/SOSPrema" data-widget-id="683938070039781376">Tweets de @SOSPrema</a>
                 <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	
            </div><!-- /.box-body -->
            <div class="box-footer">
                Twitter: @SosPrema
            </div><!-- box-footer -->
       </div>
    </section><!-- right col -->
    </div><!-- /.row (main row) -->

</section><!-- /.content -->
<?php
require('vue/layout/footer.php');
?>