<html
    lang="en"
    class="light-style layout-navbar-fixed layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="../../assets/"
    data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>DataTables - Tables | Vuexy - Bootstrap Admin Template</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <script src="<?php echo base_url('assets/vuexy/assets/js/forms-selects.js'); ?>"></script>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/vuexy/assets/img/favicon/favicon.ico'); ?>" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons -->

    <link rel="stylesheet" href=" <?php echo base_url('assets/vuexy/assets/vendor/fonts/fontawesome.css'); ?>" />

    <link rel=" stylesheet" href="<?php echo base_url('assets/vuexy/assets/vendor/fonts/tabler-icons.css'); ?>" />
    <link rel=" stylesheet" href="<?php echo base_url('assets/vuexy/assets/vendor/fonts/flag-icons.css'); ?>" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/vuexy/assets/vendor/css/rtl/core.css" class="template-customizer-core-css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/vuexy/assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/vuexy/assets/css/demo.css'); ?>" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/vuexy/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/vuexy/assets/vendor/libs/node-waves/node-waves.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/vuexy/assets/vendor/libs/typeahead-js/typeahead.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/vuexy/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/vuexy/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/vuexy/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/vuexy/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/vuexy/assets/vendor/libs/flatpickr/flatpickr.css'); ?>" />
    <!-- Row Group CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/vuexy/assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css'); ?>" />
    <!-- Form Validation -->
    <link rel="stylesheet" href="<?php echo base_url('assets/vuexy/assets/vendor/libs/formvalidation/dist/css/formValidation.min.css'); ?>" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="<?php echo base_url('assets/vuexy/assets/vendor/js/helpers.js'); ?>"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="<?php echo base_url('assets/vuexy/assets/vendor/js/template-customizer.js'); ?>"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?php echo base_url('assets/vuexy/assets/js/config.js'); ?>"></script>
</head>

<body>
    <script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/jquery/jquery.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/popper/popper.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vuexy/assets/vendor/js/bootstrap.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/node-waves/node-waves.js'); ?>"></script>

    <script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/hammer/hammer.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/i18n/i18n.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/typeahead-js/typeahead.js'); ?>"></script>

    <script src="<?php echo base_url('assets/vuexy/assets/vendor/js/menu.js'); ?>"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/datatables/jquery.dataTables.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/datatables-responsive/datatables.responsive.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/datatables-buttons/datatables-buttons.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/jszip/jszip.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/pdfmake/pdfmake.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/datatables-buttons/buttons.html5.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/datatables-buttons/buttons.print.js'); ?>"></script>
    <!-- Flat Picker -->
    <script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/moment/moment.js'); ?>" </script>
        < script src = "<?php echo base_url('assets/vuexy/assets/vendor/libs/flatpickr/flatpickr.js'); ?>" >
    </script>
    <!-- Row Group JS -->
    <script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/datatables-rowgroup/datatables.rowgroup.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.js'); ?>"></script>
    <!-- Form Validation -->
    <script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js'); ?>"></script>

    <!-- Main JS -->
    <script src="<?php echo base_url('assets/vuexy/assets/js/main.js'); ?>"></script>

    <!-- Page JS -->
    <script src="<?php echo base_url('assets/vuexy/assets/js/tables-datatables-basic.js'); ?>"></script>
</body>