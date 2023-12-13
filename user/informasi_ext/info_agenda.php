<?php
include '../../config.php';
$agenda = "SELECT * FROM agenda ORDER BY id_agenda";
$query = mysqli_query($conn, $agenda);
?>

<?php 
while($row_agenda= mysqli_fetch_array($query)){
    ?>
    <p><?= $row_agenda['judul']?></p>
    <img src="<?= $row_agenda['foto']?>" alt="gambarnya disini"></img>
    <p><?= $row_agenda['deskripsi']?></p>
    <?php
}
?>