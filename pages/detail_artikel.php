<?php
$id_artikel = $_GET['id_artikel'];
$artikel = "SELECT * FROM artikel WHERE id_artikel='$id_artikel'";
$result = mysqli_query($conn, $artikel);

if ($result && mysqli_num_rows($result) > 0) {
    $row_artikel = mysqli_fetch_assoc($result);
    $link = $row_artikel['gambar'];
    $baru_link = str_replace('../../', '', $link);
?>

    <h1 class=""><b><?= $row_artikel['judul'] ?></b></h1>
    <img src="<?= $baru_link ?>" alt="Gambar Artikel" class="">
    <p class=""><?= $row_artikel['content'] ?></p>

<?php
}
?>