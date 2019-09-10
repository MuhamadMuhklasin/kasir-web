    <!-- Jquery Core Js -->
    <script src="<?php echo base_url("assets/") ?>plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url("assets/") ?>plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url("assets/") ?>plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url("assets/") ?>plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="<?php echo base_url("assets/") ?>plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- ChartJs -->
    <script src="<?php echo base_url("assets/") ?>plugins/chartjs/Chart.bundle.js"></script>

    <!-- select 2 -->
    <script type="text/javascript" src="<?php echo base_url('assets/plugins/select2/dist/js/select2.min.js') ?>"></script>

    <!-- Select Plugin Js -->
    <script id="bs-select-js" src="<?php echo base_url("assets/") ?>plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- DataTable -->
    <script src="<?php echo base_url("assets/") ?>plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo base_url("assets/") ?>plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>

    <!-- Autosize Plugin Js -->
    <script src="<?php echo base_url("assets/") ?>plugins/autosize/autosize.js"></script>

    <!-- Moment Plugin Js -->
    <script src="<?php echo base_url("assets/") ?>plugins/momentjs/moment.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="<?php echo base_url("assets/") ?>plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Bootstrap Datepicker Plugin Js -->
    <script src="<?php echo base_url("assets/") ?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

    <!-- Bootstrap Notify Plugin Js -->
    <script src="<?php echo base_url("assets/") ?>plugins/bootstrap-notify/bootstrap-notify.js"></script>

    <!-- acounting js -->
    <script type="text/javascript" src="<?php echo base_url('assets/plugins/acounting/acounting.js') ?>"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url("assets/")?>js/admin.js"></script>
    <script src="<?php echo base_url("assets/")?>js/pages/index.js"></script>
    <script src="<?php echo base_url("assets/") ?>js/pages/forms/basic-form-elements.js"></script>

    <!-- Demo Js -->
    <script src="<?php echo base_url("assets/")?>js/demo.js"></script>

    <!-- init -->
    <?php $this->corelib->view_loader("templates/js/init.php") ?>

    <?php  

        // admin view
        if($this->uri->segment(3) == "home" && $this->uri->segment(1) == "admin") {
            $this->corelib->view_loader("admin/js/home");
            $this->corelib->view_loader("templates/admin/js");
        }
        else if($this->uri->segment(3) == "menu_resto" && $this->uri->segment(1) == "admin") {
            $this->corelib->view_loader("admin/js/menu_resto");
            $this->corelib->view_loader("templates/admin/js");
        }
        else if($this->uri->segment(3) == "pesanan" && $this->uri->segment(1) == "admin"){
            $this->corelib->view_loader("admin/js/pesanan");
            $this->corelib->view_loader("templates/admin/js");
        }
        else if($this->uri->segment(3) == "transaksi" && $this->uri->segment(1) == "admin"){
            $this->corelib->view_loader("admin/js/transaksi");
            $this->corelib->view_loader("templates/admin/js");
        }

        // waiter view
        if($this->uri->segment(3) == "pesanan" && $this->uri->segment(1) == "waiter"){
            $this->corelib->view_loader("waiter/js/pesanan");
            $this->corelib->view_loader("templates/waiter/js");
        }

        // kasir view
        if($this->uri->segment(3) == "transaksi" && $this->uri->segment(1) == "kasir"){
            $this->corelib->view_loader("kasir/js/transaksi");
            $this->corelib->view_loader("templates/kasir/js");
        }
    ?>
</body>

</html>