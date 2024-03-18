<html lang="en">
<?php echo view('layout/v_nav'); ?>

<head>
    <?php echo view('layout/v_head'); ?>
    <meta charset="utf-8">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>template/plugins/fontawesome-free/css/all.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="<?= base_url() ?>template/plugins/daterangepicker/daterangepicker.css">
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
    <div class="container mt-5">
        <div class="mt-3">
        <a href="<?= site_url('ujian/list_ujian/') ?>" class="btn btn-success">Lihat List Daftar Ujian</a>
        <hr>
            <div class="card card-success">
            
                <div class="card-header">
                    <h3 class="card-title">Daftar Ujian</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="<?= base_url(); ?>form/tambah_ujian">
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Kode Ujian</label>
                                    <input class="form-control" name="kode_ujian" type="text" placeholder="Kode Ujian">
                                </div>
                                <div class="form-group">
                                    <label>Nama Ujian</label>
                                    <input class="form-control" name="nama_ujian" type="text" placeholder="Nama Ujian">
                                </div>
                                <div class="form-group">
                                    <label>Tahun Ujian</label>
                                    <input class="form-control" name="tahun_ujian" type="text"
                                        placeholder="Tahun Ujian">
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea class="form-control" rows="3" name="ket_ujian"
                                        placeholder="Keterangan"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Pengawas</label>
                                    <input class="form-control" name="tahun_ujian" type="text"
                                        placeholder="Tahun Ujian">
                                </div>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label>Tanggal Mulai Ujian :</label>
                            <div class="input-group date" id="tgl_mulai" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" name="tgl_mulai_ujian"
                                    data-target="#tgl_mulai" />
                                <div class="input-group-append" data-target="#tgl_mulai"
                                    data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Tanggal Berakhir Ujian :</label>
                            <div class="input-group date" id="tgl_akhir" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" name="tgl_akhir_ujian"
                                    data-target="#tgl_akhir" />
                                <div class="input-group-append" data-target="#tgl_akhir"
                                    data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div> -->
                        <button type="submit" value="submit" class="btn btn-success">Ajukan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>template/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="<?= base_url() ?>template/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <!-- InputMask -->
    <script src="<?= base_url() ?>template/plugins/moment/moment.min.js"></script>
    <script src="<?= base_url() ?>template/plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- date-range-picker -->
    <script src="<?= base_url() ?>template/plugins/daterangepicker/daterangepicker.js"></script>

    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= base_url() ?>template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
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
    // Date range picker
    $('#tgl_ujian').daterangepicker()

    $(document).ready(function() {
        $('#staf-list').DataTable();
    });

   
    //Date and time picker
    $('#tgl_mulai').datetimepicker({
        icons: {
            time: 'far fa-clock'
        }
    });

    $('#tgl_akhir').datetimepicker({
        icons: {
            time: 'far fa-clock'
        }
    });

    //Date range as a button
    $('#daterange-btn').daterangepicker({
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf(
                    'month')]
            },
            startDate: moment().subtract(29, 'days'),
            endDate: moment()
        },
        function(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
    )
    </script>
</body>
<div></div>
<footer>
    <?php echo view('layout/v_footer'); ?>
</footer>

</html>