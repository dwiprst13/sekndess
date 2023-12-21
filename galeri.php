
<?php
    // Menentukan button di bagian mana yang di klik untuk melakukan aksi
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Mengklik tombol kirim keluhan 
        if (isset($_POST['kirim_keluhan'])){
            $_SESSION['judul'] = $_POST["judul"];
            $_SESSION['keluhan'] = $_POST["keluhan"]; // Menyimpan sesi keluhan & judul untuk dikirim ke lapor.php
            header("Location: ?page=lapor");
            exit();
        } 
        // Mengklik tombol login
        elseif(isset($_POST["masuk"])){
            $email = $_POST["email"];
            $password = md5($_POST["password"]);
            $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'"); //Memanggil data user dari db untuk sesi aktif
            $row = mysqli_fetch_assoc($result);
            if(mysqli_num_rows($result) > 0){
                if($password == $row['password']){
                    if ($row['role']=='admin') {
                        $_SESSION['id_user_admin']=$row['id_user'];
                        $_SESSION['login_admin']='login';
                        header('Location: dashboard/admin/index.php');
                        exit();
                    }else{
                        $_SESSION['id_user']=$row['id_user'];
                        $_SESSION['login']='login';
                        header ('Location: index.php');
                    } 
                }
                else{
                }
            }
            }
        } 
?>

<head>
</head>
<body chrome-hide-address-bar class="bg-white">
    <!-- Banner -->
    <section class=" w-[100%] md:w-[85%] lg:w-[80%] mx-auto">
        <div class="grid h-screen w-[90%] md:w-[85%] lg:w-[80%] px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl xl:text-6xl">WEB TERPADU DESA WIJIMULYO</h1>
                <p class="max-w-2xl mb-6 font-light text-gray-900 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-900">Selamat datang di Situs Web Resmi Desa Wijimulyo!. 

Kami dengan bangga mempersembahkan platform daring ini sebagai pusat informasi dan interaksi untuk seluruh masyarakat Desa Wijimulyo. Situs web ini dirancang untuk memberikan akses mudah dan cepat terhadap berbagai informasi penting, berita terkini, serta kegiatan dan acara yang sedang berlangsung di desa kami.</p>
                <a href="#visi-misi" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white dark:text-white rounded-lg bg-[#0088CC] hover:bg-blue-500 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900 ">
                    Jelajahi
                    <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
                
                <?php if(!empty($userInfo)){ ?>
                    <a href="?page=lapor" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white bg-[#0088CC] rounded-lg hover:bg-blue-500 focus:ring-4 focus:ring-gray-100 dark:text-white dark:focus:ring-gray-800">
                    Lapor
                </a>
                <?php }
                else { ?>
                    <a href="login.php" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white bg-[#0088CC] rounded-lg hover:bg-blue-500 focus:ring-4 focus:ring-gray-100 dark:text-white dark:focus:ring-gray-800">
                    Lapor
                </a>
                <?php } ?>
            </div>
            <div class="hidden place-self-center lg:mt-0 lg:col-span-5 lg:flex margin-left: 10">
                <img src="asset/logo-desa.jpg" alt="banner">
            </div>                
        </div>
    </section>
    <!-- Jadwal Buka -->
    <!-- <section class="w-[100%] md:w-[85%] lg:w-[80%] mx-auto ">
        <div class=" mx-auto w-[90%] md:w-[85%] py-16 lg:w-[80%] justify-center">
            <div class="p-5 w-[100%] bg-[#0088CC] rounded-lg text-center text-white">
                <p class="text-xl p-3">Jadwal Buka</p>
                <p class="text-base p-3">Sekarang Hari <span id="hari"></span></p>
                <p class="text-base p-3">Pelayanan <span id="status"></span></p>
                <p class="text-base p-3"> Hari ini kami buka pukul 08.00 - 14.00 WIB</p>
            </div>
        </div>
    </section> -->
    <!-- Visi & Misi -->
    <section id="visi-misi" class="w-[100%] md:w-[85%] lg:w-[80%] mx-auto" >
        <div class="container grid mx-auto text-center">
            <h1 class="text-2xl text-black font-bold ">VISI & MISI</h1>
        </div>
        <div class="container text-white flex grid mx-auto px-4 py-16 gap-8 w-[90%] md:w-[85%] lg:w-[80%] lg:grid-cols-12">
            <div class="visi p-5 lg:col-span-6 bg-[#0088CC]  rounded-lg" >
                <h1 class="text-center text-2xl font-bold pb-5">VISI</h1>
                <p class="text-center">Desa Maju Berbasis Budaya, Harmoni Alam, dan Kesejahteraan Bersama.
</p>
            </div>
            <div class="misi p-5 lg:col-span-6 bg-[#0088CC] rounded-lg" >
                <h1 class="text-center text-2xl font-bold pb-5">MISI</h1>
                <p class=" text-justify">1. Pengembangan budaya lokal <br>
                    2. Pelestarian Alam dan Lingkungan <br>
                    3. Pemberdayaan Ekonomi Lokal <br>
                    4. Akses Pendidikan dan Kesehatan <br>
                    5. Peningkatan Infrastruktur <br>
                    6. Partisipasi Masyarakat <br>
                    7. Kesejahteraan Sosial
                </p>
            </div>
        </div>
    </section>
    <!-- Artikel -->
    <section class=" w-[100%] md:w-[85%] lg:w-[80%] mx-auto ">
        <div class="container grid mx-auto text-center ">
            <h1 class="text-2xl text-black font-bold ">ARTIKEL</h1>
        </div>
        <div class="container grid text-white mx-auto px-4 py-16 w-[90%] md:w-[85%] lg:w-[80%] md:grid-cols-8 lg:grid-cols-12 gap-8">
            <?php 
                $artikel = "SELECT * FROM artikel ORDER BY id_artikel ";
                $queryArtikel = mysqli_query($conn, "SELECT * FROM artikel WHERE status = 'publish' ORDER BY id_artikel LIMIT 3");
            ?>
                <?php
                while ($row_artikel = mysqli_fetch_assoc($queryArtikel)) {
                    $path_relatif = $row_artikel['gambar'];
                    $path_baru = str_replace('../../', '', $path_relatif);
                    ?>
                        <a href="?page=detail_artikel" class="card-galeri p-2 bg-[#0088CC] w-[100%] md:col-span-4 lg:col-span-4 rounded-lg lg:hover:bg-blue-600 lg:hover:scale-105 ease-in duration-500">
                            <h1 class="text-center pt-3 text-lg"><?= $row_artikel['judul'] ?></h1>
                            <img src="<?= $path_baru ?>" alt="" class="h-52 pt-3 w-28 w-full">
                            <p class="text-justify pt-3 line-clamp-3"><?= $row_artikel['content'] ?></p>
                        </a>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="flex justify-center pb-16 mx-auto w-[90%] md:w-[85%] lg:w-[80%]">
            <a class="decoration-none bg-[#0088CC] w-40 text-center text-white p-1 rounded-lg hover:shadow-md  " href="?page=artikel">Selengkapnya</a>
        </div>
    </section>
    <!-- Galeri -->
    <section class="w-[100%] md:w-[85%] lg:w-[80%] mx-auto">
        <div class="container grid mx-auto text-center">
            <h1 class="text-2xl text-black font-bold ">GALERI</h1>
        </div>
        <div class="container grid mx-auto px-4 py-16 w-[90%] md:w-[85%] lg:w-[80%] md:grid-cols-8 lg:grid-cols-12 gap-8">
            <?php 
                $galeri = "SELECT * FROM galeri ORDER BY id_doc DESC LIMIT 3";
                $querygaleri = mysqli_query($conn, $galeri);
                
            ?>
                <?php
                while ($row_galeri = mysqli_fetch_assoc($querygaleri)) {
                    
                    $path_relatif = $row_galeri['documentasi'];
                    $path_baru = str_replace('../../', '', $path_relatif);
                    ?>
                    <a href="?page=detail_galeri&id_doc=<?= $row_galeri['id_doc'] ?>" class="card-galeri p-2 bg-[#0088CC] w-[100%] text-white md:col-span-4 lg:col-span-4 rounded-lg lg:hover:bg-blue-600 lg:hover:scale-105 ease-in duration-500">
                        <h1 class="text-center pt-3 text-lg"><b><?= $row_galeri['judul'] ?></b></h1>
                        <img src="<?= $path_baru?> " alt="" class="h-40 pt-3 w-[100%]">
                        <p class="text-justify text-sm pt-3 line-clamp-3"><?= $row_galeri['deskripsi'] ?></p>
                    </a>
                    <?php
                    }
                ?>
        </div>
        <div class="flex justify-center pb-16 mx-auto w-[90%] md:w-[85%] lg:w-[80%]">
            <a class="decoration-none bg-[#0088CC] w-40 text-center text-white p-1 rounded-lg hover:shadow-md  " href="?page=galeri">Selengkapnya</a>
        </div>
    </section>
    <section class=" pb-20 w-[100%] md:w-[85%] lg:w-[80%] mx-auto">
        <div class="container grid mx-auto text-center  w-[80%]">
            <h1 class="text-2xl text-black font-bold mx-auto ">LOKASI</h1>
        </div>
        <div class="container grid mx-auto px-4 py-16 w-[90%] md:w-[85%] lg:w-[80%] md:grid-cols-8 lg:grid-cols-12 gap-8">
            <div class="hidden lg:flex lg:col-span-1">
            </div>
            <div class=" map-card p-2 rounded-lg bg-[#0088CC] md:col-span-4 lg:col-span-5 lg:rounded-lg">
                <p class="text-center text-white p-5">Wilyah Desa</p>
                <iframe class="w-full h-72 rounded-lg" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31624.20552375382!2d110.2036724548309!3d-7.787100747787903!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7af0b97ce5346f%3A0x78c55c5b3a615aa2!2sWijimulyo%2C%20Kec.%20Nanggulan%2C%20Kabupaten%20Kulon%20Progo%2C%20Daerah%20Istimewa%20Yogyakarta!5e0!3m2!1sid!2sid!4v1702837579888!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class=" map-card p-2 rounded-lg bg-[#0088CC] md:col-span-4  lg:col-span-5 lg:rounded-lg">
                <p class="text-center text-white p-5">Lokasi Kantor Desa</p>
                <iframe class="w-full h-72 rounded-lg" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.0761685759057!2d110.21640537413784!3d-7.781748877209948!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7af1e58fadd1e1%3A0xe5d2a01920277488!2sBalai%20Desa%20Wijimulyo!5e0!3m2!1sid!2sid!4v1702837885558!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
    <!-- Summary -->
    <section class="lapor w-[100%] md:w-[85%] lg:w-[80%] mx-auto">
        <div class=" container bg-[#0088CC] rounded-lg grid mx-auto w-[90%] md:w-[85%] lg:w-[80%] px-4 py-16 md:grid-cols-2 lg:grid-cols-8 grid-cols-2">
            <!-- <div class="hidden lg:inline-block"></div> -->
            <div class="md:col-span-3 lg:col-span-4 min-h-72 text-center object-center text-white place-self-center">
                <h2>DESA TERPADU</h2>
                <h1 class="text-3xl font-bold">DESA WIJIMULYO</h1> <br>
                <p>Desa Wijimulyo, Nanggulan, Kulon Progo, Daerah Istimewa Yogyakarta</p>
            </div>
            <div class="grid md:col-span-3 lg:col-span-4 text-white"> 
                <?php if(!empty($userInfo)){ ?>
                    <form class="py-8 space-y-6 mx-auto " action="" method="POST">
                        <div class="w-[100%]">
                            <label for="judul" class="block text-sm text-white font-medium leading-6 ">Judul Keluhan</label>
                            <div class="mt-2">
                                <input id="judul" name="judul" type="text" autocomplete="off" placeholder="Judul Keluhan" required class="block w-[100%] rounded-md border-0 py-1.5 text-gray-900 white shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div class="w-[100%]">
                            <label for="keluhan" class="block text-sm text-white font-medium leading-6 ">Detail</label>
                            <div class="mt-2">
                                <input id="keluhan" name="keluhan" type="text" placeholder="Detail Keluhan" autocomplete="off" required class="block w-[100%] rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        <div class="flex pt-8 ">
                            <button type="submit" name="kirim_keluhan" class="flex w-[50%] justify-center rounded-md bg-gray-200 px-3 py-1.5 mx-auto text-sm font-semibold leading-6 text-gray-900 shadow-sm hover:bg-blue-500 ">Kirim</button>
                        </div>
                    </form>
                <?php }
                else { ?>
                    <form class=" space-y-6 mx-auto" action="" method="POST">
                        <div class="w-[100%]">
                            <label for="email" class="block text-sm text-white font-medium leading-6 ">Email</label>
                            <div class="mt-2">
                                <input id="email" name="email" type="email" autocomplete="email" placeholder="Email" required class="block w-[100%] rounded-md border-0 py-1.5 text-gray-900  shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div class="w-[100%]">
                            <label for="password" class="block text-sm text-white font-medium leading-6 ">Kata Sandi</label>
                            <div class="mt-2">
                                <input id="password" name="password" type="password" placeholder="Kata Sandi" autocomplete="current-password" required class="block w-[100%] rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        <div class="text-center pt-8">
                            <button type="submit" name="masuk" class="flex w-[50%] justify-center rounded-md bg-white px-3 py-1.5 mx-auto text-sm font-semibold leading-6 text-gray-900 shadow-sm hover:bg-blue-500 ">Masuk</button>
                        </div>
                    </form>
                <?php } ?>

            </div>
        </div>
    </section>
    <section>
        <div class="h-20  ">
            <p></p>
        </div>
    </section>
    <!-- Keuangan -->
    <!-- <section class="  pb-20 w-[100%] md:w-[85%] lg:w-[80%] mx-auto">
        <div class="container bg-[#0088CC] text-white p-5 rounded-lg gap-5 grid w-[85%] mx-auto lg:grid-cols-5">
            <div class="flex text-center lg:col-span-2 w-[100%] h-[100%] rounded-lg">
                <h3 class="place-self-center w-full text-2xl">Keuangan Desa</h3>
            </div>
            <div class="lg:col-span-3 ">
                <div class="pb-5">
                    <div class="flex justify-between pb-3">
                        <p>Pendapatan</p>
                        <p>98/100</p>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-green-500 h-2.5 rounded-full" style="width: 98%"></div>
                    </div>
                </div>
                <div class="pb-5">
                    <div class="flex justify-between pb-3">
                        <p>Pengeluaran</p>
                        <p>90/100</p>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-green-500 h-2.5 rounded-full" style="width: 90%"></div>
                    </div>
                </div>
                <div class="pb-5">
                    <div class="flex justify-between pb-3">
                        <p>Sisa</p>
                        <p>10/100</p>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-green-500 h-2.5 rounded-full" style="width: 10%"></div>
                    </div>
                </div>
                
            </div>
        </div>
    </section> -->
    <!-- Footer -->
    <footer class=" bg-[#0088CC] py-8 mx-auto">
        <div class=" mx-auto px-4 w-[100%] md:w-[85%] lg:w-[80%]">
            <div class="flex flex-wrap text-left lg:text-left">
            <div class="w-full lg:w-6/12 px-4 ">
                <h4 class="text-3xl py-5 md:py-2 fonat-semibold text-center md:text-left text-white">Pemerintah Desa Wijimulyo</h4>
                <h5 class="text-lg mt-0 py-5 md:py-2 text-center md:text-left text-white">Ikuti Kami di Media Sosial</h5>
                <div class="mt-6 flex justify-center md:justify-start lg:mb-0 mb-6">
                    <button onclick="window.location.href='https://www.twitter.com'" class="bg-white text-lightBlue-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
                        <i class="fab fa-twitter"></i>
                    </button>
                    <button onclick="window.location.href='https://www.facebook.com/profile.php?id=100049707712124'" class="bg-white text-lightBlue-600 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
                        <i class="fab fa-facebook-square"></i>
                    </button>
                    <button onclick="window.location.href='https://wa.me/6285229992286'" class="bg-white text-green-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
                        <i class="fab fa-whatsapp"></i>
                    </button>
                    <button onclick="window.location.href='https://www.instagram.com/prastttt13'" class="bg-white text-pink-800 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
                        <i class="fab fa-instagram"></i>
                    </button>
                </div>
            </div>
            <div class="w-full lg:w-6/12 px-4">
                <div class="flex flex-wrap items-top mb-6">
                <div class="w-full lg:w-6/12 px-4 ml-auto">
                    <p class="text-white text-center md:text-left">Desa Wijimulyo Kecamatan Nanggulan Kabupaten Kulon Progo Provinsi D.I. Yogyakarta Kode Pos 55671</p>
                </div>
                </div>
            </div>
            </div>
            <hr class="my-6 border-blueGray-300">
            <div class="flex flex-wrap items-center md:justify-between justify-center">
            <div class="w-full md:w-4/12 px-4 mx-auto text-center">
                <div class="text-sm text-white font-semibold py-1">
                Copyright © <span id="get-current-year">2023</span><p class="text-white" target="_blank"> SekNdes Kelompok 1.
                </div>
            </div>
            </div>
        </div>
    </footer>
    <script>
        function checkSchedule() {
    const today = new Date();
    const dayOfWeek = today.getDay();
    const currentHour = today.getHours();
    const currentMinutes = today.getMinutes();

    let isOpen = false;
    let message = "";

    if (dayOfWeek >= 1 && dayOfWeek <= 5) {
        if ((currentHour > 7 || (currentHour === 7 && currentMinutes >= 30)) && currentHour < 14) {
            isOpen = true;
        }
    } else if (dayOfWeek === 6) {
        if (currentHour === 7 && currentMinutes >= 0 && currentHour < 12) {
            isOpen = true;
        }
    }
    if (isOpen) {
        message = "Buka";
    } else {
        message = "Tutup";
    }
    document.getElementById("hari").innerText = getDayName(dayOfWeek);
    document.getElementById("status").innerText = message;
}

function getDayName(day) {
    const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
    return days[day];
}

checkSchedule();

    </script>

    