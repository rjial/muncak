<?= $this->extend('layout/layout') ?>

<?= $this->section('head') ?>

<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="relative h-screen w-full bg-white">
    <div class="absolute -top-20 right-0 w-auto hidden lg:block">
        <img src="<?= base_url('images/hero1.png') ?>" alt="">
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
    <div class="h-screen flex justify-center items-center px-16 lg:px-28 lg:w-3/5">
        <div class="flex flex-col justify-between space-y-4">
            <span class="merriweather lg:text-6xl sm:text-5xl text-4xl text-black sm:leading-normal lg:leading-relaxed">
                Get Ready To Climb The Mountains And Beyond!
            </span>
            <span class="text-lg text-gray-600">
                We help you find wonderful trips and great hiking place. We will provide famous and popular mountains all over the world.
            </span>
            <button class="px-6 py-3 rounded transition-colors text-white border-blue-400 bg-blue-500 hover:bg-blue-600 lg:w-fit">Get Started</button>
        </div>
    </div>
</div>
<div class="h-screen bg-base-100 mt-8">
    asdasdasd
</div>
<div class="h-screen bg-base-100">
    asdasdasd
</div>

<?= $this->endSection() ?>