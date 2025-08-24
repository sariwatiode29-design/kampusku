<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "kampusku.com");

$id = $_GET['id'];
// hapus data berdasarkan id yang dikirim
mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");

// kembali ke halaman index
header('location: index.php');
?>