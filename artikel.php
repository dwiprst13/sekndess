<?php 
$artikel = "SELECT * FROM artikel ORDER BY id_artikel DESC LIMIT 3";
$queryArtikel = mysqli_query($conn, "SELECT * FROM artikel WHERE status = 'publish'");
?>

<body chrome-hide-address-bar class="min-h-[100%]">
    <section class="bg-white dark:bg-gray-900 pt-5 w-[100%] md:w-[85%] lg:w-[80%] mx-auto ">
        <div class="container grid mx-auto text-center ">
            <h1 class="text-2xl text-black dark:text-white font-bold ">ARTIKEL</h1>
        </div>
        <div class="container grid text-gray-900 mx-auto px-4 py-16 w-[90%] md:grid-cols-8 lg:grid-cols-12 gap-5">
            <?php
            while ($row_artikel = mysqli_fetch_assoc($queryArtikel)) {
                $path_relatif = $row_artikel['gambar'];
                $path_baru = str_replace('../../', '', $path_relatif);
                ?>
                    <a href="#" class="flex items-center bg-white border border-gray-200 rounded-lg col-span-6">
                        <img class="object-fill flex-wrap w-full rounded-t-lg h-48 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="<?= $path_baru ?>" style="width: 200px; height: 150px;" alt="">
                        <div class="flex flex-col justify-between p-4 leading-normal">
                            <h5 class="mb-2 flex-wrap text-2xl font-bold tracking-tight text-gray-900 "><?= $row_artikel['judul'] ?></h5>
                            <p class="mb-3 flex-wrap font-normal text-gray-700 dark:text-gray-400 line-clamp-3"><?= $row_artikel['content'] ?></p>
                        </div>
                    </a>
                <?php
            }
            ?>
        </div>
    </section>
</body>
</html>