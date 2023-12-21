<?php
$id_artikel = $_GET['id_artikel'];
$artikel = "SELECT * FROM artikel WHERE id_artikel='$id_artikel'";
$result = mysqli_query($conn, $artikel);

if ($result && mysqli_num_rows($result) > 0) {
    $row_artikel = mysqli_fetch_assoc($result);
    $link = $row_artikel['gambar'];
    $baru_link = str_replace('../../', '', $link);
?>

    <body>
        <section id="visi-misi" class="w-[100%] md:w-[100%] lg:w-[80%] mx-auto">
            <div class="container grid mx-auto text-center">
            </div>
            <div class="w-[100%] flex mx-auto grid grid-cols-12 gap-8 pt-10 pb-8 py-3">
                <div class="visi p-5 lg:col-span-9 bg-[#0088CC] text-white rounded-lg ">
                    <h1 class="text-3xl text-center py-3"><b><?= $row_artikel['judul'] ?></b></h1>
                    <img src="<?= $baru_link ?>" alt="Gambar Artikel" class="">
                    <p class="py-3"><?= $row_artikel['content'] ?></p>
                </div>
                <div class="visi p-5 lg:col-span-3 bg-[#0088CC] rounded-lg h-auto">
                    
                </div>

            </div>
        </section>
    </body>
<?php
}
?>
