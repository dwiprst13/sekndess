<h1>HALAMAN DETAIL BERITA</h1>
<?php
include '../../config.php';
$sql = "SELECT * FROM berita WHERE id_berita='".$_GET['id_berita']."'";
$query = mysqli_query($conn, $sql);
$data  = mysqli_fetch_array($query);
?>

<a href="info_berita.php">Kembali</a>
<p><?= $data['id_berita'] ?></p>
<img src="<?= $data['gambar'] ?>" alt="gaada gambar">
<p><?= $data['judul'] ?></p>
<p><?= $data['isi'] ?></p>