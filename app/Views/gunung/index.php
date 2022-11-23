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
        <div class="flex flex-row flex items-start gap-32 mt-8">
            <div class="flex flex-col items-start gap-y-1">
                <div class="poppins font-normal text-xs text-gray-500">Elevation</div>
                <div class="poppins font-semibold text-xl text-slate-700">2329 m</div>
            </div>
            <div class="flex flex-col items-start gap-y-1">
                <div class="poppins font-normal text-xs text-gray-500">Route length</div>
                <div class="poppins font-semibold text-xl text-slate-700">20 km</div>
            </div>
            <div class="flex flex-col items-start gap-y-1">
                <div class="poppins font-normal text-xs text-gray-500">Average duration</div>
                <div class="poppins font-semibold text-xl text-slate-700">3 days</div>
            </div>
        </div>

        <!-- dropdowns -->
        <div class="flex flex-row items-start space-x-2 mt-8">
            <!-- hiking trail -->
            <div class="flex flex-col items-start gap-1 w-48">
                <div class="source-sans-pro font-semibold text-xs text-stone-500">Hiking trail</div>
                <div class="flex flex-row bg-soft-blue w-full px-2 rounded justify-between gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="my-3 ml-3" width="24" height="25" fill="none" viewBox="0 0 24 25">
                        <g clip-path="url(#a)">
                            <path stroke="#4D73F8" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 10.5c0 7-9 13-9 13s-9-6-9-13a9 9 0 1 1 18 0Z"></path>
                            <path stroke="#4D73F8" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"></path>
                        </g>
                        <defs>
                            <clipPath id="a">
                                <path fill="#fff" d="M0 0h24v24H0z" transform="translate(0 .5)"></path>
                            </clipPath>
                        </defs>
                    </svg>
                    <select name="hikingtrail" id="hikingtrail" class="bg-soft-blue mr-3 w-full">
                        <option value="">Choose</option>
                    </select>
                </div>
            </div>
            <!-- start date -->
            <div class="flex flex-col items-start gap-1 w-48">
                <div class="source-sans-pro font-semibold text-xs text-stone-500">Start date</div>
                <!-- kotak input -->
                <div class="flex flex-row bg-soft-blue w-full h-12 rounded justify-between gap-2 items-center px-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="my-3 ml-3" width="20" height="20" fill="none" viewBox="0 0 20 20">
                        <path stroke="#4D73F8" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.833 3.333H4.167C3.247 3.333 2.5 4.08 2.5 5v11.667c0 .92.746 1.666 1.667 1.666h11.666c.92 0 1.667-.746 1.667-1.666V5c0-.92-.746-1.667-1.667-1.667Zm-2.5-1.666V5M6.667 1.667V5M2.5 8.333h15" />
                    </svg>
                    <select name="hikingtrail" id="hikingtrail" class="bg-soft-blue mr-3 w-full">
                        <option value="">dd/mm/yyyy</option>
                    </select>
                </div>
            </div>

            <!-- number of people -->
            <div class="flex flex-col items-start gap-1 w-48">
                <div class="source-sans-pro font-semibold text-xs text-stone-500">Number of people</div>
                <!-- kotak input -->
                <div class="flex flex-row bg-soft-blue w-full h-12 rounded justify-between gap-2 items-center px-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" class="my-3 ml-3" height="20" fill="none" viewBox="0 0 20 20">
                        <g clip-path="url(#a)">
                            <path stroke="#4D73F8" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.166 17.5v-1.667a3.333 3.333 0 0 0-3.333-3.333H4.166a3.333 3.333 0 0 0-3.333 3.333V17.5M7.5 9.167a3.333 3.333 0 1 0 0-6.667 3.333 3.333 0 0 0 0 6.667ZM19.167 17.5v-1.667a3.334 3.334 0 0 0-2.5-3.225m-3.334-10a3.334 3.334 0 0 1 0 6.459" />
                        </g>
                        <defs>
                            <clipPath id="a">
                                <path fill="#fff" d="M0 0h20v20H0z" />
                            </clipPath>
                        </defs>
                    </svg>

                    <select name="hikingtrail" id="hikingtrail" class="bg-soft-blue mr-3 w-full">
                        <option value="">Choose</option>
                    </select>
                </div>
            </div>

        </div>

        <!-- harga dan button book now -->
        <div class="mt-8 grid grid-cols-2 gap-4">
            <div class="flex justify-center items-center text-2xl text-blue-500 font-semibold poppins">Rp200.000</div>
            <a href="" class="flex justify-center items-center bg-blue-500 h-12 rounded text-white poppins font-semibold font-normal">Book now</a>
        </div>
    </div>
</div>

</div>
</div>

<?= $this->endSection() ?>

<?= $this->section('footer') ?>

<?= $this->endSection() ?>