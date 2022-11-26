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

<div class="h-screen relative">
    <img class="h-full w-full absolute brightness-[0.25]" src="<?= base_url('images/gunung/gunungbromo1.png') ?>" alt="">
    <div class="flex flex-row justify-between items-center absolute w-full px-48 h-full">
        <div class="w-16 h-0 border-2 border-solid border-white rounded-full"></div>
        <div class="flex flex-col text-center gap-y-7">
            <span class="work-sans text-8xl font-semibold text-white">Mount Bromo</span>
            <span class="merriweather text-4xl text-white">East Java</span>
        </div>
        <div class="w-16 h-0 border-2 border-solid border-white rounded-full"></div>
    </div>
</div>

<div class="flex flex-row my-20">
    <!-- kolom kiri -->
    <div class="ml-20 flex-col flex basis-1/2 pr-24">
        <div class="poppins font-semibold text-xl text-slate-700 mb-1">About the Mountain</div>
        <br>
        <div class="poppins font-normal text-base text-gray-500"><?= $gunung['desc']; ?></div>
    </div>

    <!-- kolom kanan -->
    <div class="mr-20 flex flex-col">
        <!-- images -->
        <div class="flex flex-row h-136">
            <!-- left images -->
            <div class="flex flex-col mr-4 h-full w-72 space-y-4">
                <div class="h-full basis-2/3">
                    <img class="h-full" src="<?= base_url('images/gunung/gunungbromo2.png') ?>" alt="">
                </div>
                <div>
                    <img class="h-40" src="<?= base_url('images/gunung/gunungbromo3.png') ?>" alt="">
                </div>
            </div>
            <!-- right images -->
            <div class="flex flex-col h-full space-y-4">
                <div><img class="h-40" src="<?= base_url('images/gunung/gunungbromo4.png') ?>" alt=""></div>
                <div><img class="h-40" src="<?= base_url('images/gunung/gunungbromo5.png') ?>" alt=""></div>
                <div><img class="h-40" src="<?= base_url('images/gunung/gunungbromo6.png') ?>" alt=""></div>
            </div>
        </div>

        <!-- more details -->
        <div class="flex flex-row flex items-start gap-28 mt-8">
            <div class="flex flex-col items-start gap-y-1">
                <div class="poppins font-normal text-xs text-gray-500">Elevation</div>
                <div class="poppins font-semibold text-xl text-slate-700">2329 m</div>
            </div>
            <div class="flex flex-col items-start gap-y-1">
                <div class="poppins font-normal text-xs text-gray-500">Average Route length</div>
                <div class="poppins font-semibold text-xl text-slate-700">20 km</div>
            </div>
            <div class="flex flex-col items-start gap-y-1">
                <div class="poppins font-normal text-xs text-gray-500">Average duration</div>
                <div class="poppins font-semibold text-xl text-slate-700">3 days</div>
            </div>
        </div>

        <!-- harga dan button book now -->
        <div class="mt-8 grid grid-cols-2 gap-4">
            <div class="flex justify-center items-center text-2xl text-blue-500 font-semibold poppins">Rp200.000 <span class="text-gray-500 font-normal text-sm">/person</span> </div>
            <a href="" class="flex justify-center items-center bg-blue-500 h-12 rounded text-white poppins font-semibold font-normal">Book now</a>
        </div>
    </div>
</div>

</div>
</div>

<?= $this->endSection() ?>

<?= $this->section('footer') ?>

<?= $this->endSection() ?>