<?= $this->extend('layout/layout') ?>

<?= $this->section('head') ?>
<script src="<?= base_url('js/home.js') ?>" defer></script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?= $this->include('layout/navbar') ?>
<div id="app" class="bg-white pt-16 mx-auto w-full lg:px-72 px-10">
    <div class="flex flex-col items-center mb-24">
        <img src="<?= base_url('images/healthy.png') ?>" class="lg:w-2/4 lg:h-2/4 w-3/4 h-3/4" alt="">
        <div class="poppins flex flex-col justify-center items-center text-black gap-y-2">
            <span class="font-medium text-xl" id="hasil"><?= $hasil ?></span>
            <span class="font-light text-sm"><?= $rekom ?></span>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="40" fill="none" viewBox="0 0 32 40" class="mt-10 mb-16">
            <path stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-opacity=".4" stroke-width="2" d="m8 12 8 8 8-8" />
            <path stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-opacity=".6" stroke-width="2" d="m8 16 8 8 8-8" />
            <path stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-opacity=".8" stroke-width="2" d="m8 20 8 8 8-8" />
        </svg>
        <span class="text-black poppins font-semibold text-lg">Tips Persiapan Mendaki Gunung Yang Harus Kamu Tahu:</span>
        <ul class="list-disc text-black space-y-2 mt-10">
            <li class="leading-loose">Mengonsumsi makanan tinggi karbohidrat 3 – 4 hari sebelum pendakian</li>
            <li class="leading-loose">Berolahraga (aerobik = lari, renang) minimal tiga kali seminggu selama 30-60 menit untuk setiap sesinya</li>
            <li class="leading-loose">Pastikan untuk meminum banyak air putih (minimal 2L sehari / 10 gelas 200ml) , dan minumlah sesering mungkin agar tetap terhidrasi.</li>
            <li class="leading-loose">Pola makan yang sehat, terutama dengan mengonsumsi makanan yang kaya akan potassium, seperti pisang, alpukat, dan sayuran hijau.</li>
            <li class="leading-loose">Atur jadwal tidur yang teratur, dengan memastikan untuk tidur sekitar 7-8 jam setiap malamnya. Hindari kebiasaan tidur terlalu larut malam atau terlalu siang, karena dapat mengganggu pola tidur yang teratur.</li>
        </ul>
    </div>
    <p id="hasil_tes"></p>


</div>
<?= $this->endSection() ?>