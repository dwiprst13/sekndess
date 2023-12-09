<?php 
$artikel = "SELECT * FROM artikel ORDER BY id_artikel DESC LIMIT 3";
$queryArtikel = mysqli_query($conn, "SELECT * FROM artikel WHERE status = 'publish'");
?>

<body chrome-hide-address-bar class="min-h-[100%]">
    <section class="bg-white  pt-5 w-[100%] md:w-[85%] lg:w-[80%] mx-auto ">
        <div class="container grid mx-auto text-center ">
            <h1 class="text-2xl text-black font-bold ">ARTIKEL</h1>
        </div>
        <div class="container grid text-gray-900 mx-auto px-4 py-16 w-[90%] md:grid-cols-8 lg:grid-cols-12 gap-5">
            <?php
            while ($row_artikel = mysqli_fetch_assoc($queryArtikel)) {
                $path_relatif = $row_artikel['gambar'];
                $path_baru = str_replace('../../', '', $path_relatif);
                ?>
                    <a href="?page=detail_artikel" class="items-center bg-white border border-gray-200 rounded-lg col-span-6 md:col-span-8 lg:col-span-6 hover:scale-105 duration-500">
                        <div class="flex p-2 lg:p-4 grid grid-cols-8 md:grid-cols-10 lg:grid-cols-12 ">
                            <img class="object-fill col-span-3 md:col-span-4 lg:col-span-5 flex flex-wrap w-full h-32 md:h-48 md:rounded-s-lg" src="<?= $path_baru ?>"  alt="">
                            <div class="flex col-span-5 md:col-span-6 lg:col-span-7 flex-col justify-between p-4 leading-normal">
                                <h5 class="mb-2 flex-wrap md:text-xl lg:text-2xl font-bold tracking-tight text-gray-900 "><?= $row_artikel['judul'] ?></h5>
                                <p class=" flex-wrap text-base md:text-lg font-normal text-gray-700 dark:text-gray-400 line-clamp-3"><?= $row_artikel['content'] ?></p>
                            </div>
                        </div>
                    </a>
                <?php
            }
            ?>
        </div>
    </section>
</body>
</html>