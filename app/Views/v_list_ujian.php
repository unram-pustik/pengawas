<html lang="en">
<?php echo view('layout/v_nav'); ?>
<head>
<?php echo view('layout/v_head'); ?>
    <title>List Ujian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
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
                        <td> <a href="<?= base_url('ujian/detail_ujian/'. $du['kode_ujian']) ?>" class="btn btn-success">Detail</a>
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
    <script>

    $(document).ready(function() {
        $('#ujian-list').DataTable();
    });
    </script>
</body>

<footer>
    <?php echo view('layout/v_footer'); ?>
</footer>

</html>