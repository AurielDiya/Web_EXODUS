<?php
require 'function.php';

if (!isset($_SESSION['log_in']) || $_SESSION['log_in'] !== 'true') {
    header('location:login.php');
    exit;
}

$pekerja = $_SESSION['nama_pekerja'];
$role = $_SESSION['jabatan'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Transaksi EXODUS</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/style1.css">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <style>
        .buttons-copy {
            background-color: #392222 !important;
        }

        .buttons-copy span,
        .buttons-excel span,
        .buttons-pdf span,
        .buttons-print span {
            color: #fff;
        }

        .buttons-excel {
            background-color: #379237 !important;
        }

        .buttons-pdf {
            background-color: #D61C4E !important;
        }

        .buttons-print {
            background-color: #FEB139 !important;
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <?php include './components/header.php'; ?>
    <div id="layoutSidenav">
        <?php include './components/sidenav.php'; ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Laporan Transaksi</h1>
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="text-center">Laporan Transaksi</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive data-tables">
                                <table class="table table-bordered" id="mauexport" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Tanggal Transaksi</th>
                                            <th>Nama Barang</th>
                                            <th>Jenis Barang</th>
                                            <th>Status Transaksi</th>
                                            <th>Jumlah Barang</th>
                                            <th>Nama Pekerja</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $listlaporan = mysqli_query($koneksi, "select * from laporan_transaksi");

                                        while ($data = mysqli_fetch_array($listlaporan)) {
                                            $tanggal = $data['Tanggal Transaksi'];
                                            $barang = $data['Nama Barang'];
                                            $jenis = $data['Jenis Barang'];
                                            $status = $data['Status Transaksi'];
                                            $jumlah = $data['Jumlah Barang'];
                                            $admin = $data['Nama Pekerja'];
                                        ?>
                                            <tr>
                                                <td><?= $tanggal; ?></td>
                                                <td><?= $barang; ?></td>
                                                <td><?= $jenis; ?></td>
                                                <td><?= $status; ?></td>
                                                <td><?= $jumlah; ?></td>
                                                <td><?= $admin; ?></td>
                                            </tr>
                                        <?php
                                        };
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <?php include './components/footer.php'; ?>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#mauexport').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- buttons -->
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
</body>


</html>