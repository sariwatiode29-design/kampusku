<?php 
// koneksi basis data
$conn = mysqli_connect("localhost", "root", "", "kampusku.com");

// ambil semua data dari tabel mahasiswa
$data = mysqli_query($conn, "SELECT * FROM mahasiswa");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KAMPUSKU.COM | BERANDA </title>
        <!-- CSS DataTable -->
    <link rel="stylesheet"
    href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <!-- JS DataTable -->
    <script
    src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <!-- DataTables Buttons CSS & JS -->
    <link rel="stylesheet"
    href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css
    ">
    <script
    src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script
    src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script>
    $(document).ready(function() {
    $('#myTable').DataTable({
    dom: 'Bfrtip',
    buttons: [
    'excelHtml5',
    'csvHtml5',
    'pdfHtml5'
    ]
    });
    });
    </script>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #e6f0ff; /* Biru muda senada navy */
        margin: 20px;
    }

    h1, h2, h3 {
        color: #001f3f; /* Navy gelap */
    }

    a.tombol-tambah {
        background-color: #001f3f; /* Navy */
        color: white;
        text-decoration: none;
        padding: 8px 14px;
        border-radius: 4px;
        font-size: 14px;
        transition: background 0.3s;
    }

    a.tombol-tambah:hover {
        background-color: #003366; /* Navy lebih terang */
    }

    table.dataTable {
        border-collapse: collapse;
        width: 100%;
        font-size: 14px;
        background-color: white; /* Biar tabel kontras di atas background biru muda */
        border-radius: 6px;
        overflow: hidden;
        box-shadow: 0px 2px 6px rgba(0,0,0,0.1);
    }

    table.dataTable thead {
        background-color: #001f3f; /* Navy */
        color: white;
    }

    table.dataTable tbody tr:nth-child(even) {
        background-color: #f2f6ff;
    }

    table.dataTable tbody tr:hover {
        background-color: #dbe9ff;
    }

    table.dataTable td, table.dataTable th {
        padding: 8px;
        text-align: left;
    }

    table.dataTable td a {
        margin-right: 5px;
        text-decoration: none;
        color: white;
        background-color: #00509e;
        padding: 4px 8px;
        border-radius: 3px;
        font-size: 12px;
        transition: background 0.3s;
    }

    table.dataTable td a:hover {
        background-color: #003366;
    }

    /* Styling tombol export DataTables */
    .dt-button {
        background-color: #001f3f !important;
        color: white !important;
        border: none !important;
        padding: 6px 12px !important;
        border-radius: 4px !important;
        font-size: 13px !important;
        transition: background 0.3s !important;
    }

    .dt-button:hover {
        background-color: #003366 !important;
    }
</style>

</head>
<body>
<a href="tambah.php" style="background-color: blue; color:white; text-decoration:none;padding:3px">Tambah Data</a>
<table border="1" style="margin-top: 10px;"id="myTable" class="display">
    <thead>
        <th>No</th>
        <th>Nama</th>
        <th>NIM</th>
        <th>Alamat</th>
        <th>Aksi</th>
    </thead>
    <tbody>
        <?php $nomor = 1 ?>
        <?php while( $row = mysqli_fetch_assoc($data)) { ?>
        <tr>
            <td> <?= $nomor?> </td>
            <td> <?= $row['nama'] ?> </td>
            <td> <?= $row['nim'] ?> </td>
            <td> <?= $row['alamat'] ?> </td>
            <td>
                <a href="hapus.php?id=<?= $row['id'] ?>" onclick=" return confirm('hapus data ini ?')">hapus</a>
                <a href="edit.php?id=<?= $row['id'] ?>">Edit</a>
            </td>
        </tr>

        <?php $nomor++ ?>
        <?php } ?>
    </tbody>
</table>
        <script>
    $(document).ready(function() {
    $('#myTable').DataTable();
    });
    </script>
</body>
</html>