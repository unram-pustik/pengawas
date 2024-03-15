<html lang="en">
<?php echo view('layout/v_nav'); ?>

<head>

    <head>
        <?php echo view('layout/v_head'); ?>
        <meta charset="utf-8">


        <!-- Bootstrap core CSS -->
        <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?= base_url() ?>template/plugins/fontawesome-free/css/all.min.css">
        <!-- Bootstrap Color Picker -->
        <link rel="stylesheet"
            href="<?= base_url() ?>template/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet"
            href="<?= base_url() ?>template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <!-- Bootstrap4 Duallistbox -->
        <link rel="stylesheet"
            href="<?= base_url() ?>template/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
        <!-- BS Stepper -->
        <link rel="stylesheet" href="<?= base_url() ?>template/plugins/bs-stepper/css/bs-stepper.min.css">
        <!-- dropzonejs -->
        <link rel="stylesheet" href="<?= base_url() ?>template/plugins/dropzone/min/dropzone.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= base_url() ?>template/dist/css/adminlte.min.css">

    </head>

<body>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered" id="tabel-pengawas">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Unit Kerja</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pengawas as $data): ?>
                    <tr>
                        <td><?php echo $i++;?></td>
                        <td>
                            <?php echo $data["nama"]; ?>
                        </td>
                        <td>
                            <?php echo $data['nip']; ?>
                        </td>
                        <td>
                            <?php echo $data['unit_kerja']; ?>
                        </td>
                    </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>

            <!-- JQuery -->
            <script src="<?= base_url() ?>template/plugins/jquery/jquery.min.js"></script>
            <!-- Bootstrap 4 -->
            <script src="<?= base_url() ?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
            <!-- Bootstrap4 Duallistbox -->
            <script src="<?= base_url() ?>template/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js">
            </script>
            <!-- InputMask -->
            <script src="<?= base_url() ?>template/plugins/moment/moment.min.js"></script>
            <script src="<?= base_url() ?>template/plugins/inputmask/jquery.inputmask.min.js"></script>
            <!-- bootstrap color picker -->
            <script src="<?= base_url() ?>template/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js">
            </script>
            <!-- Tempusdominus Bootstrap 4 -->
            <script
                src="<?= base_url() ?>template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
            </script>
            <!-- Bootstrap Switch -->
            <script src="<?= base_url() ?>template/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
            <!-- BS-Stepper -->
            <script src="<?= base_url() ?>template/plugins/bs-stepper/js/bs-stepper.min.js"></script>
            <!-- dropzonejs -->
            <script src="<?= base_url() ?>template/plugins/dropzone/min/dropzone.min.js"></script>
            <!-- AdminLTE App -->
            <script src="<?= base_url() ?>template/dist/js/adminlte.min.js"></script>
            <!-- AdminLTE for demo purposes -->
            <script src="<?= base_url() ?>template/dist/js/demo.js"></script>

            <!-- Page specific script -->
            <script>
            $(document).ready(function() {

                $('#tabel-pengawas').DataTable();
            });
            </script>


</body>
<div></div>
<footer>
    <?php echo view('layout/v_footer'); ?>
</footer>

</html>