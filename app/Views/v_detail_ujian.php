<html lang="en">
<?php helper('kode_helper');
 ?>
<?php echo view('layout/v_nav'); ?>
    <?php echo view('layout/v_head'); ?>
    
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url() ?>template/plugins/select2/css/select2.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <div class="container mt-5">
        <?php if(session()->get('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->get('error') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php endif; ?>
        <div class="mt-6">
            <div class=" col-sm-12">
                <div class="info-box bg-warning">
                    <div class="info-box-content">
                        <span class="info-box-number">Jumlah Pengawas yang dapat diajukan oleh
                            <?php if(!empty($data_limit)): ?>
                            <?php echo $data_limit[0]['fakultas_nama']; ?>: <?php echo $data_limit[0]['limit']; ?>
                            <?php else: ?>
                            <span style="color:red;">Data kosong</span>
                            <?php endif; ?>

                    </div>
                </div>
            </div>
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Daftar Pengawas</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="<?= base_url(); ?>form/tambah_pengawas">

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

                            <!-- <div class="form-group">
                                <label class="col-form-label" for="inputSuccess">Pilih PJL dan WPJL</label>
                                <select class="select2bs4 select2" id="pjl_select" name="pjl[]"
                                    multiple="multiple" data-placeholder="Pilih PJL dan WPJL" style="width: 100%;"></select>
                            </div> -->
                        </div>
                        <button type="submit" value="submit" class="btn btn-success">Ajukan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="container mt-5">
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
                                onclick="return confirm('Apakah anda ingin menghapus data ini?')"
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

                        <td><a href="<?= base_url('form/hapus_pjl/') . $data['kode_pjl'] ?>" class="btn-hapus-pjl"
                                data-kode_pjl="<?=  $data['kode_pjl'] ?>"><i class="fas fa-trash"></i></a></td>
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
        // maximumSelectionLength: 15, // tambahkan limit pilihan
        templateResult: function(item) {
            if (item.loading)
                return item.text;

            var id = JSON.parse(item.id);

            var PSInfo = '-';
            if (item.unit_kerja) {
                PSInfo = '(' + item.unit_kerja + ')';
            }

            var unitInfo = id["unit_kerja"] ? id["unit_kerja"] : "-";

            return '<strong>' + item.text + '</strong><br/>' +
                '<small>' + id["id"] + '</small> <br/>' +
                '<small><b>Unit: ' + unitInfo + '<b/></small>';
        },

        templateSelection: function(item) {
            var data_id = JSON.parse(item.id);

            // Add a numbering to the selected item
            var indexed = $('#select_staff').val().indexOf(item.id);
            var selectedNumber = indexed + 1;

            return selectedNumber + ' | ' + data_id["id"] + ' | ' + data_id["text"] + ' | ' + data_id[
                "status"];

        },
        ajax: {
            url: function(params) {
                return '<?= base_url() ?>pengawas/get_Pegawai?fakultas=' +
                    '<?= session()->get('fakultas') ?>';
            },
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
                            "id": item.nip,
                            "gol": item.gol,
                            "status": item.status,
                            "unit_kerja": item.unit_kerja,
                            "kode_fakultas": item.kode_fakultas,
                        }),
                        //data yang mau dipakai
                        text: item.nama,
                        status: item.status,
                        unit_kerja: item.unit_kerja,
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

    $('#pjl_select').select2({
        placeholder: 'Pilih PJL & WPJL',
        width: "100%",
        escapeMarkup: function(markup) {
            return markup;
        },
        minimumInputLength: 2,
        maximumInputLength: 5, // tambahkan limit inputan
        // maximumSelectionLength: 15, // tambahkan limit pilihan
        templateResult: function(item) {
            if (item.loading)
                return item.text;

            var id = JSON.parse(item.id);

            var PSInfo = '-';
            if (item.unit_kerja) {
                PSInfo = '(' + item.unit_kerja + ')';
            }

            var unitInfo = id["unit_kerja"] ? id["unit_kerja"] : "-";

            return '<strong>' + item.text + '</strong><br/>' +
                '<small>' + id["id"] + '</small> <br/>' +
                '<small><b>Unit: ' + unitInfo + '<b/></small>';
        },

        templateSelection: function(item) {
            var data_id = JSON.parse(item.id);

            // Add a numbering to the selected item
            var indexed = $('#pjl_select').val().indexOf(item.id);
            var selectedNumber = indexed + 1;

            return selectedNumber + ' | ' + data_id["id"] + ' | ' + data_id["text"] + ' | ' + data_id[
                "status"];

        },
        ajax: {
            url: function(params) {
                return '<?= base_url() ?>pengawas/get_Pegawai?fakultas=' +
                    '<?= session()->get('fakultas') ?>';
            },
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
                            "id": item.nip,
                            "gol": item.gol,
                            "status": item.status,
                            "unit_kerja": item.unit_kerja,
                            "kode_fakultas": item.kode_fakultas,
                        }),
                        //data yang mau dipakai
                        text: item.nama,
                        status: item.status,
                        unit_kerja: item.unit_kerja,
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

    <?php echo view('layout/v_footer'); ?>