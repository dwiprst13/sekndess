<?php
include 'config.php';

$userInfo = @$_SESSION['id_user'];
$q_data_user=mysqli_query($conn, "SELECT * FROM user WHERE id_user='$userInfo'");
$data_user_login=mysqli_fetch_array($q_data_user);

function tampilkanNavbar($userInfo, $data_user_login) {
    if (!empty($userInfo)) { ?> <!-- Jika Ada -->
            <button id="akunBtn" >
                <img src='asset/img/user/login-default.jpg' alt='foto' class='w-8 h-8 p-1 rounded-full border border-1'>
            </button>
    <?php } else { ?> <!-- Jika Tidak -->
            <button id="loginBtn">
                <img src='asset/img/user/nonlogin.jpg' alt='foto' class='w-8 h-8 p-1 rounded-full border border-1'>
            </button>
    <?php }
}
?>

<!doctype html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script> 
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/animate.css">
    <!-- My Asset -->
    <link rel="stylesheet" href="main.css">
    <!-- Gambar Tab -->
    <link rel="icon" type="image/x-icon" href="asset/pemerintah/gambar6.jpg">
    <title>SekNdes</title>
</head>

<body chrome-hide-address-bar class="font-[Poppins] bg-white">
    <!-- Navbar -->
    <header class="bg-[#0088CC] sticky top-0">
        <nav class="flex justify-between items-center h-20 w-[85%] md:w-[80%] lg:w-[75%] z-50 mx-auto" >
            <div>
                <h1><a class="text-white text-2xl font-bold" href="#">SekNdes</a></h1>
            </div>
            <div
                class="nav-links duration-500 bg-[#0088CC] lg:static absolute lg:min-h-fit min-h-[60vh] left-0 top-[-800%] lg:w-auto text-white w-full flex items-center px-5">
                <ul class="flex bg-[#0088CC] text-sm md:text-base lg:flex-row flex-col lg:items-center lg:gap-[4vw] gap-8">
                    <li>
                        <a class="text-white hover:text-gray-500" href="?page=beranda">Beranda</a>
                    </li>
                    <li>
                        <a class="text-white hover:text-gray-500" href="?page=profil">Profil</a>
                    </li>
                    <li>
                        <a class="text-white hover:text-gray-500" href="?page=informasi">Informasi</a>
                    </li>
                    <li>
                        <a class="text-white hover:text-gray-500" href="?page=artikel">Artikel</a>
                    </li>
                    <li>
                        <a class="text-white hover:text-gray-500" href="?page=galeri">Galeri</a>
                    </li>
                    <li>
                        <a class="text-white hover:text-gray-500" href="?page=lapor">Lapor</a>
                    </li>
                </ul>
            </div>
            <div class="flex items-center gap-3" >
                <?php tampilkanNavbar($userInfo, $data_user_login); ?>
                <ion-icon onclick="onToggleMenu(this)" name="menu" class="text-xl  text-white cursor-pointer lg:hidden"></ion-icon>
            </div>

            <!-- MODAL KONFIRMASI LOGOUT -->
            <div id="myModal" class="fixed top-0 left-0 hidden w-full h-screen overflow-y-auto bg-black bg-opacity-50">
                <div class="flex items-center justify-center min-h-screen">
                    <div class="w-[90%] md:w-5/12 text-center bg-white rounded-lg shadow-lg p-8">
                    <p class="p-2">Apakah Anda yakin ingin keluar dari akun Anda?</p>
                    <div class="grid w-[90%] md:w-[35%] gap-2 p-2 grid-cols-2 mx-auto">
                        <button class="col-span-1 p-1 bg-red-500 text-center text-white rounded-lg" id="confirmLogout">Ya</button>
                        <button class="col-span-1 p-1 bg-blue-500 text-center text-white rounded-lg" id="cancelLogout">Tidak</button>
                    </div>
                    </div>
                </div>
            </div>

            <div id="myAkun" class="fixed hidden top-0 left-0 w-full h-screen overflow-y-auto bg-black bg-opacity-20">
                <div class="flex items-center justify-center min-h-screen">
                    <div class="border border-gray-500 w-[90%] md:w-4/12 shadow shadow-lg bg-white opacity-100 rounded-lg shadow-lg p-8">
                        <div class="flex justify-end">
                            <button id="closeModal" class="text-xl rounded-full text-red-500 focus:border-none">
                                <span class="material-symbols-outlined p-1 mx-auto">
                                    close
                                </span>
                            </button>  
                        </div>  
                        <div class="p-3 w-[30%] mx-auto md:w-[40%] lg:w-[45%]">
                            <?php
                                $gambar = $data_user_login['photos'];
                                if ($gambar && file_exists("../assets/img/$gambar")) {
                                    echo "<img src='../assets/img/$gambar' alt='foto' class='w-full h-auto rounded-full'>";
                                } else {
                                    echo "<img src='asset/img/user/login-default.jpg' alt='foto' class='w-full h-auto rounded-full'>";
                                }
                            ?>
                        </div>
                        <div class="p-3 text-black text-center text-2xl">
                            <p><?= $data_user_login['name'] ?></p>
                        </div>
                        <div class="p-3 text-black text-center">
                            <p><?= $data_user_login['email'] ?></p>
                        </div>
                        <div class="p-3 text-black text-center">
                            <p><?= $data_user_login['phone'] ?></p>
                        </div>
                        <div class="p-3 text-black text-center">
                            <p><?= $data_user_login['pedukuhan'] ?></p>
                        </div>
                        <div class="p-3 gap-6 grid grid-cols-2 w-[100%] lg:w-[80%] mx-auto justify-center ">
                            <button class="bg-blue-500 col-span-1 p-2 text-white rounded-lg">
                                Edit Profile
                            </button>
                            <button id="logout" class="bg-red-500 col-span-1 p-2 text-white rounded-lg">
                                Log Out
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
    </header>

    <!-- Body -->
    <div class="body-content bg-white z-10  top-0">
            <?php
                $page = isset($_GET['page']) ? $_GET['page'] : 'beranda';
                switch ($page) {
                    case 'artikel': //jika klik link ke "?page=artikel"
                    include 'user/artikel.php'; //muat halaman artikel.php
                    break; // akhiri action
                    case 'detail_artikel':
                    include 'pages/detail_artikel.php';
                    break;
                    case 'profil':
                    include 'user/profil.php';
                    break;
                    case 'pemerintahan':
                    include 'user/pemerintahan.php';
                    break;
                    case 'informasi':
                    include 'user/informasi.php';
                    break;
                    case 'galeri':
                    include 'user/galeri.php';
                    break;
                    case 'detail_galeri':
                    include 'pages/detail_galeri.php';
                    break;
                    case 'lapor':
                    include 'user/lapor.php';
                    break;
                    case 'profil_user';
                    include 'user/profil_user.php';
                    break;
                    default:
                    include 'user/beranda.php';
                    break;
                }
            ?>
        </div>
        <script>
            const navLinks = document.querySelector('.nav-links')
                function onToggleMenu(e){
                    e.name = e.name === 'menu' ? 'close' : 'menu'
                    navLinks.classList.toggle('top-[9%]')
                }

            document.addEventListener("DOMContentLoaded", function() {
            const myModal = document.getElementById("myModal");
            const myAkun = document.getElementById("myAkun");
            const logoutButton = document.getElementById("logout");
            const akunButton = document.getElementById("akunBtn"); // Ubah ID ini menjadi sesuai dengan ID tombol akunBtn
            
                akunButton.addEventListener("click", function() {
                    myModal.classList.add("hidden");
                    myAkun.classList.remove("hidden");
                });

                logoutButton.addEventListener("click", function() {
                    myAkun.classList.add("hidden");
                    myModal.classList.remove("hidden");
                });

                const confirmLogoutBtn = document.getElementById("confirmLogout");
                confirmLogoutBtn.addEventListener("click", function() {
                    window.location.href = "logout.php";
                });

                const closeModalBtn = document.getElementById("closeModal");
                closeModalBtn.addEventListener("click", function() {
                    myAkun.classList.add("hidden");
                });

                const cancelLogoutBtn = document.getElementById("cancelLogout");
                cancelLogoutBtn.addEventListener("click", function() {
                    myModal.classList.add("hidden");
                });

                const modalBackground = document.querySelector(".fixed.top-0.left-0.w-full.h-screen.overflow-y-auto");
                modalBackground.addEventListener("click", function(event) {
                    if (event.target === modalBackground) {
                        myAkun.classList.add("hidden");
                    }
                });
            });
            document.addEventListener("DOMContentLoaded", function() {
                const loginButton = document.getElementById("loginBtn");
                loginButton.addEventListener("click", function() {
                    window.location.href = "login.php";
                });
            });


        </script>
    
    <script src="main.js" ></script>
</body>

</html>