<?php
require 'config.php';
if(!empty($_SESSION["id"])){
header("Location: index.php");
}

// Jika submit diklik maka akan melakukan aksi
if(isset($_POST["submit"])){
$name = $_POST["name"]; //menyimpan value dari form "name" ke variabel name
$email = $_POST["email"];
$phone = $_POST["phone"];
$nik = $_POST["nik"];
$pedukuhan = $_POST["pedukuhan"];
$password = md5($_POST["password"]); //md5 berfungsi untuk enkripsi password(simple encryption)
$confirmpassword = $_POST["confirmpassword"];

$duplicate = mysqli_query($conn, "SELECT * FROM user WHERE nik = '$nik' OR email = '$email'"); //Memastikan data masukan apakah ada di database
if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> showPopup('Email Sudah Digunakan'); </script>";
}
else{
    if($password == md5($confirmpassword)){
        // Memasukan semua nilai variabel kedalam tabel database
        $query = "INSERT INTO user (name, email, password, phone, nik, pedukuhan, role) VALUES ('$name','$email', '$password','$phone', '$nik','$pedukuhan', 'user')";

        mysqli_query($conn, $query);
        echo
        "<script> showPopup('Pendaftaran Sukses'); </script>";
    }
    else{
        echo
        "<script> showPopup('Pendaftaran Gagal'); </script>";
    }
}
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <title>SekNdes</title>
</head>
<body class="bg-gray-900">
    <div class="flex flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" src="" alt="Logo">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-white">Masuk Ke Akun Anda</h2>
        </div>
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6 " action="#" method="POST">
            <div class="text-white">
                <label for="name" class="block text-sm font-medium leading-6 text-white">Nama</label>
                <div class="mt-2">
                    <input id="name" name="name" type="text" autocomplete="off" required class="block w-full rounded-md  p-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div class="text-white">
                <label for="email" class="block text-sm font-medium leading-6 text-white">Email</label>
                <div class="mt-2">
                    <input id="email" name="email" type="email" autocomplete="off" required class="block w-full rounded-md  p-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div>
                <label for="phone" class="block text-sm font-medium leading-6 text-white">Nomor Telepon</label>
                <div class="mt-2">
                    <input id="phone" name="phone" type="phone" autocomplete="off" required class="block w-full rounded-md  p-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div>
                <label for="nik" class="block text-sm font-medium leading-6 text-white">NIK</label>
                <div class="mt-2">
                    <input id="nik" name="nik" type="text" autocomplete="off" required class="block w-full rounded-md  p-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div>
                <label for="pedukuhan" class="block text-sm font-medium leading-6 text-white">Pedukuhan</label>
                <div class="mt-2">
                    <input id="pedukuhan" name="pedukuhan" type="text" autocomplete="off" required class="block w-full rounded-md  p-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div>
                <label for="password" class="block text-sm font-medium leading-6 text-white">Kata Sandi</label>
                <div class="mt-2">
                    <input id="password" name="password" type="text" autocomplete="off" required class="block w-full rounded-md  p-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div>
                <label for="repassword" class="block text-sm font-medium leading-6 text-white">Ulangi Kata Sandi</label>
                <div class="mt-2">
                    <input id="repassword" name="repassword" type="text" autocomplete="off" required class="block w-full rounded-md p-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Daftar</button>
            </div>
        </form>
    
        <p class="mt-10 text-center text-sm text-gray-500">
            Sudah punya akun?
            <a href="login.html" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Masuk Sekarang</a>
        </p>
        </div>
    </div>
</body>
</html>