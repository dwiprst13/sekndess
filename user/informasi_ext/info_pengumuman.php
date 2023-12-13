<?php
include '../../config.php';
$pengumuman = "SELECT * FROM pengumuman ORDER BY id_pengumuman";
$query = mysqli_query($conn, $pengumuman);
?>

<?php 
while($row_pengumuman= mysqli_fetch_array($query)){
    ?>
    <p><?= $row_pengumuman['judul']?></p>
    <p><?= $row_pengumuman['isi']?></p>
    <p><?= $row_pengumuman['date']?></p>
    <?php
}
?>