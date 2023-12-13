<?php
$id_artikel = $_GET['id_artikel'];
$artikel = "SELECT * FROM artikel ORDER BY id_artikel";
$queryArtikel = mysqli_query($conn, "SELECT * FROM artikel WHERE status = 'publish'");

echo "$queryArtikel";
?>