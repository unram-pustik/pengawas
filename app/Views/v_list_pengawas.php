<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>List Pengawas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="mt-3">
            <table class="table table-bordered" id="pengawas-list">
                <thead>
                    <tr>
                        
                        <th>Nama Ujian</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Unit</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    
                    foreach ($data_pengawas as $data) : ?>
                    <tr>
                        
                        <td> <?= $data->kode_ujian ?> </td>
                        <td><?= $data->nip ?></td>
                        <td><?= $data->nama ?></td>
                        <td><?= $data->unit_kerja?></td>
                        <td><?= $data->kode_fak?></td>
                    </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#pengawas-list').DataTable();
    });
    </script>
</body>

</html>