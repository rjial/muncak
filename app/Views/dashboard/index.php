<?= $this->extend('layout/layout') ?>

<?= $this->section('head') ?>
<script src="<?= base_url('js/home.js') ?>" defer></script>
<?= $this->endSection() ?>
<?php
// Mock bentuk response
// @roy @agung
$gunungs = [
    [
        'title' => "Gunung Arjuna",
        'desc' => "Mount Arjuno (sometimes spelled Mount Arjuna ) is a conical (resting) volcano in East Java , Indonesia with an altitude of 3,339 m above sea level.",
        'book_available' => 30,
        'location' => 'Jawa Timur, Indonesia'
    ],
    [
        'title' => "Gunung Arjuna",
        'desc' => "Mount Arjuno (sometimes spelled Mount Arjuna ) is a conical (resting) volcano in East Java , Indonesia with an altitude of 3,339 m above sea level.",
        'book_available' => 50,
        'location' => 'Jawa Timur, Indonesia'
    ],
    [
        'title' => "Gunung Arjuna",
        'desc' => "Mount Arjuno (sometimes spelled Mount Arjuna ) is a conical (resting) volcano in East Java , Indonesia with an altitude of 3,339 m above sea level.",
        'book_available' => 0,
        'location' => 'Jawa Timur, Indonesia'
    ],
    [
        'title' => "Gunung Arjuna",
        'desc' => "Mount Arjuno (sometimes spelled Mount Arjuna ) is a conical (resting) volcano in East Java , Indonesia with an altitude of 3,339 m above sea level.",
        'book_available' => 20,
        'location' => 'Jawa Timur, Indonesia'
    ],
    [
        'title' => "Gunung Arjuna",
        'desc' => "Mount Arjuno (sometimes spelled Mount Arjuna ) is a conical (resting) volcano in East Java , Indonesia with an altitude of 3,339 m above sea level.",
        'book_available' => 20,
        'location' => 'Jawa Timur, Indonesia'
    ],
];

?>

<?= $this->section('content') ?>
<?= $this->include('layout/navbar') ?>
<div class="h-screen bg-homedash bg-no-repeat bg-cover relative">
    <div class="pt-36 px-16 mx-auto flex justify-center">
        <div class="flex flex-col">
            <span class="text-3xl font-bold text-sky-600">TRIPS WITH US</span>
            <span class="garamond text-9xl logo-dash text-transparent">Mountcak</span>
        </div>
    </div>
    <div class="pt-36 px-20 mx-auto grid grid-cols-9 gap-5">
        <div class="col-span-4 flex bg-white rounded-md gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="my-3 ml-3" width="24" height="25" fill="none" viewBox="0 0 24 25">
                <g clip-path="url(#a)">
                    <path stroke="#4D73F8" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 10.5c0 7-9 13-9 13s-9-6-9-13a9 9 0 1 1 18 0Z" />
                    <path stroke="#4D73F8" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                </g>
                <defs>
                    <clipPath id="a">
                        <path fill="#fff" d="M0 0h24v24H0z" transform="translate(0 .5)" />
                    </clipPath>
                </defs>
            </svg>
            <select name="location" id="location" class="w-full my-3 mr-3 text-black bg-white">
                <option value="">Pilih</option>
            </select>
        </div>
        <div class="col-span-4 flex  bg-white rounded-md gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="my-3 ml-3" width="24" height="25" fill="none" viewBox="0 0 24 25">
                <path stroke="#4D73F8" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 4.5H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-14a2 2 0 0 0-2-2Zm-3-2v4m-8-4v4m-5 4h18" />
            </svg>

            <select name="location" id="location" class="w-full my-3 mr-3 text-black bg-white">
                <option value="">Pilih</option>
            </select>
        </div>
        <div class="col-span-1">
            <button class="w-full h-full rounded-md bg-blue-600 text-white flex items-center justify-center gap-1">
                <span class="font-bold">Explore</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" fill="none" viewBox="0 0 20 21">
                    <path stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.5 14a4 4 0 1 0 0-8 4 4 0 0 0 0 8Zm8 4-3.625-3.625" />
                </svg>

            </button>
        </div>
    </div>
</div>
<div class="py-16 px-40 mx-auto bg-white">
    <div class="flex flex-col space-y-7">
        <?php foreach ($gunungs as $gunung) : ?>
            <div class="flex flex-row shadow-xl rounded-l-lg ">
                <div class="basis-3/4 flex flex-col justify-between py-5 px-10 border-b border-l border-t border-gray-100 rounded-l-lg">
                    <div class="flex flex-col space-y-4">
                        <span class="text-4xl font-bold text-black"><?= $gunung['title'] ?></span>
                        <div class="flex flex-col space-y-2 poppins">
                            <span class="text-black font-light"><?= $gunung['location'] ?></span>
                            <p class="text-black"><?= $gunung['desc'] ?></p>

                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <button <?= $gunung['book_available'] > 0 ? '' : 'disabled' ?> class="py-3 px-6 rounded-lg font-bold text-white text-xl <?= $gunung['book_available'] > 0 ? 'bg-blue-500' : 'bg-blue-100' ?>">Book Now</button>
                        <div class="flex space-x-3 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="16" fill="none" viewBox="0 0 24 16">
                                <path fill="#000" fill-opacity=".9" d="M.95 16v-2.35c0-.583.15-1.113.45-1.588.3-.474.717-.829 1.25-1.062 1.217-.533 2.313-.917 3.288-1.15.974-.233 1.979-.35 3.012-.35s2.033.117 3 .35c.967.233 2.058.617 3.275 1.15a2.854 2.854 0 0 1 1.725 2.65V16h-16Zm17.5 0v-2.35c0-1.05-.267-1.912-.8-2.588-.533-.675-1.233-1.22-2.1-1.637 1.15.133 2.233.33 3.25.587 1.017.259 1.842.555 2.475.888.55.317.983.708 1.3 1.175.317.467.475.992.475 1.575V16h-4.6Zm-9.5-8.025c-1.1 0-2-.35-2.7-1.05-.7-.7-1.05-1.6-1.05-2.7s.35-2 1.05-2.7c.7-.7 1.6-1.05 2.7-1.05s2 .35 2.7 1.05c.7.7 1.05 1.6 1.05 2.7s-.35 2-1.05 2.7c-.7.7-1.6 1.05-2.7 1.05Zm9-3.75c0 1.1-.35 2-1.05 2.7-.7.7-1.6 1.05-2.7 1.05-.183 0-.387-.013-.612-.038a2.644 2.644 0 0 1-.613-.137c.4-.417.704-.93.912-1.538.209-.608.313-1.287.313-2.037s-.104-1.413-.313-1.988A5.314 5.314 0 0 0 12.975.65 5.274 5.274 0 0 1 14.2.475c1.1 0 2 .35 2.7 1.05.7.7 1.05 1.6 1.05 2.7ZM2.45 14.5h13v-.85c0-.267-.08-.525-.237-.775a1.307 1.307 0 0 0-.588-.525c-1.2-.533-2.208-.892-3.025-1.075-.817-.183-1.7-.275-2.65-.275s-1.837.092-2.662.275c-.825.183-1.838.542-3.038 1.075a1.24 1.24 0 0 0-.575.525c-.15.25-.225.508-.225.775v.85Zm6.5-8.025c.65 0 1.188-.213 1.613-.638.425-.425.637-.962.637-1.612 0-.65-.212-1.188-.637-1.613-.426-.425-.963-.637-1.613-.637s-1.187.212-1.612.637c-.426.425-.638.963-.638 1.613s.212 1.187.638 1.612c.425.425.962.638 1.612.638Z" />
                            </svg>
                            <span class="text-black poppins"><?= $gunung['book_available'] ?> people</span>
                        </div>
                    </div>
                </div>
                <img class="basis-1/4 rounded-r-lg border-r border-t border-b border-gray-100" src="<?= base_url('images/gunung/gunung_1.png') ?>" />
            </div>
        <?php endforeach; ?>
        <div></div>
    </div>
</div>
<div class="w-11/12 mx-auto border-t border-gray-300"></div>
<div class="py-16 px-40 mx-auto bg-white">
    <div class="flex flex-col space-y-3 items-center">
        <span class="text-black text-4xl font-bold">Latest News</span>
        <hr class="w-24 rounded-full h-1.5 bg-blue-500">
    </div>
    <div class="mt-5 grid grid-cols-3 gap-5">
        <?php for ($i = 0; $i < 9; $i++) : ?>
            <div class="bg-white mt-5">
                <img class="rounded-t-lg border-gray-100 border-t" src="<?= base_url('images/berita/berita_2.png') ?>" alt="" srcset="">
                <div class="p-3 flex flex-col space-y-3 border-b border-l border-r border-gray-100 rounded-b-lg shadow-lg">
                    <span class="text-black font-light roboto text-sm">SEN, 19 SEP 2022</span>
                    <span class="text-black font-medium text-lg roboto">Bantuan Peningkatan Kapasitas Unit SAR Lombok Timur</span>
                </div>
            </div>
        <?php endfor; ?>

    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('footer') ?>

<?= $this->endSection() ?>