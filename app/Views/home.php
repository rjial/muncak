<?= $this->extend('layout/layout') ?>

<?= $this->section('head') ?>
<script src="<?= base_url('js/home.js') ?>" defer></script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?= $this->include('layout/navbar') ?>
<div class="relative h-screen w-full bg-white">
    <div class="absolute top-0 right-0 h-96 object-fit h-screen hidden lg:block">
        <img class="h-screen" src="<?= base_url('images/hero1.png') ?>" alt="">
    </div>
    <div class="absolute right-16 bottom-16 hidden lg:block">
        <svg xmlns="http://www.w3.org/2000/svg" width="158" height="158" fill="none" viewBox="0 0 158 158">
            <circle cx="79" cy="79" r="77.5" stroke="#4D73F8" stroke-dasharray="6 6" stroke-width="3" />
        </svg>
    </div>
    <div class="absolute right-96 bottom-32 hidden lg:block">
        <svg xmlns="http://www.w3.org/2000/svg" width="199" height="213" fill="none" viewBox="0 0 199 213">
            <path stroke="#F2D370" stroke-width="6" d="M194.443 207.418 6.008 131.6 165.886 6.32l28.557 201.098Z" />
        </svg>
    </div>
    <div class="absolute top-16 right-72 hidden lg:block">
        <svg xmlns="http://www.w3.org/2000/svg" width="78" height="78" fill="none" viewBox="0 0 78 78">
            <path stroke="#E75A82" stroke-dasharray="12 12" stroke-linecap="square" stroke-width="3" d="m1.975 53.287 22.43-51.312 51.312 22.43-22.43 51.312z" />
        </svg>
    </div>
    <div class="h-screen bg-white flex justify-center z-20 items-center px-16 lg:px-28 lg:w-3/5">
        <div class="flex flex-col justify-between space-y-4">
            <span class="merriweather lg:text-6xl sm:text-5xl text-4xl text-black sm:leading-normal lg:leading-relaxed">
                Dont be affraid Brotha
            </span>
            <span class="text-lg text-gray-600">
                We help you find wonderful trips and great hiking place. We will provide famous and popular mountains all over the world.
            </span>
            <button class="px-6 py-3 rounded transition-colors text-white border-blue-400 bg-blue-500 hover:bg-blue-600 lg:w-fit">Get Started</button>
        </div>
    </div>
</div>

<div class="relative w-full bg-white">
    <div class="mt-40 mx-auto w-full py-32">
        <p class="text-center font-semibold text-4xl text-black">Our Services</p>
        <div class="grid grid-cols-3 gap-10 px-28 mx-auto mt-16">
            <div class="flex flex-col">
                <div class="h-64 flex justify-center items-center">
                    <img class="h-full" src="<?= base_url('images/stationary.png') ?>" alt="">
                </div>
                <span class="text-xl text-black mt-8 text-center font-semibold">Hiking Planning</span>
                <span class="mt-5 text-center text-black font-normal">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt facilis repellendus reiciendis atque, adipisci, consequatur accusamus hic sint unde quos ullam at cumque itaque libero quia exercitationem dolorum nisi obcaecati.</span>
            </div>
            <div class="flex flex-col">
                <div class="h-64 flex justify-center items-center">
                    <img class="h-full" src="<?= base_url('images/selfieboy.png') ?>" alt="">
                </div>
                <span class="text-xl text-black mt-8 text-center font-semibold">Hiking Planning</span>
                <span class="mt-5 text-center text-black font-normal">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt facilis repellendus reiciendis atque, adipisci, consequatur accusamus hic sint unde quos ullam at cumque itaque libero quia exercitationem dolorum nisi obcaecati.</span>
            </div>
            <div class="flex flex-col">
                <div class="h-64 flex justify-center items-center">
                    <img class="h-full" src="<?= base_url('images/travelbag.png') ?>" alt="">
                </div>
                <span class="text-xl text-black mt-8 text-center font-semibold">Hiking Planning</span>
                <span class="mt-5 text-center text-black font-normal">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt facilis repellendus reiciendis atque, adipisci, consequatur accusamus hic sint unde quos ullam at cumque itaque libero quia exercitationem dolorum nisi obcaecati.</span>
            </div>
        </div>
    </div>
</div>
<div class=" bg-white w-full py-20">
    <div class="px-64 mx-auto flex flex-col space-y-24">
        <div class="flex justify-between items-center">
            <div class="w-1/2 relative">
                <span class="text-9xl -top-14 -left-14 font-bold absolute z-0 text-slate-200">01</span>
                <div class="flex flex-col space-y-3 z-10 relative">
                    <div class="relative flex items-center">
                        <div class="border-t-2 border-blue-500 w-16"></div>
                        <span class="text-blue-500 px-2 bg-white font-semibold">GET STARTED</span>
                    </div>
                    <p class="merriweather text-4xl text-black font-bold">What level of hiker are you?</p>
                    <p class="text-black text-sm font-thin">Determining what level of hiker you are can be an important tools when planning future hikes. This hiking level guide will help you plan hikes according to different hike ratings set by various websites like All Trails and Modern Hiker. What type of hiker are you - novice, moderate, advanced moderate, expert, or expert backpacker?</p>
                    <span class="text-blue-500 font-semibold">Read More</span>
                </div>

            </div>
            <img src="<?= base_url('images/hero_2.png') ?>" alt="" srcset="" class="rounded-md drop-shadow-2xl drop-shadow-2xl">
        </div>
        <div class="flex justify-between items-center">
            <img src="<?= base_url('images/hero_3.png') ?>" alt="" srcset="" class="rounded-md drop-shadow-2xl">
            <div class="w-1/2 relative">
                <span class="text-9xl -top-14 -left-14 font-bold absolute z-0 text-slate-200">02</span>
                <div class="flex flex-col space-y-3 z-10 relative">
                    <div class="relative flex items-center">
                        <div class="border-t-2 border-blue-500 w-16"></div>
                        <span class="text-blue-500 px-2 font-semibold">HIKING ESSENTIALS</span>
                    </div>
                    <p class="merriweather text-4xl text-black font-bold">Picking the right Hiking Gear!</p>
                    <p class="text-black text-sm font-thin">The nice thing about beginning hiking is that you don’t really need any special gear, you can probably get away with things you already have. Let’s start with clothing. A typical mistake hiking beginners make is wearing jeans and regular clothes, which will get heavy chafe if they get sweaty or wet.</p>
                    <span class="text-blue-500 font-semibold">Read More</span>
                </div>
            </div>
        </div>
        <div class="flex justify-between items-center">
            <div class="w-1/2 relative">
                <span class="text-9xl -top-14 -left-14 font-bold absolute z-0 text-slate-200">03</span>
                <div class="flex flex-col space-y-3 z-10 relative">
                    <div class="relative flex items-center">
                        <div class="border-t-2 border-blue-500 w-16"></div>
                        <span class="text-blue-500 px-2 font-semibold">WHERE YOU GO IS THE KEY</span>
                    </div>
                    <p class="merriweather text-4xl text-black font-bold">Understand Your Map & Timing</p>
                    <p class="text-black text-sm font-thin">To start, print out the hiking guide and map. If it’s raining, throw them in a Zip-lock bag. Read over the guide, study the map, and have a good idea of what to expect. I like to know that my next landmark is as I hike. For example, I’ll read the guide and know that say, in a mile, I make a right turn at the junction.</p>
                    <span class="text-blue-500 font-semibold">Read More</span>
                </div>

            </div>
            <img src="<?= base_url('images/hero_4.png') ?>" alt="" srcset="" class="rounded-md drop-shadow-2xl">
        </div>
    </div>
</div>
<div class="bg-white px-40 flex flex-col items-center space-y-16 mx-auto py-20">
    <span class="text-center font-semibold text-4xl text-black">What people said about us</span>
    <div class="flex justify-between items-center gap-8">
        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="none" class="flex-none h-12 w-12 drop-shadow" viewBox="0 0 48 48">
            <rect width="48" height="48" fill="#fff" rx="24" />
            <path stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-opacity=".5" stroke-width="2" d="M30 36 18 24l12-12" />
        </svg>
        <div class="grow border flex h-64 rounded-lg items-center drop-shadow-xl bg-white">
            <img src="<?= base_url('images/card1.png') ?>" alt="" class="h-full rounded-l-lg">
            <div class="relative">
                <svg xmlns="http://www.w3.org/2000/svg" width="89" height="72" fill="none" class="absolute -top-6 right-14" viewBox="0 0 89 72">
                    <path fill="#000" fill-opacity=".1" d="M18.207.84c4.107 0 7.467.84 10.08 2.52a21.195 21.195 0 0 1 6.44 6.44 23.58 23.58 0 0 1 3.92 9.8c.56 3.547.84 6.44.84 8.68 0 9.147-2.333 17.453-7 24.92-4.667 7.467-11.947 13.533-21.84 18.2l-2.52-5.04c5.787-2.427 10.733-6.253 14.84-11.48 4.294-5.227 6.44-10.547 6.44-15.96 0-2.24-.28-4.2-.84-5.88-2.986 2.427-6.44 3.64-10.36 3.64-4.853 0-9.053-1.587-12.6-4.76-3.546-3.173-5.32-7.56-5.32-13.16 0-5.227 1.774-9.52 5.32-12.88C9.154 2.52 13.354.84 18.207.84Zm49.033 0c4.107 0 7.467.84 10.08 2.52a21.195 21.195 0 0 1 6.44 6.44c2.053 2.987 3.36 6.253 3.92 9.8.56 3.547.84 6.44.84 8.68 0 9.147-2.333 17.453-7 24.92-4.667 7.467-11.947 13.533-21.84 18.2l-2.52-5.04c5.787-2.427 10.733-6.253 14.84-11.48 4.293-5.227 6.44-10.547 6.44-15.96 0-2.24-.28-4.2-.84-5.88-2.987 2.427-6.44 3.64-10.36 3.64-4.853 0-9.053-1.587-12.6-4.76-3.547-3.173-5.32-7.56-5.32-13.16 0-5.227 1.773-9.52 5.32-12.88C58.187 2.52 62.387.84 67.24.84Z" />
                </svg>
                <div class="px-10 flex flex-col justify-between space-y-5">
                    <span class="font-semibold text-2xl text-neutral-800">We just finished our trip through Mount Ijen. It was a great experience, you can proud of your country. Our guide in Mount Ijen was 10 out of 10.
                    </span>
                    <div class="flex flex-col justify-between">
                        <span class="font-semibold text-pink-400">Not John Doe</span>
                        <span class="poppins text-sm text-neutral-700">Traveler from Singapore</span>
                    </div>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="none" class="flex-none h-12 w-12 drop-shadow" viewBox="0 0 48 48">
            <rect width="48" height="48" x="48" y="48" fill="#fff" rx="24" transform="rotate(-180 48 48)" />
            <path stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-opacity=".5" stroke-width="2" d="m18 12 12 12-12 12" />
        </svg>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('footer') ?>

<?= $this->endSection() ?>