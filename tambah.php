<?php
// koneksi ke basis data
$conn = mysqli_connect("localhost", "root", "", "kampusku.com");

// cek apakah tombol simpan sudah diklik?
if( isset($_POST['simpan']) )
{
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $alamat = $_POST['alamat'];

    // simpan ke tabel mahasiswa
    $query = mysqli_query($conn, "INSERT INTO mahasiswa(nama,nim,alamat) VALUES('$nama', '$nim', '$alamat')");
    echo"
        <script>
            alert('Data berhasil ditambahkan');
            window.location.href = 'index.php';
        </script>
    ";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KAMPUSKU.com | TAMBAH DATA MAHASISWA</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e6f0ff; /* Biru muda senada navy */
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 40px auto;
            background-color: white;
            padding: 20px 25px;
            border-radius: 8px;
            box-shadow: 0px 2px 8px rgba(0,0,0,0.1);
        }

        h2 {
            color: #001f3f; /* Navy */
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #001f3f;
            display: block;
            margin-top: 12px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 8px 10px;
            margin-top: 4px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            resize: vertical;
        }

        button {
            background-color: #001f3f; /* Navy */
            color: white;
            border: none;
            padding: 10px 14px;
            margin-top: 15px;
            cursor: pointer;
            font-size: 14px;
            border-radius: 4px;
            width: 100%;
            transition: background 0.3s;
        }

        button:hover {
            background-color: #003366;
        }

        a.kembali {
            display: inline-block;
            margin-top: 12px;
            text-decoration: none;
            color: white;
            background-color: #00509e;
            padding: 8px 12px;
            border-radius: 4px;
            transition: background 0.3s;
        }

        a.kembali:hover {
            background-color: #003366;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Tambah Data Mahasiswa</h2>
    <form action="" method="POST">
        <label>Nama</label>
        <input type="text" name="nama" required>

        <label>NIM</label>
        <input type="text" name="nim" required>

        <label>Alamat</label>
        <textarea name="alamat" rows="4" required></textarea>

        <button type="submit" name="simpan">Simpan</button>
    </form>

    <a href="index.php" class="kembali">Kembali</a>
</div>

</body>
</html>
