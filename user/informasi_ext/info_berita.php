<?php
include '../../config.php';
$berita = "SELECT * FROM berita ORDER BY id_berita";
$query = mysqli_query($conn, $berita);
?>

<?php 
while($row_berita= mysqli_fetch_array($query)){
    $id_berita = $row_berita['id_berita'];
    ?>
    <a href="info_detail_berita.php?id_berita=<?= $id_berita ?>">
        <div class="bg-gray-300">
            <p><?= $row_berita['judul']?></p>
            <img src="<?= $row_berita['gambar']?>" alt="gambar berita">
            <p><?= $row_berita['isi']?></p>
        </div>
    </a>
    <?php
}
?>