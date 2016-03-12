<?php 
/**
 * Vue: Pied de page du site 
 *              +Appelle les scripts jquery
 *
 *
 */
?>
        </div><!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 0.51
        </div>
        <strong> Réalisé dans le cadre d'un projet étudiant avec l'IUT de Clermont-Ferrand.</strong>
    </footer>

    <!-- Scripts divers et variés  -->
        <!-- Configuration du plugin fileInput  --> 
        <script>
            $("#file").fileinput({
                showClose: false,
                language: 'fr',
                showUpload: false,
                showCaption: false,
                browseClass: "btn btn-primary",
                fileType: "image",
                previewFileType: "image",
                defaultPreviewContent: '<img style="max-height: 100px" src="<?php  if(isset($utilisateur)) echo $utilisateur->avatar; ?>">',
                browseLabel: '',
                removeLabel: '',
                maxFileSize: 1500,

                previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
                allowedFileExtensions: ["jpg", "png", "gif"]
            });
        </script>
        <!-- boottrapSwitch -->
        <script src="vue/style/plugins/bootstrap-switch-master/dist/js/bootstrap-switch.js"></script>
        <!-- boottrapSwitch run -->
        <script>
            $(function(argument) {
            $('[type="checkbox"]').bootstrapSwitch();
            })
        </script>
        <!-- bootstrapPopover -->
        <script>
            $(document).ready(function(){
               $('*[data-poload]').hover(function() {
                    var e=$(this);
                    e.off('hover');
                    $.get(e.data('poload'),function(d) {
                        e.popover({content: d, html: true, placement: 'left'}).popover('show');
                    });
                });
            });                                             
        </script>
        <script>
            $('body').on('click', function (e) {
                $('*[data-poload]').each(function () {
                    //the 'is' for buttons that trigger popups
                    //the 'has' for icons within a button that triggers a popup
                    if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
                        $(this).popover('hide');
                    }
                });
            });     
        </script> 

        <!-- jQuery UI 1.11.4 -->
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
        $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Morris.js charts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="vue/style/plugins/morris/morris.min.js"></script>
        <!-- Sparkline -->
        <script src="vue/style/plugins/sparkline/jquery.sparkline.min.js"></script>
        <!-- jvectormap -->
        <script src="vue/style/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="vue/style/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="vue/style/plugins/knob/jquery.knob.js"></script>
        <!-- daterangepicker -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
        <script src="vue/style/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- datepicker -->
        <script src="vue/style/plugins/datepicker/bootstrap-datepicker.js"></script>
        <script src="vue/style/plugins/datepicker/locales/bootstrap-datepicker.fr.js" charset="UTF-8"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="vue/style/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <!-- Slimscroll -->
        <script src="vue/style/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="vue/style/plugins/fastclick/fastclick.min.js"></script>
        <!-- AdminLTE App -->
        <script src="vue/style/dist/js/app.min.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="vue/style/dist/js/pages/dashboard.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="vue/style/dist/js/demo.js"></script>
        <!-- DatePicker --> 
        <script>   
        $('[class="form-control date"]').datepicker({
            autoclose: true,
            language: 'fr',
            defaultViewDate: {year:2000, month:0, day:1},
            todayHighlight: true
        });
        </script>
  </body>
</html>