<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body >
    <div class="w-[85%] mx-auto">
        <h1>INI HALAMAN INFORMASI</h1>
        <div class="lg:grid lg:grid-cols-12 lg:gap-5">
            <div class="flex lg:col-span-2 lg:flex lg:flex-col bg-orange-500 rounded-lg">
                <button id="in_berita">berita</button>
                <button id="in_agenda">agenda</button>
                <button id="in_pengumuman">pengumuman</button>
                <button id="in_pelayanan">pelayanan</button>
            </div>
            <div class="lg:col-span-7 h-min-full bg-blue-600 rounded-lg">
                <iframe id="if_berita" src="user/informasi_ext/info_berita.php" frameborder="0" class="w-[100%] h-screen"></iframe>
                <iframe id="if_agenda" src="user/informasi_ext/info_agenda.php" frameborder="0" class="w-[100%]"></iframe>
                <iframe id="if_pengumuman" src="user/informasi_ext/info_pengumuman.php" frameborder="0" class="w-[100%]"></iframe>
                <iframe id="if_pelayanan" src="user/informasi_ext/info_pelayanan.php" frameborder="0" class="w-[100%]"></iframe>
            </div>
            <div class="hidden lg:block lg:col-span-3 bg-green-600 rounded-lg">
                <iframe id="if_rec_berita" src="user/informasi_ext/info_rec_berita.php" frameborder="0" class="w-[100%]"></iframe>
                <iframe id="if_rec_agenda" src="user/informasi_ext/info_rec_agenda.php" frameborder="0" class="w-[100%]"></iframe>
                <iframe id="if_rec_pengumuman" src="user/informasi_ext/info_rec_pengumuman.php" frameborder="0" class="w-[100%]"></iframe>
                <iframe id="if_rec_pelayanan" src="user/informasi_ext/info_rec_pelayanan.php" frameborder="0" class="w-[100%]"></iframe>
            </div>
        </div>
    </div>
    
</body>
<script>
    const btnBerita = document.getElementById('in_berita');
    const btnAgenda = document.getElementById('in_agenda');
    const btnPengumuman = document.getElementById('in_pengumuman');
    const btnPelayanan = document.getElementById('in_pelayanan');
    
    const ifBerita = document.getElementById('if_berita');
    const ifAgenda = document.getElementById('if_agenda');
    const ifPengumuman = document.getElementById('if_pengumuman');
    const ifPelayanan = document.getElementById('if_pelayanan');

    const ifRecBerita = document.getElementById('if_rec_berita');
    const ifRecAgenda = document.getElementById('if_rec_agenda');
    const ifRecPengumuman = document.getElementById('if_rec_pengumuman');
    const ifRecPelayanan = document.getElementById('if_rec_pelayanan');
    
    function tampilBerita() {
        ifAgenda.style.display = 'none';
        ifPengumuman.style.display = 'none';
        ifPelayanan.style.display = 'none';
        ifRecAgenda.style.display = 'none';
        ifRecPengumuman.style.display = 'none';
        ifRecPelayanan.style.display = 'none';
    }
    tampilBerita();
    
    btnBerita.addEventListener('click', function() {
        tampilBerita();
        ifBerita.style.display = 'block';
        ifRecBerita.style.display = 'block';
    });
    
    btnAgenda.addEventListener('click', function() {
        ifAgenda.style.display = 'block';
        ifRecAgenda.style.display = 'block';
        ifBerita.style.display = 'none';
        ifPengumuman.style.display = 'none';
        ifPelayanan.style.display = 'none';
        ifRecBerita.style.display = 'none';
        ifRecPengumuman.style.display = 'none';
        ifRecPelayanan.style.display = 'none';
    });

    btnPengumuman.addEventListener('click', function() {
        ifPengumuman.style.display = 'block';
        ifRecPengumuman.style.display = 'block';
        ifBerita.style.display = 'none';
        ifAgenda.style.display = 'none';
        ifPelayanan.style.display = 'none';
        ifRecBerita.style.display = 'none';
        ifRecAgenda.style.display = 'none';
        ifRecPelayanan.style.display = 'none';
    });

    btnPelayanan.addEventListener('click', function() {
        ifPelayanan.style.display = 'block';
        ifRecPelayanan.style.display = 'block';
        ifPengumuman.style.display = 'none';
        ifBerita.style.display = 'none';
        ifAgenda.style.display = 'none';
        ifRecPengumuman.style.display = 'none';
        ifRecBerita.style.display = 'none';
        ifRecAgenda.style.display = 'none';
    });
</script>    

</html>