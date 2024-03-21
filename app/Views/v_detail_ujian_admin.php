<html lang="en">
<?php helper('kode_helper');
 ?>

<?php echo view('layout/v_nav'); ?>

<head>
    <?php echo view('layout/v_head'); ?>
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url() ?>template/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?= base_url() ?>template/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="<?= base_url() ?>template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="<?= base_url() ?>template/plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="<?= base_url() ?>template/plugins/dropzone/min/dropzone.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="container mt-6">
        <div class="mt-6">
            <div class=" col-sm-12">
            </div>
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Daftar Pengawas</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="<?= base_url(); ?>form/tambah_pengawas_byadmin">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="kode">Kode Ujian : </label>
                                    <input type="text" class="form-control" id="kode" name="kode_ujian"
                                        value="<?= $data_ujian['kode_ujian']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Ujian : </label>
                                    <input type="text" class="form-control" id="nama" name="nama_ujian"
                                        value="<?= $data_ujian['nama_ujian']; ?>" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label" for="inputSuccess">Pilih Pengawas</label>
                                <select class="select2bs4 select2" id="select_staff" name="pengawas[]"
                                    multiple="multiple" data-placeholder="Pilih Pengawas" style="width: 100%;"></select>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label" for="inputSuccess">Pilih PJL dan WPJL</label>
                                <select class="select2bs4 select2" id="pjl-select" name="pjl[]"
                                    multiple="multiple" data-placeholder="Pilih PJL dan WPJL" style="width: 100%;"></select>
                            </div>
                        </div>
                        <button type="submit" value="submit" class="btn btn-success">Ajukan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="container mt-5">
        <div class="col-md-3">
        <form action="<?php echo site_url('pengawas/export_pengawas'); ?>" method="post">
            <button type="submit" class="btn btn-outline-info btn-block btn-flat cursor-on-hover">
                <i class="fa fa-download"></i> Download Data Pengawas</button>
        </form>
        </div>
    
        <div class="mt-3">
            <table class="table table-bordered" id="pengawas-list">
                <caption>Tabel Pengawas</caption>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Ujian</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Unit Kerja</th>
                        <th>Status</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1; 
                    foreach ($data_pengawas as $data) : ?>
                    <tr>
                        <td><?php echo $i++;?></td>
                        <td><?= $data['nama_ujian'] ?? '' ?></td>
                        <td><?= $data['nip'] ?? '' ?></td>
                        <td><?= $data['nama'] ?? '' ?></td>
                        <td><?= $data['unit_kerja'] ?? '' ?></td>
                        <td><?= $data['status'] ?? '' ?></td>

                        <td><a href="<?= base_url('form/hapus_pengawas/') . $data['kode_pengawas'] ?>"
                                class="btn-hapus-pengawas" data-kode_pengawas="<?=  $data['kode_pengawas'] ?>"><i
                                    class="fas fa-trash"></i></a></td>
                    </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
        </div>
    </div>
<hr>
    <!-- tabel pjl -->
    <div class="container mt-5">
    <div class="col-md-3">
        <form action="<?php echo site_url('pengawas/export_pjl'); ?>" method="post">
            <button type="submit" class="btn btn-outline-info btn-block btn-flat cursor-on-hover">
                <i class="fa fa-download"></i> Download Data PJL-WPJL</button>
        </form>
        </div>
        <div class="mt-3">
            <table class="table table-bordered" id="pjl-list">
            <caption>Tabel Pengawas</caption>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Ujian</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Unit Kerja</th>
                        <th>Status</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1; 
                    foreach ($data_pjl as $data) : ?>
                    <tr>
                        <td><?php echo $i++;?></td>
                        <td><?= $data['nama_ujian'] ?? '' ?></td>
                        <td><?= $data['nip'] ?? '' ?></td>
                        <td><?= $data['nama'] ?? '' ?></td>
                        <td><?= $data['unit_kerja'] ?? '' ?></td>
                        <td><?= $data['status'] ?? '' ?></td>

                        <td><a href="<?= base_url('form/hapus_pjl/') . $data['kode_pjl'] ?>"
                                class="btn-hapus-pjl" data-kode_pjl="<?=  $data['kode_pjl'] ?>"><i
                                    class="fas fa-trash"></i></a></td>
                    </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
        </div>
    </div>





    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
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
        $('#pjl-list').DataTable();
        $('#pengawas-list').DataTable();
      
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
        maximumSelectionLength: 15, // tambahkan limit pilihan
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

            return selectedNumber + ' | ' + data_id["id"] + ' | ' + data_id["text"];

        },
        ajax: {
            url: '<?= base_url() ?>pengawas/get_api',
            type: 'GET',

            dataType: 'json',
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
    });

    $('#pjl-select').select2({
        placeholder: 'Pilih PJL & WPJL',
        width: "100%",
        escapeMarkup: function(markup) {
            return markup;
        },
        minimumInputLength: 2,
        maximumInputLength: 5, // tambahkan limit inputan
        maximumSelectionLength: 15, // tambahkan limit pilihan
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
            var indexed = $('#pjl-select').val().indexOf(item.id);
            var selectedNumber = indexed + 1;

            return selectedNumber + ' | ' + data_id["id"] + ' | ' + data_id["text"];

        },
        ajax: {
            url: '<?= base_url() ?>pengawas/get_api',
            type: 'GET',

            dataType: 'json',
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
    });

    </script>

</body>
<footer>
    <?php echo view('layout/v_footer'); ?>
</footer>

</html>