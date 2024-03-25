<html lang="en">
<?php echo view('layout/v_nav'); ?>
<?php echo view('layout/v_head'); ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-5">
    <div class="mt-3">
        <!-- <a href="<?= site_url('ujian/list_ujian/') ?>" class="btn btn-success">Lihat List Daftar Ujian</a> -->
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
                                <input class="form-control" name="tahun_ujian" type="text" placeholder="Tahun Ujian">
                            </div>
                            <div class="form-group">
                                <label>Keterangan (optional)</label>
                                <textarea class="form-control" rows="3" name="ket_ujian" placeholder="Keterangan"
                                    aria-describedby="helpId"></textarea>
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

<div class="container mt-5">
    <div class="mt-3">
        <table class="table table-bordered" id="ujian-list">
            <thead>
                <tr>
                    <th>Kode Ujian</th>
                    <th>Nama Ujian</th>
                    <th>Tahun Ujian</th>
                    <!-- <th>Tanggal Mulai Ujian</th>
                        <th>Tanggal Selesai Ujian</th> -->
                    <th>#</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($data_ujian as $du): ?>
                <tr>
                    <td>
                        <?php echo $du['kode_ujian']; ?>
                    </td>
                    <td>
                        <?php echo $du['nama_ujian']; ?>
                    </td>
                    <td>
                        <?php echo $du['tahun_ujian']; ?>
                    </td>
                    <!-- <td>
                            <?php echo $du['tgl_mulai_ujian']; ?>
                        </td>
                        <td>
                            <?php echo $du['tgl_akhir_ujian']; ?>
                        </td> -->

                    <td><a href="<?= base_url('ujian/detail_ujian/'. $du['kode_ujian']) ?>"
                            class="btn btn-success">Detail</a>
                        <a href="<?= base_url('ujian/hapus/'. $du['kode_ujian']) ?>"
                            onclick="return confirm('Apakah anda ingin menghapus data ini?')"
                            class="btn btn-danger">Hapus</href=></a>
                    </td>
                    <td><a href="<?= base_url('ujian/limit/'. $du['kode_ujian']) ?>" class="btn btn-warning">Tambah
                            Limit</a>
                    </td>
                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<!-- Page specific script -->
<script>
// Date range picker
$('#tgl_ujian').daterangepicker()

$(document).ready(function() {
    $('#ujian-list').DataTable();
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
<?php echo view('layout/v_footer'); ?>
