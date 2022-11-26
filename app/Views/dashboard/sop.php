<?= $this->extend('layout/layout') ?>

<?= $this->section('head') ?>
<script src="<?= base_url('js/home.js') ?>" defer></script>
<?= $this->endSection() ?>
<?php
// Mock bentuk response
// @roy @agung
$gunung = [

    'title' => "Gunung Bromo",
    'desc' => "The Bromo or Mount Bromo is an active somma volcano and part of the Tengger mountains, in East Java, Indonesia. At 2,329 meters (7,641 ft) it is not the highest peak of the massif, but the most famous. The area is one of the most visited tourist destinations in East Java, and the volcano is included in the Bromo Tengger Semeru National Park. 
    <br><br>
        The name Bromo comes from the Javanese pronunciation of Brahma, the Hindu god of creation. Mount Bromo is located in the middle of a plain called \"Sea of Sand\" (Javanese: Segara Wedi or Indonesian: Lautan Pasir), a nature reserve that has been protected since 1919.
        <br><br>
        A typical way to visit Mount Bromo is from the nearby mountain village of Cemoro Lawang. From there it is possible to walk to the volcano in about 45 minutes, but it is also possible to take an organized jeep tour, including stops at the viewpoint of Mount Penanjakan (2,770 m (9,090 ft)) (Indonesian: Gunung Penanjakan). 
        <br><br>
        The sights on Mount Penanjakan can also be reached on foot in about two hours. Depending on the level of volcanic activity, the Indonesian Center for Volcanology and Disaster Mitigation sometimes issues a warning not to visit Mount Bromo.",
    'location' => 'Jawa Timur, Indonesia'

];

?>

<?= $this->section('content') ?>
<?= $this->include('layout/navbar') ?>

<!-- container -->
<div class="px-16 py-28 flex flex-col items-center">
    <!-- title -->
    <div class="flex flex-col items-center gap-y-4 mb-20">
        <div class="poppins font-bold text-3xl text-slate-700">Standard Operating Procedure</div>
        <div class="w-24 h-0 border-2 border-solid border-blue-400 rounded-full"></div>
    </div>
    <!-- content -->
    <div class="flex flex-col gap-y-4 w-full poppins">
        <div class="soft-shadow-2 p-4 flex flex-col rounded-lg">
            <div class="poppins font-bold text-slate-700 tracking-wide">PENDAFTARAN PENDAKIAN</div>
            <div class="divider mt-1 mb-1"></div>
            <div class="text-gray-500 text-sm mb-4">Pendaftaran pendakian gunung dengan sistem Booking Online, dengan ketentuan sebagai berikut:</div>
            <div class="w-full bg-slate-100 mb-1 p-3 text-sm font-medium text-gray-500 leading-6">
                Waktu Pelayanan Verifikasi Pembayaran dilakukan pada hari Senin s/d Jumat jam 08.00 s/d 15.00 WIB. Proses maksimal 1x24 jam (hari kerja) setelah melakukan pembayaran.
            </div>
        </div>
        <div class="soft-shadow-2 p-4 flex flex-col rounded-lg">
            <div class="poppins font-bold text-slate-700 tracking-wide">TARIF DAN PEMBAYARAN KARCIS</div>
            <div class="divider mt-1 mb-1"></div>
        </div>
        <div class="form-control flex flex-row justify-start">
            <label class="label cursor-pointer">
                <input type="checkbox" checked="checked" class="checkbox checkbox-primary mr-2" />
                <span class="label-text text-sm text-gray-500">Saya telah membaca, menyetujui, dan mengikuti semua peraturan dan SOP diatas</span>
            </label>
        </div>
        <a href="#" class="mx-auto bg-blue-500 text-white py-3 px-6 rounded mt-12 font-semibold tracking-wider">Continue</a>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('footer') ?>

<?= $this->endSection() ?>