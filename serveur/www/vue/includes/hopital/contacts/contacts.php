
<!-- Custom Tabs (Pulled to the right) -->
<div class="nav-tabs-custom" style="cursor: initial; ">
    <ul class="nav nav-tabs pull-right" style="cursor: initial; ">
        <li class="active"><a aria-expanded="true" href="#tab_1-1" data-toggle="tab">Contacts locaux</a></li>
        <li class=""><a aria-expanded="false" href="#tab_2-2" data-toggle="tab">Contacts hôpitaux</a></li>
        <li class="pull-left header"><i class="fa fa-users"></i> Contacts</li>
    </ul>
    <div class="tab-content" style="cursor: initial; ">
        <div class="tab-pane active" id="tab_1-1" style="cursor: initial; ">
        <?php include('vue/includes/hopital/contacts/contactsLocaux.php'); ?>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_2-2">
        <?php include('vue/includes/hopital/contacts/contactsHopitaux.php'); ?>
        </div>
        <!-- /.tab-pane -->
    </div>
<!-- /.tab-content -->
</div>