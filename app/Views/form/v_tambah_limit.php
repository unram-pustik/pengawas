<html lang="en">
<?php echo view('layout/v_nav'); ?>

<head>
    <?php echo view('layout/v_head'); ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>template/plugins/fontawesome-free/css/all.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="<?= base_url() ?>template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="<?= base_url() ?>template/plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>template/dist/css/adminlte.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="container mt-5">
        <div class="mt-3">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Tambah Kuota Pengawas</h3>
                </div>
                <form class="form-horizontal" method="post" action="<?= base_url(); ?>form/tambah_limit">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="kode">Kode Ujian : </label>
                            <select class="form-control" id="kode_ujian" name="kode_ujian">
                                <option value="">-- Pilih Kode Ujian --</option>
                                <?php foreach($data_ujian as $data): ?>
                                <option value="<?= $data['kode_ujian'] ?>"><?= $data['nama_ujian'] ?></option>
                                <?php endforeach; ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Fakultas : </label>
                            <select class="form-control" id="kode_fak" name="kode_fak">
                                <option value="">-- Pilih Fakultas --</option>
                                <?php foreach($data_fakultas as $fak): ?>
                                <option value="<?= $fak['kode'] ?>"><?= $fak['fakultas_nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Jumlah Kuota Pengawas</label>
                            <input class="form-control number" name="limit" type="number" placeholder="Jumlah Kuota">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <hr>

    <div class="container mt-5">
        <div class="mt-3">
            <table class="table table-bordered" id="limit-list">
                <thead>
                    <tr>
                        <th>Nama Ujian</th>
                        <th>Nama Fakultas</th>
                        <th>Kuota</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    foreach ($data_limit as $data) : ?>
                    <tr>
                        <td><?= $data['nama_ujian']?> </td>
                        <td><?= $data['fakultas_nama']?></td>
                        <td><?= $data['limit'] ?></td>

                    </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
        </div>
    </div>

   
    <!-- JQuery -->
    <script src="<?= base_url() ?>template/plugins/jquery/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url() ?>dist/js/demo.js"></script>

    <script>
    $(document).ready(function() {
        $('limit-list').DataTable();
    });

    $(function() {
        bsCustomFileInput.init();
    });
    </script>
</body>

<?php echo view('layout/v_footer'); ?>


</html>