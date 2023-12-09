
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['kirim_keluhan'])){
            $_SESSION['judul'] = $_POST["judul"];
            $_SESSION['keluhan'] = $_POST["keluhan"];
            header("Location: ?page=lapor");
            exit();
        } elseif(isset($_POST["masuk"])){
            $email = $_POST["email"];
            $password = md5($_POST["password"]);
            $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
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
                        header('Location: index.php');
                    } 
                }
                else{
                }
            }
        }
    } 
?>

<head>
    <style>
        .hide-scroll-bar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        .hide-scroll-bar::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>
<body chrome-hide-address-bar class="bg-white dark:bg-gray-900  dark:text-white">
    <!-- Banner -->
    <section class="  w-[100%] md:w-[85%] lg:w-[80%] mx-auto">
        <div class="grid h-screen w-[90%] md:w-[85%] lg:w-[80%] px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none text-black md:text-5xl xl:text-6xl dark:text-white">WEB TERPADU DESA WIJIMULYO</h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos iste esse illo sapiente repellat labore voluptatum magni eligendi rerum hic placeat consequatur ab architecto neque, optio obcaecati. Sequi, fuga adipisci.</p>
                <a href="#visi-misi" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-black dark:text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900 ">
                    Jelajahi
                    <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
                
                <?php if(!empty($userInfo)){ ?>
                    <a href="?page=lapor" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-black border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    Lapor
                </a>
                <?php }
                else { ?>
                    <a href="login.php" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-black border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    Lapor
                </a>
                <?php } ?>
            </div>
            <div class="hidden place-self-center lg:mt-0 lg:col-span-5 lg:flex">
                <img src="" alt="banner">
            </div>                
        </div>
    </section>
    <!-- Visi & Misi -->
    <section id="visi-misi" class="wow bounceInUp w-[100%] md:w-[85%] lg:w-[80%] mx-auto" >
        <div class="container text-black dark:text-white grid mx-auto text-center ">
            <h1 class="text-2xl font-bold ">VISI & MISI</h1>
        </div>
        <div class="container grid mx-auto px-4 py-16 gap-8 w-[90%] md:w-[85%] lg:w-[80%] lg:grid-cols-12">
            <div class="visi p-5 lg:col-span-6 bg-blue-500 dark:bg-gray-700 rounded-lg" >
                <h1 class="text-center text-white text-2xl font-bold pb-5">VISI</h1>
                <p class="text-white text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam quae dolorum, sequi, adipisci debitis quos quasi corporis eum repellat voluptatum sed laudantium nam quod in voluptatibus ducimus neque praesentium voluptates!</p>
            </div>
            <div class="misi p-5 lg:col-span-6 bg-blue-500 dark:bg-gray-700 rounded-lg" >
                <h1 class="text-center text-white text-2xl font-bold pb-5">MISI</h1>
                <p class="text-white text-justify">Lorem ipsum dolor sit amet consec tetur, adipisicing elit. Eius cum eligendi nemo explicabo? Esse est aliquid eligendi. Dicta placeat consectetur in, maiores dolores, fugiat molestias aliquam eos atque sapiente deserunt.</p>
            </div>
        </div>
    </section>
    <!-- Artikel -->
    <section class=" w-[100%] md:w-[85%] lg:w-[80%] mx-auto ">
        <div class="container grid mx-auto text-center ">
            <h1 class="text-2xl text-black dark:text-white font-bold ">ARTIKEL</h1>
        </div>
        <div class="container grid text-white mx-auto px-4 py-16 w-[90%] md:w-[85%] lg:w-[80%] md:grid-cols-8 lg:grid-cols-12 gap-8">
            <div class="card-galeri p-2 bg-blue-500 dark:bg-gray-700 md:col-span-4 lg:col-span-4 rounded-lg">
                <h1 class="text-center pt-3 text-lg">Judul Artikel 1</h1>
                <img src="uploads/artikel/artikel1.jpeg" alt="" class="h-52 pt-3 w-28 w-full">
                <p class="text-justify pt-3 line-clamp-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, qui ipsum nisi ut, mollitia nulla eos sapiente, repellendus placeat magni iste autem suscipit laboriosam dolores? Libero distinctio minus neque nulla!</p>
                <button class="flex justify-center px-3 py-3 mx-auto">
                    <a class="decoration-none bg-blue-500 w-24 text-center p-1 rounded-lg hover:shadow-md hover:shadow-white" href="">Baca >></a>
                </button>
            </div>
            <div class="card-galeri p-2 bg-blue-500 dark:bg-gray-700 md:col-span-4 lg:col-span-4 rounded-lg">
                <h1 class="text-center pt-3 text-lg">Judul Artikel 2</h1>
                <img src="uploads/artikel/artikel2.jpeg" alt="" class="h-52 pt-3 w-28 w-full">
                <p class="text-justify pt-3 line-clamp-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, qui ipsum nisi ut, mollitia nulla eos sapiente, repellendus placeat magni iste autem suscipit laboriosam dolores? Libero distinctio minus neque nulla!</p>
                <button class="flex justify-center px-3 py-3 mx-auto">
                    <a class="decoration-none bg-blue-500 w-24 text-center p-1 rounded-lg hover:shadow-md hover:shadow-white" href="">Baca >></a>
                </button>
            </div>
            <div class="card-galeri p-2 bg-blue-500 dark:bg-gray-700 md:col-span-4 lg:col-span-4 rounded-lg">
                <h1 class="text-center pt-3 text-lg">Judul Artikel 3</h1>
                <img src="uploads/artikel/artikel3.jpeg" alt="" class="h-52 pt-3 w-28 w-full">
                <p class="text-justify pt-3 line-clamp-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit quasi quis magni quidem error earum quaerat omnis soluta quo blanditiis ab aliquid debitis, nulla dolorem rerum exercitationem autem incidunt pariatur?</p>
                <button class="flex justify-center px-3 py-3 mx-auto">
                    <a class="decoration-none bg-blue-500 w-24 text-center p-1 rounded-lg hover:shadow-md hover:shadow-white" href="">Baca >></a>
                </button>
            </div>
        </div>
        <div class="flex justify-center pb-16 mx-auto w-[90%] md:w-[85%] lg:w-[80%]">
            <a class="decoration-none bg-blue-500 w-40 text-center text-white p-1 rounded-lg hover:shadow-md hover:shadow-white" href="?page=artikel">Selengkapnya</a>
        </div>
    </section>
    <!-- Galeri -->
    <section class="w-[100%] md:w-[85%] lg:w-[80%] mx-auto">
        <div class="container grid mx-auto text-center">
            <h1 class="text-2xl text-black dark:text-white font-bold ">GALERI</h1>
        </div>
        <div class="container grid text-white mx-auto px-4 py-16 w-[90%] md:w-[85%] lg:w-[80%] md:grid-cols-8 lg:grid-cols-12 gap-8">
            <div class="card-galeri p-2 bg-blue-500 dark:bg-gray-700 md:col-span-4 lg:col-span-4 rounded-lg">
                <img src="uploads/artikel/artikel1.jpeg" alt="" class="h-52 pb-3 w-28 w-full">
                <h3 class="text-center pb-3">Gambar 1</h3>
            </div>
            <div class="card-galeri p-2 bg-blue-500 dark:bg-gray-700 md:col-span-4 lg:col-span-4 rounded-lg">
                <img src="uploads/artikel/artikel1.jpeg" alt="" class="h-52 pb-3 w-28 w-full">
                <h3 class="text-center pb-3">Gambar 2</h3>
            </div>
            <div class="card-galeri p-2 bg-blue-500 dark:bg-gray-700 md:col-span-4 lg:col-span-4 rounded-lg">
                <img src="uploads/artikel/artikel1.jpeg" alt="" class="h-52 pb-3 w-28 w-full">
                <h3 class="text-center pb-3">Gambar 3</h3>
                
            </div>
        </div>
        <div class="flex justify-center pb-16 mx-auto w-[90%] md:w-[85%] lg:w-[80%]">
            <a class="decoration-none bg-blue-500 w-40 text-center text-white p-1 rounded-lg hover:shadow-md hover:shadow-white" href="?page=galeri">Selengkapnya</a>
        </div>
    </section>
    <section class=" pb-20 w-[100%] md:w-[85%] lg:w-[80%] mx-auto">
        <div class="container grid mx-auto text-center w-[80%]">
            <h1 class="text-2xl text-black dark:text-white font-bold mx-auto ">LOKASI</h1>
        </div>
        <div class="container grid mx-auto px-4 py-16 w-[90%] md:w-[85%] lg:w-[80%] md:grid-cols-8 lg:grid-cols-12 gap-8">
            <div class="hidden lg:flex lg:col-span-1">
            </div>
            <div class=" map-card p-2 rounded-lg bg-blue-500 dark:bg-gray-700 md:col-span-4  lg:col-span-5 lg:rounded-lg">
                <p class="text-center text-white p-5">Wilayah Desa</p>
                <iframe class="w-full h-72 rounded-lg" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3842.416309428627!2d110.32573231588937!3d-7.8191062495150225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7af7e2b2acea97%3A0xa3cb91d3e65407b2!2sUniversitas%20Alma%20Ata%20Yogyakarta!5e0!3m2!1sid!2sid!4v1700715283041!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
            <div class=" map-card p-2 rounded-lg bg-blue-500 dark:bg-gray-700 md:col-span-4 lg:col-span-5 lg:rounded-lg">
                <p class="text-center text-white p-5">Lokasi Kantor Desa</p>
                <iframe class="w-full h-72 rounded-lg" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3842.416309428627!2d110.32573231588937!3d-7.8191062495150225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7af7e2b2acea97%3A0xa3cb91d3e65407b2!2sUniversitas%20Alma%20Ata%20Yogyakarta!5e0!3m2!1sid!2sid!4v1700715283041!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>
    <!-- Summary -->
    <section class="lapor w-[100%] md:w-[85%] lg:w-[80%] mx-auto">
        <div class=" container bg-gray-700 rounded-lg grid mx-auto w-[90%] md:w-[85%] lg:w-[80%] px-4 py-16 md:grid-cols-8 lg:grid-cols-12 gap-3">
            <!-- <div class="hidden lg:inline-block"></div> -->
            <div class="md:col-span-3 lg:col-span-4 min-h-72 text-center object-center text-white place-self-center">
                <h2>DESA TERPADU</h2>
                <h1 class="text-3xl font-bold">DESA WIJIMULYO</h1>
            </div>
            <div class=" md:col-span-2 lg:col-span-4 min-h-72 text-center text-white place-self-center">
                <p>Desa Wijimulyo, Nanggulan, Kulon Progo, Daerah Istimewa Yogyakarta</p>
            </div>
            <div class="grid md:col-span-3 lg:col-span-4 text-white">
                <?php if(!empty($userInfo)){ ?>
                    <form class=" space-y-6 mx-auto " action="" method="POST">
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
                            <button type="submit" name="kirim_keluhan" class="flex w-[50%] justify-center rounded-md bg-blue-500 px-3 py-1.5 mx-auto text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Kirim</button>
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
                            <button type="submit" name="masuk" class="flex w-[50%] justify-center rounded-md bg-blue-500 px-3 py-1.5 mx-auto text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Masuk</button>
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
    <!-- Perangkat Desa -->
    <section class="  pb-20 w-[100%] md:w-[85%] lg:w-[80%] mx-auto">
        <div class="container grid text-center">
            <h1 class="text-2xl text-black dark:text-white font-bold mx-auto ">PERANGKAT DESA</h1>
        </div>
        <div class="flex w-[90%] md:w-[85%] lg:w-[80%] mx-auto px-4 py-16 overflow-x-auto hide-scroll-bar space-x-4 p-4">
            <!-- Card 1 -->
            <div class="flex-shrink-0 w-64 p-2 bg-gray-700 rounded-lg shadow-md">
                <img src="asset/pemerintah/gambar1.jpeg" alt="Gambar 1" class="w-full h-56 object-cover rounded-t-lg">
                <div class="p-4 text-center text-white">
                    <h2 class="text-lg font-semibold">Saiful Romli</h2>
                    <p class="">Kepala Desa</p>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="flex-shrink-0 w-64 p-2  bg-gray-700 rounded-lg shadow-md">
                <img src="asset/pemerintah/gambar2.jpeg" alt="Gambar 2" class="w-full h-56 object-cover rounded-t-lg">
                <div class="p-4 text-center text-white">
                    <h2 class="text-lg font-semibold">Salma Mesias G</h2>
                    <p class="">Wakil Kepala Desa</p>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="flex-shrink-0 w-64 p-2 bg-gray-700 rounded-lg shadow-md">
                <img src="asset/pemerintah/gambar3.jpeg" alt="Gambar 3" class="w-full h-56 object-cover rounded-t-lg">
                <div class="p-4 text-center text-white">
                    <h2 class="text-lg font-semibold">Dwi Prasetia</h2>
                    <p class="">Badan Desa</p>
                </div>
            </div>
            <!-- Card 4 -->
            <div class="flex-shrink-0 w-64 p-2  bg-gray-700 rounded-lg shadow-md">
                <img src="asset/pemerintah/gambar4.jpeg" alt="Gambar 4" class="w-full h-56 object-cover rounded-t-lg">
                <div class="p-4 text-center text-white">
                    <h2 class="text-lg font-semibold">Sunanan Aulia Putri</h2>
                    <p class="">Tangan Kanan Desa</p>
                </div>
            </div>
            <!-- Card 5 -->
            <div class="flex-shrink-0 w-64 p-2  bg-gray-700 rounded-lg shadow-md">
                <img src="asset/pemerintah/gambar5.jpg" alt="Gambar 5" class="w-full h-56 object-cover rounded-t-lg">
                <div class="p-4 text-center text-white">
                    <h2 class="text-lg font-semibold">Hendriansyah</h2>
                    <p class="">Tangan Kiri Desa</p>
                </div>
            </div>
            <!-- Card 5 -->
            <div class="flex-shrink-0 w-64 p-2  bg-gray-700 rounded-lg shadow-md">
                <img src="asset/pemerintah/gambar6.jpg" alt="Gambar 6" class="w-full h-56 object-cover rounded-t-lg">
                <div class="p-4 text-center text-white">
                    <h2 class="text-lg font-semibold">M. Naufal S.Jk</h2>
                    <p class="">Kaki Kanan Desa</p>
                </div>
            </div>
            <!-- Card 5 -->
            <div class="flex-shrink-0 w-64 p-2  bg-gray-700 rounded-lg shadow-md">
                <img src="pemerintah/gambar7.jpg" alt="Gambar 7" class="w-full h-56 object-cover rounded-t-lg">
                <div class="p-4 text-center text-white">
                    <h2 class="text-lg font-semibold">Alwan Rofail</h2>
                    <p class="">Kaki Kiri Desa</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Keuangan -->
    <section class="  pb-20 w-[100%] md:w-[85%] lg:w-[80%] mx-auto">
        <div class="container gap-5 grid w-[85%] mx-auto lg:grid-cols-5">
            <div class="flex text-center lg:col-span-2 bg-blue-500 w-[100%] h-[100%] rounded-lg">
                <h3 class="place-self-center w-full">Keuangan Desa</h3>
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
    </section>
    <!-- Footer -->
    <footer class=" bg-gray-800 py-8 mx-auto">
        <div class=" mx-auto px-4 w-[100%] md:w-[85%] lg:w-[80%]">
            <div class="flex flex-wrap text-left lg:text-left">
            <div class="w-full lg:w-6/12 px-4 ">
                <h4 class="text-3xl fonat-semibold text-center md:text-left text-white">Pemerintah Desa Wijimulyo</h4>
                <h5 class="text-lg mt-0 mb-2 text-center md:text-left text-white">Ikuti Kami di Media Sosial</h5>
                <div class="mt-6 flex justify-center md:justify-start lg:mb-0 mb-6">
                    <button class="bg-white text-lightBlue-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
                        <i class="fab fa-twitter"></i></button><button class="bg-white text-lightBlue-600 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
                        <i class="fab fa-facebook-square"></i></button><button class="bg-white text-pink-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
                        <i class="fab fa-whatsapp"></i></button><button class="bg-white text-blueGray-800 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
                        <i class="fab fa-instagram"></i>
                    </button>
                </div>
            </div>
            <div class="w-full lg:w-6/12 px-4">
                <div class="flex flex-wrap items-top mb-6">
                <div class="w-full lg:w-6/12 px-4 ml-auto">
                    <p class="text-white text-center md:text-left">Desa Wijimulyo Kecamatan. Nanggulan Kabupaten. Kulon Progo Provinsi D.I. Yogyakarta Kode Pos 55671</p>
                </div>
                </div>
            </div>
            </div>
            <hr class="my-6 border-blueGray-300">
            <div class="flex flex-wrap items-center md:justify-between justify-center">
            <div class="w-full md:w-4/12 px-4 mx-auto text-center">
                <div class="text-sm text-white font-semibold py-1">
                Copyright © <span id="get-current-year">2023</span><a href="https://www.creative-tim.com/product/notus-js" class="text-white hover:text-gray-800" target="_blank"> SekNdes
                <a href="https://www.creative-tim.com?ref=njs-profile" class="text-white hover:text-blueGray-800">Kelompok 1</a>.
                </div>
            </div>
            </div>
        </div>
    </footer>

    