<?php
/**
 * Vue confirmation
 *             
 * de confirmer une modification par une infobulle verte en haut de page avant le contenu de la page
 *
 */
 ?>
        <?php if(isset($vueConfirmation)) { ?>
        
            <div class="row">
                <section class="col-lg-7 ">
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h3 class="box-title">Confirmation</h3>
                                <div class="box-tools pull-right">
                                    <span class="label label-primary">Info</span>
                                </div><!-- /.box-tools -->
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <?php foreach ($vueConfirmation as $key => $value) { echo $value; } ?>
                            </div>
                        </div><!-- /.box -->
                </section>
            </div>
        <?php } ?>