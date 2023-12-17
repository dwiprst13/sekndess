<!DOCTYPE html>
<html lang="en">

<body>
<section class="bg-white pt-5 w-[100%] md:w-[85%] lg:w-[80%] mx-auto ">
        <div class="container grid mx-auto text-center ">
            <h1 class="text-2xl text-black font-bold ">GALERI</h1>
        </div>
        <div class="container grid text-white mx-auto px-4 py-16 w-[90%] md:grid-cols-8 lg:grid-cols-12 gap-8">
            <?php 
                $galeri = "SELECT * FROM galeri ORDER BY id_doc DESC";
                $querygaleri = mysqli_query($conn, $galeri);
                
            ?>
                <?php
                while ($row_galeri = mysqli_fetch_assoc($querygaleri)) {
                    
                    $path_relatif = $row_galeri['documentasi'];
                    $path_baru = str_replace('../../', '', $path_relatif);
                    ?>
                    <button id="detailGambar" href="?page=detail_galeri&id_doc=<?= $row_galeri['id_doc'] ?>" class="card-galeri p-2 bg-[#0088CC] w-[100%] text-white md:col-span-4 lg:col-span-4 rounded-lg lg:hover:bg-blue-600 lg:hover:scale-105 ease-in duration-500">
                        <h1 class="text-center pt-3 text-lg"><b><?= $row_galeri['judul'] ?></b></h1>
                        <img src="<?= $path_baru?> " alt="" class="h-48 pt-3 w-[100%]">
                        <p class="text-center text-sm pt-3 line-clamp-3"><?= $row_galeri['deskripsi'] ?></p>
                    </button>
                    <?php
                    }
                ?>
        </div>
        
    </section>
    <script>
        const detailGaleri = document.getElementById("detailGambar");


    </script>
</body>
</html>