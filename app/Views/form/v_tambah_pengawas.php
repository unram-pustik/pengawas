<html lang="en">
<?php echo view('layout/v_nav'); ?>

<head>
    <?php echo view('layout/v_head'); ?>
    <meta charset="utf-8">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>template/plugins/fontawesome-free/css/all.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url() ?>template/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- daterange picker -->
    <!-- <link rel="stylesheet" href="<?= base_url() ?>template/plugins/daterangepicker/daterangepicker.css"> -->
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
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Daftar Pengawas</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="<?= base_url(); ?>form/tambah_pengawas">
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Daftar Ujian</label>
                                    <select class="form-control" name="kode_ujian" style="width: 100%;">
                                        <option selected="selected">Pilih Ujian</option>
                                        <option value="SNBT">SNBT </option>
                                        <option value="Pascasarjana">Pascasarjana</option>
                                        <option value="Mandiri">Seleksi Mandiri</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="form-group">
                            <label>Date range:</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span> 
                                </div>
                                <input type="text" class="form-control float-right" id="reservation">
                            </div>
                        </div> -->
                        <div class="form-group">
                            <label class="col-form-label" for="inputSuccess">Pilih Pengawas</label>
                            <select class="select2bs4 select2" id="select_staff" name="pengawas[]" multiple="multiple"
                                data-placeholder="Pilih Pengawas" style="width: 100%;">
                            </select>
                        </div>
                        <button type="submit" value="submit" class="btn btn-success">Ajukan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"> -->
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> -->

    <!-- JQuery -->
    <script src="<?= base_url() ?>template/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="<?= base_url() ?>template/plugins/select2/js/select2.full.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= base_url() ?>template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
    </script>
    <!-- Bootstrap Switch -->
    <script src="<?= base_url() ?>template/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- BS-Stepper -->
    <script src="<?= base_url() ?>template/plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>template/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url() ?>template/dist/js/demo.js"></script>

    <!-- Page specific script -->
    <script>
    $(document).ready(function() {
        //Date range picker
        $('#reservation').daterangepicker()

        $('#staf-list').DataTable();

        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        })

        //Date range as a button
        $('#daterange-btn').daterangepicker({
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf(
                        'month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },

            function(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                    'MMMM D, YYYY'))
            }
        )
    });

    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })

    $('#select_staff').select2({
        placeholder: 'Pilih Pengawas',
        width: "100%",
        escapeMarkup: function(markup) {
            return markup;
        },
        minimumInputLength: 2,
        maximumInputLength: 5, // tambahkan limit inputan
        maximumSelectionLength: 3, // tambahkan limit pilihan
        templateResult: function(item) {
            if (item.loading)
                return item.text;

            var id = JSON.parse(item.id);

            var PSInfo = '-';
            if (item.nama_PS) {
                PSInfo = '(' + item.nama_PS + ')';
            }

            var unitInfo = id["unit"] ? id["unit"] : "-";

            return '<strong>' + item.text + '</strong><br/>' +
                '<small>' + id["id"] + '</small> <br/>' +
                '<small><b>Jurusan: ' + PSInfo + ' / ' + 'Unit: ' + unitInfo + '<b/></small>';
        },

        templateSelection: function(item) {
            var data_id = JSON.parse(item.id);

              // Add a numbering to the selected item
              var indexed = $('#select_staff').val().indexOf(item.id);
                var selectedNumber = indexed + 1;

                // return '<strong>Penguji ' + selectedNumber + '</strong>' + ' | ' + item.text;

            return selectedNumber +' | ' + data_id["id"] +' | ' + item.text;
            
        },
        ajax: {
            url: '<?= base_url() ?>pengawas/get_api',
            type: 'GET',

            dataType: 'json',
            // headers: {
            //     'Authorization': "Basic bXl1bnJhbTp3M3lSZkRuazloSmRKVg",
            // },
            data: function(params) {
                return {
                    nama: params.term,
                    number: 100,
                };
            },
            processResults: function(response) {
                var results = [];

                $.each(response, function(index, item) {
                    results.push({
                        id: JSON.stringify({
                            "text": item.nama,
                            "id": item.kode,
                            "nama_PS": item.nama_PS,
                            "unit": item.unit,
                            "kode_fak": item.kode_fak,
                        }),
                        text: item.nama,
                        nama_PS: item.nama_PS,
                        unit: item.unit,
                        kode_fak: item.kode_fak,
                    });
                });
                return {
                    results: results
                }
            },
            cache: true
        },
    })
    </script>


</body>
<div></div>
<footer>
    <?php echo view('layout/v_footer'); ?>
</footer>

</html>