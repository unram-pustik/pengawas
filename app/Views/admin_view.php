<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Data Staf</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="mt-3">
            <table class="table table-bordered" id="staf-list">
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

                    <?php foreach ($staf as $staf): ?>
                    <tr>
                        <td>
                            <?php echo $staf['kode']; ?>
                        </td>
                        <td>
                            <?php echo $staf['nama']; ?>
                        </td>
                        <td>
                            <?php echo $staf['NIP']; ?>
                        </td>
                        <td>
                            <?php echo $staf['unit_kerja']; ?>
                        </td>
                        <td> <a href="<?= site_url('/staf') ?>" class="btn btn-success">Tambah</a>
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
        $('#staf-list').DataTable();
    });
    </script>
</body>

</html>