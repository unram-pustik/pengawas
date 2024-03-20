<html lang="en">
<?php echo view('layout/v_nav'); ?>

<head>
    <?php echo view('layout/v_head'); ?>
    
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
                        <td>
                            <a href="#" class="btn btn-success btn-sm edit-limit" data-id="<?=  $data['id'] ?>" data-toggle="modal" data-target="#editLimit">Edit</a>
                            
                            <a href="<?= base_url(); ?>form/hapus_limit/<?= $data['id'] ?>" onclick="return confirm('Apakah anda ingin menghapus data ini?')" class="btn btn-danger btn-sm">Delete</a>
                        </td>
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

    <!-- Modal -->
    <div class="modal fade" id="editLimit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Kuota Pengawas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <input type="hidden" name="id" id="editId">
                        <div class="form-group">
                            <label for="editLimitInput">Jumlah Kuota Pengawas</label>
                            <input type="number" name="limit" id="editLimitInput" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveEditBtn">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#editLimit').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');

            var modal = $(this);
            modal.find('.modal-title').text('Edit Kuota Pengawas ' + id);
            modal.find('.modal-body #editId').val(id);

            $.ajax({
                url: '<?= base_url() ?>form/get_limit/' + id,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    var limit = data.kuota;
                    modal.find('.modal-body #editLimitInput').val(limit);
                }
            })
        });

        $('#saveEditBtn').on('click', function() {
            var id = $('#editLimit #editId').val();
            var limit = $('#editLimit #editLimitInput').val();
            $.ajax({
                url: '<?= base_url() ?>form/edit_limit/' + id,
                method: 'POST',
                data: {
                    limit: limit
                },
                success: function() {
                    $('#editLimit').modal('hide');
                    location.reload();
                }
            });
        });
    </script>

</html>